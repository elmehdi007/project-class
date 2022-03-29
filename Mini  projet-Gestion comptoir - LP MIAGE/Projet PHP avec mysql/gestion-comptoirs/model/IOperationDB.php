<?php
//include './model/Class_DBConnexion.php';

interface IOperationDB{
    
   public function insert();
   public function update();
 // public  function remove();
  public static function lister();
}

Class Cordonne{
     protected $function;
    protected $adresse;
    protected $ville;
    protected $region;
    protected $codePostal;
    protected $pays;
    protected $tel;
    protected $fax;
    private $sql;
    static $bdd;
    public function __construct($function,$adresse,$ville,$region,$codePostal,$pays,$tel,$fax)
    {
        $this->function=$function;
        $this->adresse=$adresse;
        $this->ville=$ville;
        $this->region=$region;
        $this->codePostal=$codePostal;
        $this->pays=$pays;
        $this->tel=$tel;
        $this->fax=$fax;
    }
}


Class Client extends Cordonne implements IOperationDB {
    public $societe;
    public $codeClient;
    public $contact;
//public $function; public $adresse;public $ville;public $region;public $codePostal; public $pays; public $tel;public $fax;private $sql; static $bdd;
    
    public function getClient($codeClient){
        
         $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `clients` WHERE `Code client`='".$codeClient."' "; 
        $reponse = self::$bdd->query($sql);
       $client=$reponse->fetch();
           $reponse->closeCursor();
           return $client;
           
    }
    public function __construct($societe, $contact,$function,$adresse,$ville,$region,$codePostal,$pays,$tel,$fax)
    {
        $this->societe=$societe;       
        $this->contact=$contact;
        parent::__construct($function, $adresse, $ville, $region, $codePostal, $pays, $tel, $fax);
        $this->codeClient= self::genererCodeClient($societe);
    }
    
    public static function genererCodeClient($societe){
        $code="";        
        $explodeSociete=explode(" ", $societe);
        for($i=0;$i<count($explodeSociete);$i++)
        {
            $nbrChar=3;
            $indexBegining=0;
            if(strlen($explodeSociete[$i])<3)
                {
                  $nbrChar=strlen($explodeSociete[$i]);
                }
            $code.=substr($explodeSociete[$i], $indexBegining, $nbrChar);
        }
        return $code;
        //$this->codeClient=su
    }

    public static function checkExistClient($codeClient)
    {
        $etatExist=FALSE;
        $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `clients` WHERE `Code client`='".$codeClient."' "; 
       $reponse = self::$bdd->query($sql);
       if($reponse->rowCount()>=1)
           {
            $etatExist=true;
           }
           $reponse->closeCursor();
       return $etatExist;
    }

    public static function lister()
    {
       $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `clients` ORDER BY `Société` DESC "; 
       $reponse = self::$bdd->query($sql);
       $allClient=$reponse->fetchAll();
       $reponse->closeCursor();
       return $allClient;
    }

    
    public static function topFive()
    {
       $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT `clients`.`Code client`,count( `clients`.`Code client`) as nbrAchatClient ";
       $sql.= "FROM `commandes`INNER join `clients` on `commandes`.`Code client`=`clients`.`Code client` GROUP by `clients`.`Code client` limit 5"; 
       $reponse = self::$bdd->query($sql);
       $allClient=$reponse->fetchAll();
       $reponse->closeCursor();
       return $allClient;
    }
    
    public function insert()
    {
        $msgInsert="";
         $this->sql="INSERT INTO `clients` (`Code client`, `Société`, `Contact`, `Fonction`, `Adresse`, `Ville`, `Région`, `Code postal`, `Pays`, `Téléphone`, `Fax`) ";
         $this->sql.="VALUES ('".$this->codeClient."', '".$this->societe."', '".$this->contact."', '".$this->function."', '".$this->adresse."', '".$this->ville."', '".$this->region."', '".$this->codePostal."', '".$this->pays."', '".$this->tel."', '".$this->fax."')";
         if(self::checkExistClient($this->codeClient)){
             $msgInsert="Client Deja exist !!!";
         }
         else {
            $bdd = new DBConnexion();
            self::$bdd=$bdd->getPdo();
           $reponse = self::$bdd->exec($this->sql);
            if(!$reponse){
               $msgInsert="l'ajoute du client est impossible";
            }
            else {
                  $msgInsert="le client ete ajoute";
            }
         }
      
         return $msgInsert;
    }
    
     function update()
     {
         if($this->codeClient==NULL || !isset($this->codeClient))
         {
             echo "id client n'est pas specfier";
             exit();
         }
         
         $msgUpdate="";
         $this->sql="UPDATE `clients` SET `Contact` = '".$this->contact."', ";
          $this->sql.=" `Contact` = '".$this->contact."', `fonction`= '".$this->function."', ";
           $this->sql.=" `Adresse` = '".$this->adresse."', `ville`= '".$this->ville."', ";
            $this->sql.=" `Région` = '".$this->region."', `Code postal`= '".$this->codePostal."', ";
             $this->sql.=" `pays` = '".$this->pays."', `fonction`= '".$this->pays."', ";
              $this->sql.=" `Téléphone` = '".$this->tel."', `fax`= '".$this->fax."' ";
                  $this->sql.="WHERE `clients`.`Code client` = '".$this->codeClient."'; ";

                  if(!self::checkExistClient($this->codeClient) ){
             $msgUpdate="modification du client est impossible; client n'existe pas";
         }
         
         else {
            $bdd = new DBConnexion();
            self::$bdd=$bdd->getPdo();
            $reponse = self::$bdd->exec($this->sql);
              if(!$reponse){
               $msgInsert="modification du client est impossible";
            }
            else{
                $msgUpdate="modification du client valide";
            }
         }
          return $msgUpdate;
     }
     
     //function remove(){}
}


class fournisseur extends Cordonne implements IOperationDB {
    public $NumFournisseur;
    public $societe;
    public $contact;
    public $pageAcceuil;
           
    public function __construct($societe,$contact,$function, $adresse, $ville, $region, $codePostal, $pays, $tel, $fax,$pageAcceuil) {
        parent::__construct($function, $adresse, $ville, $region, $codePostal, $pays, $tel, $fax);
        $this->societe=$societe;
        $this->contact=$contact;
        $this->pageAcceuil=$pageAcceuil;
    }
    
       public static function checkExistFourniseur($codeFourniseur)
    {
        $etatExist=FALSE;
        $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `fournisseurs` WHERE `N° fournisseur` ='".$codeFourniseur."' "; 
       $reponse = self::$bdd->query($sql);
       if($reponse->rowCount()>=1)
       {
        $etatExist=true;
       }
       $reponse->closeCursor();
       return $etatExist;
    }
    
    function insert(){
        $msgInsert="";
//         if(self::checkExistFourniseur($this->NumFournisseur)){
//             $msgInsert="fournisseurs  exist  Déja!!!";
//         }
         
            $bdd = new DBConnexion();
            self::$bdd=$bdd->getPdo();
             $this->sql="INSERT INTO `fournisseurs` ( `Société`, `Contact`, `Fonction`, `Adresse`, `Ville`, `Région`, `Code postal`, `Pays`, `Téléphone`, `Fax`, `Page accueil`) VALUES";
         $this->sql.=" ('".$this->societe."', '".$this->contact."', '".$this->function."', '".$this->adresse."', '".$this->ville."', '".$this->region."', '".$this->codePostal."', '".$this->pays."', '".$this->tel."', '".$this->fax."'".", '".$this->pageAcceuil."')";

         $reponse = self::$bdd->exec($this->sql);
            if(!$reponse){
               $msgInsert="l'ajoute du fournisseurs est impossible";
            }
            
            else {
                  $msgInsert="le fournisseurs  ajouté";
            }
        
         return $msgInsert;
    }
        public static function lister()
    {
       $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `fournisseurs` ORDER BY `N° fournisseur` DESC"; 
       $reponse = self::$bdd->query($sql);
       $allFournisseurs=$reponse->fetchAll();
       $reponse->closeCursor();
       return $allFournisseurs;
    }
        
    public static function topFive()
    {
       $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT `produits`.`N° fournisseur`,`produits`.`Nom du produit` ,COUNT(`Nom du produit`) as nbrAchatFournisseur from `produits` ";
       $sql.="inner JOIN `fournisseurs` on `fournisseurs`.`N° fournisseur` = `produits`.`N° fournisseur` GROUP by `produits`.`N° fournisseur` limit 5";
       $reponse = self::$bdd->query($sql);
       $allFournisseur=$reponse->fetchAll();
       $reponse->closeCursor();
       return $allFournisseur;
    }
    function update(){
           if($this->NumFournisseur==NULL || !isset($this->NumFournisseur))
         {
             echo "id client n'est pas specfier";
         }
                 
         else {
             
                $msgUpdate="";
         $this->sql="UPDATE `fournisseurs` SET `Contact` = '".$this->contact."', ";
          $this->sql.=" `Société` = '".$this->societe."', `fonction`= '".$this->function."', ";
           $this->sql.=" `Adresse` = '".$this->adresse."', `ville`= '".$this->ville."', ";
            $this->sql.=" `Région` = '".$this->region."', `Code postal`= '".$this->codePostal."', ";
             $this->sql.=" `pays` = '".$this->pays."', `fonction`= '".$this->pays."', ";
              $this->sql.=" `Téléphone` = '".$this->tel."', `fax`= '".$this->fax."', ";
              $this->sql.=" `Page accueil` = '".$this->pageAcceuil."' ";
                  $this->sql.=" WHERE  `N° fournisseur` = '".$this->NumFournisseur."'; ";

                  if(!self::checkExistFourniseur($this->NumFournisseur) ){
             $msgUpdate="modification du fournisseur est impossible; client n'existe pas";
         }
            $bdd = new DBConnexion();
            self::$bdd=$bdd->getPdo();
            $reponse = self::$bdd->exec($this->sql);
              if(!$reponse){
               $msgInsert="modification du fournisseur est impossible";
            }
            else{
                $msgUpdate="modification du fournisseur valide";
            }
         }
          return $msgUpdate;
    }
    //function remove(){}
}

class Produit{
        public $Ref_produit;
        public $Nom_du_produit;
        public $N_fournisseur ;
        public $Code_categorie;
        public $Quantite_par_unite;	
        public $Prix_unitaire;
        public $Unites_en_stock;
        public $Unités_commandees;	
        public $Niveau_de_réapprovisionnement;
        public $Indisponible;
        private static $bdd;

     
        public function __construct( $Nom_du_produit,
                                     $N_fournisseur , $Code_categorie, $Quantite_par_unite,$Prix_unitaire,$Unites_en_stock,
                                        $Unités_commandees,$Niveau_de_réapprovisionnement,$Indisponible) {
            
                                       $this->Nom_du_produit=$Nom_du_produit;
                                        $this->N_fournisseur =$N_fournisseur;
                                     $this->Code_categorie=$Code_categorie; 
                                     $this->Quantite_par_unite=$Code_categorie;
                                     $this->Prix_unitaire=$Prix_unitaire;
                                      $this->Unites_en_stock=$Unites_en_stock;
                                      $this->Unités_commandees=$Unités_commandees;
                                       $this->Niveau_de_réapprovisionnement=$Niveau_de_réapprovisionnement;
                                        $this->Indisponible=$Indisponible;
                                            
        }

        public function getPrixOfProduit($codeProduit){
              $bdd = new DBConnexion();
            self::$bdd=$bdd->getPdo();
            $sql="SELECT * FROM `produits` where `Réf produit` ='".$codeProduit."'"; 
            //die($sql); 
            $reponse = self::$bdd->query($sql);
            $produit=$reponse->fetch();
            $reponse->closeCursor();
            return $produit['Prix unitaire'];
        }
        
    public static function checkExistProduit($codeProduit)
    {
        $etatExist=FALSE;
        $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `produits` WHERE `Réf produit` ='".$codeProduit."' "; 
       $reponse = self::$bdd->query($sql);
       if($reponse->rowCount()>=1)
       {
        $etatExist=true;
       }
       $reponse->closeCursor();
       return $etatExist;
    }
    
        public function insert(){
           $this->sql="INSERT INTO `produits` ( `Nom du produit`, `N° fournisseur`, `Code catégorie`, `Quantité par unité`, `Prix unitaire`, `Unités en stock`, `Unités commandées`, `Niveau de réapprovisionnement`, `Indisponible`)";
           $this->sql.= " VALUES ( '".$this->Nom_du_produit."', '".$this->N_fournisseur."', '".$this->Code_categorie."', '".$this->Quantite_par_unite."', '".$this->Prix_unitaire."', '".$this->Unites_en_stock."', '".$this->Unités_commandees."', '".$this->Niveau_de_réapprovisionnement."', '".$this->Indisponible."')";  
           $bdd = new DBConnexion();
           self::$bdd=$bdd->getPdo();
           $msgInsert="";
           die($this->sql);
           $reponse = self::$bdd->exec($this->sql);
            if(!$reponse){
               $msgInsert="l'ajoute du produit est impossible";
            }
            
            else {
                  $msgInsert="le produit  ajouté";
            }
        
         return $msgInsert;
        }
        
        public function  update(){
           $this->sql= " UPDATE `produits` set  `Nom du produit`= '".$this->Nom_du_produit."', `N° fournisseur`='".$this->N_fournisseur."', `Code catégorie`='".$this->Code_categorie."', `Quantité par unité` = '".$this->Quantite_par_unite."',`Prix unitaire`= '".$this->Prix_unitaire."', `Unités en stock`= '".$this->Unites_en_stock."',";
           $this->sql.=" `Unités commandées`= '".$this->Unités_commandees."', `Niveau de réapprovisionnement`= '".$this->Niveau_de_réapprovisionnement."',`Indisponible`= '".$this->Indisponible."'";  
           $this->sql.=" WHERE `Réf produit` ='".$this->Ref_produit."'";
           $bdd = new DBConnexion();
           self::$bdd=$bdd->getPdo();
           $msgUpdate="";
            $reponse = self::$bdd->exec($this->sql);
            if(!$reponse){
               $msgUpdate="l'ajoute du produit est impossible";
            }
            
            else {
                  $msgUpdate="le produit  ajouté";
            }
        
         return $msgUpdate;
        }

        public static function lister()
    {
       $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `produits` ORDER BY `Réf produit` DESC"; 
       $reponse = self::$bdd->query($sql);
       $allProduit=$reponse->fetchAll();
       $reponse->closeCursor();
       return $allProduit;
    }
    
    public static function renderHTMLFourniseur()
    {
        $htmlNomFournisseur='<select id="nom_fournisseur" name="nom_fournisseur" class="form-control" style="width: 50%;">';
        $htmlNumFournisseu='<select name="n_fournisseur" id="n_fournisseur" class="hidden ">';
       $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `fournisseurs`"; 
       $reponse = self::$bdd->query($sql);
       $allFournisseur=$reponse->fetchAll();       
       for($i=0;$i<count($allFournisseur);$i++)
       {
            $htmlNomFournisseur.="<option>".$allFournisseur[$i]['Société']."</option>";
            $htmlNumFournisseu.="<option>".$allFournisseur[$i]['N° fournisseur']."</option>";
       }
       $htmlNomFournisseur.="</select>";
        $htmlNumFournisseu.="</select>";
        $reponse->closeCursor();
        
       return $htmlNomFournisseur.$htmlNumFournisseu;
    }
    
        public static function renderHTMLcategorie()
    {
        $htmlNomCategorie='<select id="nom_categorie" name="nom_categorie" class="form-control" style="">';
        $htmlCodeCategorie='<select name="n_categorie" id="n_categorie" class="hidden ">';
       $bdd = new DBConnexion();
       self::$bdd=$bdd->getPdo();
       $sql="SELECT * FROM `catégories`"; 
       $reponse = self::$bdd->query($sql);
       $allCategorie=$reponse->fetchAll();  
        for($i=0;$i<count($allCategorie);$i++)
       {
            $htmlNomCategorie.="<option>".$allCategorie[$i]['Nom de catégorie']."</option>";
            $htmlCodeCategorie.="<option>".$allCategorie[$i]['Code catégorie']."</option>";
       }
       $htmlNomCategorie.="</select>";
        $htmlCodeCategorie.="</select>";
        $reponse->closeCursor();
        
       return $htmlNomCategorie.$htmlCodeCategorie;
    }
}