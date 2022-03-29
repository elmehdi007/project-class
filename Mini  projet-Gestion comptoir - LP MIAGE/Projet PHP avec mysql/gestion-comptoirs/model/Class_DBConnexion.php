<?php
class DBConnexion
{
     private static $comptoirs_sec_stringCnx = 'mysql:host=localhost;dbname=les_comptoirs_sc;charset=utf8';
     private static $comptoirs_stringCnx = 'mysql:host=localhost;dbname=bd_1;charset=utf8';
     private static $DB_Login = 'root';
     private static $DB_Pass = '';

    public static function userCnxCheck($userName,$password)
    {
        $cnxValide = false;
        $bdd = new PDO(self::$comptoirs_sec_stringCnx, self::$DB_Login, self::$DB_Pass);
        $reponse = $bdd->query('SELECT * FROM comptes');

        while ($donnees = $reponse->fetch())
        {
            if($donnees['user_name'] == $userName && $donnees['password'] == $password)
            {
                $_SESSION['user_name'] = $donnees['user_name'];
                $_SESSION['password'] = $donnees['password'];
                $_SESSION['e-mail'] = $donnees['e-mail'];
                $_SESSION['privilege'] = $donnees['privilege'];
                $cnxValide = true;
            }
                
        }
        
        $reponse->closeCursor(); // Termine le traitement de la requête

        return $cnxValide;
    }

    public static function tableListe()
    {
        $tableListe="";

        $bdd = new PDO(self::$comptoirs_stringCnx, self::$DB_Login, self::$DB_Pass);
        $reponse = $bdd->query('SHOW TABLES');

        while ($donnees = $reponse->fetch())
        {
            $tableListe .= '<option>'.$donnees['Tables_in_bd_1'].'</option>';
        }
        $reponse->closeCursor();
        return $tableListe;
    }

    public static function insertInToTable($tblName,$dataArray)
    {
        $bdd = new PDO(self::$comptoirs_stringCnx, self::$DB_Login, self::$DB_Pass);
        $rows = count($dataArray)-1;
        $columns = count($dataArray[0]);

        switch ($tblName) {
            case 'catégories':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `catégories`(`Code catégorie`, `Nom de catégorie`, `Description`, `Illustration`) VALUES (%s,'%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2],$dataArray[$row][3]);
                    $bdd->exec($queryString);
                }
                break;
            case 'clients':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `clients_import`(`Code client`, `Société`, `Contact`, `Fonction`, `Adresse`, `Ville`, `Région`, `Code postal`, `Pays`, `Téléphone`, `Fax`) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2],$dataArray[$row][3],$dataArray[$row][4],$dataArray[$row][5],$dataArray[$row][6],$dataArray[$row][7],$dataArray[$row][8],$dataArray[$row][9],$dataArray[$row][10]);
                    $bdd->exec($queryString);
                }  
                break;
            case 'commandes':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `commandes`(`N° commande`, `Code client`, `N° employé`, `Date commande`, `À livrer avant`, `Date envoi`, `N° messager`, `Port`, `Destinataire`, `Adresse livraison`, `Ville livraison`, `Région livraison`, `Code postal livraison`, `Pays livraison`) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2],$dataArray[$row][3],$dataArray[$row][4],$dataArray[$row][5],$dataArray[$row][6],$dataArray[$row][7],$dataArray[$row][8],$dataArray[$row][9],$dataArray[$row][10],$dataArray[$row][11],$dataArray[$row][12],$dataArray[$row][13]);
                    $bdd->exec($queryString);
                }
                break;
            case 'détails commandes':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `détails commandes`(`N° commande`, `Réf produit`, `Prix unitaire`, `Quantité`, `Remise (%)`) VALUES ('%s','%s','%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2],$dataArray[$row][3],$dataArray[$row][4]);
                    //$bdd->exec($queryString);
                    echo ($queryString);
                } 
                break;
            case 'employés':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `employés`(`N° employé`, `Nom`, `Prénom`, `Fonction`, `Titre de courtoisie`, `Date de naissance`, `Date embauche`, `Adresse`, `Ville`, `Région`, `Code postal`, `Pays`, `Tél domicile`, `Extension`, `Photo`, `Notes`, `Rend compte à`) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2],$dataArray[$row][3],$dataArray[$row][4],$dataArray[$row][5],$dataArray[$row][6],$dataArray[$row][7],$dataArray[$row][8],$dataArray[$row][9],$dataArray[$row][10],$dataArray[$row][11],$dataArray[$row][12],$dataArray[$row][13],$dataArray[$row][14],addslashes($dataArray[$row][15]),$dataArray[$row][16]);
                    //echo $queryString;
                    $bdd->exec($queryString);
                }
                break;
            case 'fournisseurs':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `fournisseurs`(`N° fournisseur`, `Société`, `Contact`, `Fonction`, `Adresse`, `Ville`, `Région`, `Code postal`, `Pays`, `Téléphone`, `Fax`, `Page accueil`) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2],$dataArray[$row][3],$dataArray[$row][4],$dataArray[$row][5],$dataArray[$row][6],$dataArray[$row][7],$dataArray[$row][8],$dataArray[$row][9],$dataArray[$row][10],$dataArray[$row][11]);
                    $bdd->exec($queryString);
                }
                break;
            case 'messagers':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `messagers`(`N° messager`, `Nom du messager`, `Téléphone`) VALUES ('%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2]);
                    $bdd->exec($queryString);
                }
                break;
            case 'produits':
                if(self::NbrColumns($tblName) != $columns) return 'err_NbrColumns';
                for($row = 1; $row <= $rows; $row++)
                {
                    $queryString = sprintf("INSERT INTO `produits`(`Réf produit`, `Nom du produit`, `N° fournisseur`, `Code catégorie`, `Quantité par unité`, `Prix unitaire`, `Unités en stock`, `Unités commandées`, `Niveau de réapprovisionnement`, `Indisponible`) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$dataArray[$row][0],$dataArray[$row][1],$dataArray[$row][2],$dataArray[$row][3],$dataArray[$row][4],$dataArray[$row][5],$dataArray[$row][6],$dataArray[$row][7],$dataArray[$row][8],$dataArray[$row][9]);
                    $bdd->exec($queryString);
                }
                break;
            default:
                //code..
                break;
        }
        
        return $bdd->errorInfo()[2];
    }

    private static function NbrColumns($table)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', self::$DB_Login, self::$DB_Pass);
        $reponse = $bdd->query(sprintf("SELECT count(*) as nbrCulumns FROM information_schema.columns WHERE table_name = '%s' and TABLE_SCHEMA = 'les_comptoirs'",$table));
        $donnees = $reponse->fetch();
        return $donnees['nbrCulumns'];
    }
	
    public static function getPdo()
    {
        $bdd = new PDO(self::$comptoirs_stringCnx, self::$DB_Login, self::$DB_Pass);   
        return $bdd;
    }
}

?>