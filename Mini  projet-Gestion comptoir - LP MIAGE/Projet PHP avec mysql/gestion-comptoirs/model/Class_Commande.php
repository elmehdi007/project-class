<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Class_Commande
 *
 * @author ME
 */

require_once 'Class_DBConnexion.php';

class Class_Commande {
    
    private $sousTotal=0;
    private $Total=0;
    private $port=0;
    public $listProduit=array();
    public $CommandeCurrentClient;
    public function getSousToutal()
            {
        return $sousTotal;
            }
    public function getTotal()
            {
           return $Total;
            }
            public function loadListProduit($postProduit){
                //$this->listProduit=$listProduit;
                for($i=0;$i<count($postProduit['num_select_produit']);$i++){
                    $this->listProduit[count($this->listProduit)]=array("refProduit"=>$postProduit['num_select_produit'][$i] ,
                                                                  "prix_utnitaire"=>$postProduit['prix_utnitaire'][$i]  ,
                                                                  "quantite"=>$postProduit['quantite'][$i] ,
                                                                    "remise"=>$postProduit['remise'][$i] ,
                                                                );
                }
             }
            
            
            public function  renderAllProduit_($class)
            {
                     $bdd = new DBConnexion();
                     $bdd=$bdd->getPdo();
                     $tableListe='<select name="select-produit[]" class="form-control '.$class.'" >';
                     $tableListeNumProduit='<select  name="num_select_produit_[]"  class="form-control  hidden" >';
                     $sql=" SELECT `Réf produit`,`Nom du produit` from `produits`  WHERE `Indisponible`='FALSE' "; 
                    
                     $reponse = $bdd->query($sql);
                     while ($donnees = $reponse->fetch())
                     {
                         $tableListe .= '<option name="'.$donnees['Réf produit'].'">'.$donnees['Nom du produit'].'</option>';
                          $tableListeNumProduit .= '<option name="'.$donnees['Réf produit'].'">'.$donnees['Réf produit'].'</option>';
                     }
                      $tableListe .='<input type="hidden" name="num_select_produit[]" value="1" /> </select>';
                      $tableListeNumProduit .="</select>";
                     $reponse->closeCursor();
                     return $tableListe.$tableListeNumProduit;     
            }
    
            public function  imprimeaAddedPDF(){
                 $bdd = new DBConnexion();
                 $bdd=$bdd->getPdo();
                                $reponse = $bdd->query("SELECT MAX(`N° commande`) AS MaxNumCommande FROM `commandes`");
                                $numCommmande=$reponse->fetch()['MaxNumCommande'];   
                                echo '<script>open("imprimer-facture.php?numcomd='.$numCommmande.'","_blank");</script';
            }

            public  function addCommande($codeClient,$numEmploye,$dateCommande,$livrerAvant,$dateEnvoi,$NumMessager,$port,$destinataire,$adresseLaivraison,$villeLaivraison,$regionLaivraison,$codePostale,$paysLaivraison){
                 $msgInsert=""; 
                
                $bdd = new DBConnexion();
                 $bdd=$bdd->getPdo();
                $reponse = $bdd->query("SELECT MAX(`N° commande`) AS MaxNumCommande FROM `commandes`");
                $numCommmande=$reponse->fetch()['MaxNumCommande']+1;               
                $this->sql="INSERT INTO `commandes` (`N° commande`, `Code client`, `N° employé`, `Date commande`, `À livrer avant`, `Date envoi`, `N° messager`, `Port`, `Destinataire`, `Adresse livraison`, `Ville livraison`, `Région livraison`, `Code postal livraison`, `Pays livraison`)";
                $this->sql.= " VALUES ('".$numCommmande."', '".$codeClient."', '".$numEmploye."', '".$dateCommande."', '".$livrerAvant."', '".$dateEnvoi."', '".$NumMessager."', '".$port."', '".$destinataire."', '".$adresseLaivraison."', '".$villeLaivraison."', '".$regionLaivraison."', '".$codePostale."', '".$paysLaivraison."');";
               // die($this->sql);
                
                 $sql_="INSERT INTO `détails commandes` (`N° commande`, `Réf produit`, `Prix unitaire`, `Quantité`, `Remise (%)`) values ";                                                        
                   for($i=0;$i<count($this->listProduit);$i++){
                     $sql_.=" ('".$numCommmande."', '".$this->listProduit[$i]['refProduit']."', '".$this->listProduit[$i]['prix_utnitaire']."', '".$this->listProduit[$i]['quantite']."', '".($this->listProduit[$i]['remise']/100)."'),";  
                  }
                  trim($sql_);
                  $sql_[strlen($sql_)-1]=" ";

                 try {  
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //die($this->sql.'<br/>'.$sql_);
                    $bdd->beginTransaction();
                    $bdd->exec($this->sql);
                    $bdd->exec($sql_) ;
                    $bdd->commit();
                    $msgInsert="le commande a ete ajouter ";
                  }
                  catch (Exception $e) {
                    $bdd->rollBack();
                    echo "l'ajoute commandes est impossible: " . $e->getMessage();
                    }
//                $reponse = $bdd->exec($this->sql);
//             if(!$reponse){
//                    $msgInsert="l'ajoute du  commandes est impossible";
//                 }
//                $this->sql="INSERT INTO `détails commandes` (`N° commande`, `Réf produit`, `Prix unitaire`, `Quantité`, `Remise (%)`) values ";                                                        
//                for($i=0;$i<count($this->listProduit);$i++){
//                     $this->sql.=" ('".$numCommmande."', '".$this->listProduit[$i]['refProduit']."', '".$this->listProduit[$i]['prix_utnitaire']."', '".$this->listProduit[$i]['quantite']."', '".($this->listProduit[$i]['remise']/100)."'),";
////                       if($i<count(listProduit) && count($this->listProduit)>1)
////                         $this->sql.=",";  
//                  }
//                  trim($this->sql);
//                  $this->sql[strlen($this->sql)-1]=" ";
// 
//                  $reponse = $bdd->exec($this->sql);
//                 if(!$reponse){
//                    $msgInsert="l'ajoute du détails commandes est impossible";
//                 }
//
//                 else {
//                       $msgInsert="le commande  ajouté";
//                 }

              return $msgInsert;
        }
           
            
    public function  renderAllProduit($refPoduitToBeInfirst)
            {
                     $bdd = new DBConnexion();
                     $bdd=$bdd->getPdo();
                     $tableListe='<select name="select-produit[]" class="form-control combox-select-produit hidden" >';
                     $tableListeNumProduit='<select class="form-control  hidden" >';
                     $sql="SELECT `Réf produit`,`Nom du produit` FROM `Factures` where `Réf produit`='".$refPoduitToBeInfirst."'";                              
                     $sql.="UNION SELECT `Réf produit`,`Nom du produit` from `produits` where `Réf produit`!='".$refPoduitToBeInfirst."'"; 
                    //die($sql);
                     $reponse = $bdd->query($sql);
                     while ($donnees = $reponse->fetch())
                     {
                         $tableListe .= '<option name="'.$donnees['Réf produit'].'">'.$donnees['Nom du produit'].'</option>';
                          $tableListeNumProduit .= '<option name="'.$donnees['Réf produit'].'">'.$donnees['Réf produit'].'</option>';
                     }
                      $tableListe .="</select>";
                      $tableListeNumProduit .="</select>";
                     $reponse->closeCursor();
                     return $tableListe.$tableListeNumProduit;     
            }
  public function  renderAllClientHTML($id)
    {
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $tableListe='<select  id="'.$id.'_name" name="'.$id.'_name" class="hidden ">';
        $tableListeNum='<select id="'.$id.'_num" name="'.$id.'_name" class="form-control">';
       // $sql="SELECT DISTINCT `Code client`,`Société` FROM `Factures`";
        //$sql.="where `Code client`='".$id."'";
       // $sql.="UNION SELECT `Code client`,`Société` from clients";
        $sql=" SELECT `Code client`,`Société` from clients";
        $reponse = $bdd->query($sql);
        while ($donnees = $reponse->fetch())
        {
            $tableListe .= '<option name="'.$donnees['Code client'].'">'.$donnees['Société'].'</option>';
            $tableListeNum .= '<option name="'.$donnees['Code client'].'">'.$donnees['Code client'].'</option>';
        }
        $tableListe.='</select>';
        $tableListeNum.='</select>';
        $reponse->closeCursor();
        return $tableListe.$tableListeNum;           
    }
        public function  getClientById($id){
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
       // $sql="SELECT * FROM `clients` ORDER BY `clients`.`Code client`  ORDER BY `Code client`  asc";
        $sql="SELECT `Code client`, `Adresse`,`Ville`,`Région`,`Code postal`,`Pays`,`Adresse livraison`,";
        $sql.= "`Ville livraison`,`Région livraison`,`Code postal livraison`,`Pays livraison`, `Société` ";
        $sql.= "FROM `Factures`  where =`Code client` '".$id." ORDER BY `Code client`  asc limit 1"; 
        $reponse = $bdd->query($sql);
        $client = $reponse->fetch();     
        
        $reponse->closeCursor();
        return  $client;
     }
          
        public function  getFirstClientHasCommande(){
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $sql="SELECT `Code client`, `Adresse`,`Ville`,`Région`,`Code postal`,`Pays`,`Adresse livraison`, `N° commande`,";
        $sql.= "`Ville livraison`,`Région livraison`,`Code postal livraison`,`Pays livraison`, `Société` ";
        $sql.= "FROM `Factures` ORDER BY `Date Commande` asc limit 1"; 
        $reponse = $bdd->query($sql);
        $client = $reponse->fetch();     
        
        $reponse->closeCursor();
        return  $client;
     }
   
       public function  getClientHasCommandeByIdAndIdCommande($idClient,$idCommande){
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $sql="SELECT `Code client`, `Adresse`,`Ville`,`Région`,`Code postal`,`Pays`,`Adresse livraison`, `N° commande`,";
        $sql.= "`Ville livraison`,`Région livraison`,`Code postal livraison`,`Pays livraison`, `Société` ";
        $sql.= "FROM `Factures` where `Code client`='".$idClient."' and `N° commande` ='".$idCommande."' ORDER BY `Date Commande` asc limit 1"; 
         $reponse = $bdd->query($sql);
        $client = $reponse->fetch();     
        
        $reponse->closeCursor();
        return  $client;
     }
     
     public function getHeadNextFacture ()
     {  
         $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $headNextFacture= array();
        $idCommande= $this->getIdCurrentCommande();
        $sql="SELECT `Code client`, `N° commande` FROM `Factures` WHERE `N° commande` > ".$idCommande." ORDER BY `Date Commande` asc LIMIT 1 ";
        $reponse = $bdd->query($sql);
        $headNextFacture=$reponse->fetch();
        $reponse->closeCursor();
        return $headNextFacture;   
     }
     
    public function getHeadPrevFacture ()
     {  
         $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $headNextFacture= array();
        $idCommande= $this->getIdCurrentCommande();
        $sql="SELECT `Code client`, `N° commande` FROM `Factures` WHERE `N° commande` < ".$idCommande." ORDER BY `Date Commande` asc LIMIT 1 ";
        $reponse = $bdd->query($sql);
        $headNextFacture=$reponse->fetch();
        $reponse->closeCursor();
        return $headNextFacture;   
     }

          public function getHeadLastFacture ()
     {  
         $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $headLastFacture= array();
        $idCommande= $this->getIdCurrentCommande();
        $sql="SELECT `Code client`, `N° commande` FROM `Factures`  ORDER BY `Date Commande` desc LIMIT 1 ";
        $reponse = $bdd->query($sql);
        $headLastFacture=$reponse->fetch();
        $reponse->closeCursor();
        return $headLastFacture;   
     }
     
     public function getHeadFistFacture ()
     {  
         $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $headFistFacture= array();
        $idCommande= $this->getIdCurrentCommande();
        $sql="SELECT `Code client`, `N° commande` FROM `Factures`  ORDER BY `Date Commande` asc LIMIT 1 ";
        $reponse = $bdd->query($sql);
        $headFistFacture=$reponse->fetch();
        $reponse->closeCursor();
        return $headFistFacture;   
     }
     
     public function navigateCommandeOfClient($idClient,$idCommnde)
  {
               $bdd = new DBConnexion();
               $bdd=$bdd->getPdo();
               $sql="SELECT * FROM `Factures` where `Code client` ='".$idClient."' and `N° commande`='".$idCommnde."'" ;
               $reponse = $bdd->query($sql);
               $this->CommandeCurrentClient = $reponse->fetchAll();                  
               $reponse->closeCursor();
               return  $this->CommandeCurrentClient;
    }
    
    public function renderNewCommande($commandes){
        
          $result.="<tr class='row_main_commande_' id='row_main_commande'>";
          $result.='<td  class="td_combo_select_produit" >'.$this->renderAllProduit_('combo_select_produit').'</td>';
          $result.='<td> <input type="text" name="prix_utnitaire[]" min="0" id="prix_utnitaire"  class="form-control prix_utnitaire td_combo_select_produit in" required  /> </td>';
          $result.='<td> <input type="number" name="quantite[]" id="quantite" min="0" class="form-control in" required /> </td>';
          $result.='<td> <input type="number" name="remise[]" id="remise" min="0"  class="form-control in" required /> </td>';
          //$result.='<td> <input type="number" name="total[]" id="total" readonly   class="form-control" required /> </td>';
           $result.="</tr>";    
           
           
           return $result ;
    }

    public function RenderNavigateCommandeOfClient($commandes)
    {
        //$commandes=$this->navigateCommandeOfClient($idClient,$idCommnde);
        $result="";
        for($i=0;$i<count($commandes);$i++)
            {
                 $result.="<tr>";
                $result.='<td class="open-update-component">'.$this->renderAllProduit($commandes[$i]['Réf produit']).'<input id="id-selected-produit" type="hidden"/>'.$commandes[$i]['Nom du produit'].'</td>';
                $result.='<td class="open-update-component"><input class="form-control hidden" name="prix_unitaire[]" type=" text" value="'.$commandes[$i]['Prix unitaire'].'" /> '.$commandes[$i]['Prix unitaire'].'</td>';
                $result.='<td class="open-update-component"><input class="form-control hidden"  name="quantite[]"  type=" text" value="'.$commandes[$i]['Quantité'].'" /> '.$commandes[$i]['Quantité'].'</td>';
                $result.='<td class="open-update-component"><input class="form-control hidden" name="remise[]"  type=" text" value="'.$commandes[$i]['Remise (%)'].'" /> '.$commandes[$i]['Remise (%)'].'</td>';
                $result.='<td class="open-update-component-"><input class="form-control hidden"  type=" text" value="'.$commandes[$i]['PrixTotal'].'" /> '.$commandes[$i]['PrixTotal'].'</td>';
                //$result.='<td class="open-update-component"><input type="hidden" value="'.$commandes[$i]['Port'].'" /> '.$commandes[$i]['Port'].'</td>';
                $result.='</tr>';
            }
             return  $result;
    }

    public function  getAllEmploye($idEmployeToBeInFirst,$idComposant='')
    {
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $tableListeNom='<select id="nom_employe'.$idComposant.'" name="nom_employe'.$idComposant.'" class="form-control">';
        $tableListeNum='<select id="code_employe'.$idComposant.'" name="code_employe_'.$idComposant.'" class="form-control hidden">';
        //$sql="SELECT `employés`.`N° employé`, CONCAT(`employés`.`nom`,' ',`employés`.`nom`) as nomComplet FROM `employés` ORDER BY `employés`.`N° employé`  DESC";
        
        $sql="SELECT DISTINCT `N° employé`  , `Vendeur` FROM `Factures` ";
        $sql.="where `N° employé`='".$idEmployeToBeInFirst."'";
        $sql.="UNION SELECT `N° employé`  ,CONCAT(`Prénom`,' ',`nom`)  as `Vendeur` from `employés`";
        $reponse = $bdd->query($sql);
      while ($donnees = $reponse->fetch())
        {
            $tableListeNom .= '<option id="combox_nom_employe" name="'.$donnees['N° employé'].'">'.$donnees['Vendeur'].'</option>';
            $tableListeNum .= '<option id="combox_num_employe" class="hidden">'.$donnees['N° employé'].'</option>';
        }
        $reponse->closeCursor();
         $tableListeNum.='</select>';
         $tableListeNom.='<input name="code_employe" value="1" type="hidden"></select>';
        return $tableListeNom.$tableListeNum;
                
    }
  
        public function  getAllFactures()
    {
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $allFactures=array();
        $reponse = $bdd->query("SELECT `Factures`.* FROM `Factures` order by `Date commande` asc");
        while ($donnees = $reponse->fetch())
        {
            $allFactures .= $donnees;
        }
        $reponse->closeCursor();
        return $allFactures;
                
    }
    
    public function  getAllFacturesByClient($idClient)
    {
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $allFactures=array();
        $reponse = $bdd->query("SELECT `Factures`.* FROM `Factures` where `Factures`.`Code client`='".$idClient."' order by `Date commande` asc");
        while ($donnees = $reponse->fetch())
        {
            $allFactures .= $donnees;
        }
        $reponse->closeCursor();
        return $allFactures;
                
    }
    
        public function  getAllFactureByClientAndComnande($idClient,$idCommande)
    {
        $bdd = new DBConnexion();
        $bdd=$bdd->getPdo();
        $allFactures=array();
        $sql="SELECT `Factures`.* FROM `Factures` where `Factures`.`Code client`='".$idClient."' ";
        $sql.= " and `Factures`.`N° commande`='".$idCommande."' order by `Date commande` asc";
        $reponse = $bdd->query($sql);
        while ($donnees = $reponse->fetch())
        {
            $allFactures .= $donnees;
        }
        $reponse->closeCursor();
        return $allFactures;
                
    }
    
    public function calculeSousTotal()
            {
                $sousTotal=0;
                $tmpPrixCommande=0;
                for($i=0;$i< count($this->CommandeCurrentClient);$i++)
                {
                    $tmpPrixCommande=$this->CommandeCurrentClient[$i]['PrixTotal'];
                    $sousTotal+=$tmpPrixCommande;
                }
                $this->sousTotal=$sousTotal;
                return $this->sousTotal;
            }
   public function  calculeTotal()
            {
                $total=$this->calculeSousTotal();    
                $total+=$this->CommandeCurrentClient[0]['Port'];
                $this->total=$total;
                return $this->total;
            }
    public function checkDataFromDb($nomCol,$val)
            {
                    $resulat=$val;
                    if(!isset($val) || trim($val)=="")
                    {
                        $resulat="'".$nomCol." n'est specifier'";
                    }
                    return  $resulat;
            }
   
            public function setCurrentFactureClient($idClients,$idCommande)
            {
                if(session_status()!=PHP_SESSION_DISABLED || session_status()!=PHP_SESSION_NONE )
                    {
                    session_start();
                    }
                     $_SESSION['currentClient']=$idClients;
                     $_SESSION['currentCommande']=$idCommande;
            }
            public function getIdCurrentClient()
            {
                if(session_status()!=PHP_SESSION_DISABLED || session_status()!=PHP_SESSION_NONE  )
                  {
                     session_start();
                  }
                  $idCurrentClient=(isset($_SESSION['currentClient']) || trim($_SESSION['currentClient'])!="")?$_SESSION['currentClient']:"nulldscdscsd"; 
                  return  $idCurrentClient ;
            }
            
                 public function getIdCurrentCommande()
            {
                if(session_status()!=PHP_SESSION_DISABLED || session_status()!=PHP_SESSION_NONE )
                  {
                     session_start();
                  }
                  $$idCurrentCommande=(isset($_SESSION['currentCommande']) || trim($_SESSION['currentCommande'])!="")?$_SESSION['currentCommande']:null;    
                  return  $$idCurrentCommande;      
            }
            
            public function getRenderAllProuits($refPrdExlude)
            {
                    $result="";
                   $bdd = new DBConnexion();
                    $bdd=$bdd->getPdo();
                    $sql="SELECT `Nom du produit`, `Réf produit`  FROM `produits`"; 
                    if($refPrdExlude!=null || trim($refPrdExlude)!=""){
                        $sql.="where `Réf produit` not in (".$refPrdExlude.")";
                    }
                    
                     $reponse = $bdd->query($sql);
                     $produits = $reponse->fetchAll();  
                     
                    for($i=0;$i<count($produits);$i++)
                    {
                        $result.='<option name="'.$produits[$i]['Réf produit'].'">'.$produits[$i]['Nom du produit'].'</option>';
                    }

                    return  $result;
            }
            
            public function getDateCommandeoFFactureByNumFcture($numerCommande){
                  $bdd = new DBConnexion();//10248
                $bdd=$bdd->getPdo();
                $result="";
                $sql="SELECT `Date commande` FROM `Factures` where `N° commande`='".$numerCommande."' ";
                $reponse = $bdd->query($sql);
                return $reponse->fetch()['Date commande'];
            }
            
    public function getClientOfcommande($numerCommande){
                    $bdd = new DBConnexion();//10248
                    $bdd=$bdd->getPdo();
                    $result="";
                    $sql="SELECT `Factures`.*, `Téléphone`,`fax`  FROM `Factures` inner join clients on `Factures`.`Code client`=`clients`.`Code client` where `N° commande`='".$numerCommande."'  limit 1 ";
                    $reponse = $bdd->query($sql);
                    
         while ($donnees = $reponse->fetch())
        {   
            $result .= '<b>Client: </b><label >'.$donnees['Code client'].' '.$donnees['Société'].'</label><br/>';
            $result .= '<b>Adresse: </b><label>'.$donnees['Adresse'].$donnees['Region']." ".$donnees['Ville']." ".$donnees['Pays'].'</label><br/>';
            $result .= "<b>Fax: </b><label>".$donnees['fax']."</label><br/>";
            $result .= "<b>Tel: </b><label>".$donnees['Téléphone']."</label><br/><br/>";
        }       
         $reponse->closeCursor();
         return $result;  
                    
            }
    public  function  getAllFactureByNumCommande($numerCommande)
    {
        $bdd = new DBConnexion();//10248
        $bdd=$bdd->getPdo();
        $result="";
        $sql="SELECT `Factures`.* FROM `Factures` where `N° commande`='".$numerCommande."' ";
        $reponse = $bdd->query($sql);
        //var_dump($reponse->fetch());die($sql);
        
        while ($donnees = $reponse->fetch())
        {   
            $result .= "<tr>";
            $result .= "<td>".$donnees['Nom du produit']."</td>";
            $result .= "<td>".$donnees['Prix unitaire']."</td>";
            $result .= "<td>".$donnees['Quantité']."</td>";
            $result .= "<td>".$donnees['Remise (%)']." (%)</td>";
            $result .= "<td>". number_format($donnees['PrixTotal'], 2)."</td>";
            $result .= "</tr>";
            $this->sousTotal+=number_format($donnees['PrixTotal'], 2);
             $this->port=number_format($donnees['Port'],2);
             
        }
         $this->Total=$this->sousTotal+$this->port;
         $reponse->closeCursor();
        return $result;
                
    }
    
    public function writeTotalInfacture(){
        $result='<tr style="padding:0;"><td></td><td></td><td></td><th>Sous total</th><td>'.$this->sousTotal.'</td></tr>';
        $result.='<tr><td></td><td></td><td></td><th>Port</th><td>'.$this->port.'</td></tr>';
        $result.='<tr><td></td><td></td><td></td><th>Total</th><td>'.$this->Total.'</td></tr>';
        return $result;
    }
    
    public static function statisticVente(){
         $bdd = new DBConnexion();//10248
        $bdd=$bdd->getPdo();//factures
       $sql="SELECT  YEAR(`Date commande`) as annee , COUNT(`N° commande`) AS nbrCommande FROM `commandes` GROUP BY YEAR(`Date commande`)";
        $reponse = $bdd->query($sql);
       $statistics=$reponse->fetchAll();
       $reponse->closeCursor();
       return $statistics;
    }
}
