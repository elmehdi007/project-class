<?php
// require_once './model/Class_DBConnexion.php';
require_once './model/IOperationDB.php'; 
    $allProduits= Produit::lister();  
    // Client::checkExistClient("WOLZA"); 
   //echo Client::genererCodeClient("aa cccccddd"); die();
?>

<main role="main" class="container-fluid">
    <div class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                <i class="fa fa-upload" aria-hidden="true"></i> Ajoute produit</div>
                
                <div class="card-body text-primary">                       
                    <form id="form_add_produit" name="form_add_produit"  action="" method="post" class="" >
                        <div class="form-group form-inline">  
                            <input id="Nom_du_produit" name="Nom_du_produit" id="Nom_du_produit" class="form-control" type="text" placeholder="Nom du produit" style="width: 50%;">
                           <!--<input id="n_fournisseur" name="n_fournisseur" id="n_fournisseur" class="form-control " type="text" placeholder="N° fournisseur" style="width: 50%;">-->
                          <?php echo Produit::renderHTMLFourniseur(); ?>
                        </div> 
                         <div class="form-group ">  
                            <!--<input id="code_categorie" name="code_categorie" id="code_categorie" class="form-control" type="text" placeholder="Code catégorie"  >-->
                         <?php  echo Produit::renderHTMLcategorie()?>
                         </div> 
                        <div class="form-group form-inline">  
                            <input id="quantite_par_unite" name="quantite_par_unite" id="quantite_par_unite" class="form-control" type="text" placeholder="Quantité par unité" style="width: 50%;" >
                            <input id="prix_unitaire" name="prix_unitaire" id="prix_unitaire" class="form-control " type="number" min="1" placeholder="Prix unitaire" style="width: 50%;" >
                        </div> 
                         <div class="form-group form-inline">  
                             <input id="unites_en_stock" name="unites_en_stock" id="unites_en_stock" class="form-control" type="number" min="1" placeholder="Unités en stock" style="width: 50%;" >
                             <input id="unites_commandees" name="unites_commandees" id="unites_commandees" class="form-control " type="number" placeholder="Unités commandées" style="width: 50%;" >
                        </div> 
                        
                        <div class="form-group ">  
                            <input id="niveau_de_reapprovisionnement" name="niveau_de_reapprovisionnement" id="niveau_de_reapprovisionnement" class="form-control" type="number" placeholder="Niveau de réapprovisionnement">
                        </div> 
                        <div class="form-group form-inline">  
                            <label><input id="indisponible" name="indisponible" id="indisponible" class="form-control" type="checkbox" >&ThinSpace; Indisponible</label>
                        </div> 
                        <label id="lbl-result-add-produit"></label>
                        <button type="submit" id="btn-add-client" name="btn-add-client" class="form-control btn btn-success btn-lg btn-block">Ajouter</button>

                    </form>
   
                </div>
                 </div>
            </div>

        </div>
    </div>
    <hr/>
</main>
    <!-- -->
        <main id="main-update-client "  role="main" class="container-fluid">
    <div id="main-update-client" class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                <i class="fa fa-upload" aria-hidden="true"></i> Modifier produit</div>
                
                <div class="card-body text-primary">                       
                    <form  id="form_update_produit" name="form_update_client"  action="" method="post" class="">
                                   <div class="form-group form-inline">  
                            <input   name="Nom_du_produit" id="Nom_du_produit" class="form-control" type="text" placeholder="Nom du produit" style="width: 50%;">
                           <!--<input id="n_fournisseur" name="n_fournisseur" id="n_fournisseur" class="form-control " type="text" placeholder="N° fournisseur" style="width: 50%;">-->
                          <?php echo Produit::renderHTMLFourniseur(); ?>
                        </div> 
                         <div class="form-group ">  
                            <!--<input id="code_categorie" name="code_categorie" id="code_categorie" class="form-control" type="text" placeholder="Code catégorie"  >-->
                         <?php  echo Produit::renderHTMLcategorie()?>
                         </div> 
                        <div class="form-group form-inline">  
                            <input id="quantite_par_unite" name="quantite_par_unite" id="quantite_par_unite" class="form-control" type="text" placeholder="Quantité par unité" style="width: 50%;" >
                            <input id="prix_unitaire" name="prix_unitaire" id="prix_unitaire" class="form-control " type="number" min="1" placeholder="Prix unitaire" style="width: 50%;" >
                        </div> 
                         <div class="form-group form-inline">  
                             <input id="unites_en_stock" name="unites_en_stock" id="unites_en_stock" class="form-control" type="number" min="1" placeholder="Unités en stock" style="width: 50%;" >
                             <input id="unites_commandees" name="unites_commandees" id="unites_commandees" class="form-control " type="number" placeholder="Unités commandées" style="width: 50%;" >
                        </div> 
                        
                        <div class="form-group ">  
                            <input id="niveau_de_reapprovisionnement" name="niveau_de_reapprovisionnement" id="niveau_de_reapprovisionnement" class="form-control" type="number" placeholder="Niveau de réapprovisionnement">
                        </div> 
                        <div class="form-group form-inline">  
                            <label><input id="indisponible" name="indisponible" id="indisponible" class="form-control" type="checkbox" >&ThinSpace; Indisponible</label>
                        </div> 
                        <label id="lbl-result-update-produit"></label>
                        <input type="hidden" name="ref_produit">
                        <button type="submit" id="btn-add-client" name="btn-update-produit" class="form-control btn btn-success btn-lg btn-block">Modifier</button>

                    </form>
   
                </div>
                 </div>
            </div>

        </div>
    </div>
    <hr/>
</main>
    <!-- -->
<main role="main" class="container-fluid">
    <div class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                <i class="fa fa-upload" aria-hidden="true"></i> Produits</div>
                
                <div class="card-body text-primary">
                      <table class="table table-bordered  table-light table-responsive-md table-responsive" style=" height: 25em; ">
                            <tbody>
                                <tr>
                                    <th>Réf produit</th>
                                    <th>Nom du produit</th>                                    
                                    <th>N° fournisseur</th>
                                    <th>Code catégorie</th>
                                    <th>Quantité par unité</th>
                                    <th>Prix unitaire</th>
                                    <th>Unités en stock</th>
                                    <th>Unités commandées</th>
                                    <th> Niveau de réapprovisionnement </th>
                                    <th> Indisponible </th>
                                    <th>Modifier</th>
                                </tr>
                                 <?php 
                                  $json="";
                                   for($i=0;$i<count($allProduits);$i++)
                                       {
                                       $json.='{"Ref_produit":"'.$allProduits[$i]['Réf produit'].'","Nom_du_produit":"'.$allProduits[$i]['Nom du produit'].'","N_fournisseur":"'.$allProduits[$i]['N° fournisseur'].'","Code_categorie":"'.$allProduits[$i]['Code catégorie'].'","quantite_par_unite":"'.$allProduits[$i]['Quantité par unité'].'",';
                                       $json.=' "Prix_unitaire":"'.$allProduits[$i]['Prix unitaire'].'", "Unites_en_stock":"'.$allProduits[$i]['Unités en stock'].'" , "Unites_commandees":"'.$allProduits[$i]['Unités commandées'].'", "Niveau_de_reapprovisionnement":"'.$allProduits[$i]['Niveau de réapprovisionnement'].'", "Indisponible":"'.$allProduits[$i]['Indisponible'].'" }';
      
                                          echo "<tr>";
                                          echo '<td>'.$allProduits[$i]['Réf produit'].'</td>'.'<td>'.$allProduits[$i]['Nom du produit'].'</td>';
                                          echo '<td>'.$allProduits[$i]['N° fournisseur'].'</td>'.'<td>'.$allProduits[$i]['Code catégorie'].'</td>';
                                          echo '<td>'.$allProduits[$i]['Quantité par unité'].'</td>'.'<td>'.$allProduits[$i]['Prix unitaire'].'</td>';
                                          echo '<td>'.$allProduits[$i]['Unités en stock'].'</td>'.'';
                                          echo '<td>'.$allProduits[$i]['Unités commandées'].'</td>'.'<td>'.$allProduits[$i]['Niveau de réapprovisionnement'].'</td>';
                                          echo '<td>'.$allProduits[$i]['Indisponible'].'</td><td><label class="hidden">'.$json.'</label><button data="'.'" id="btn-update-produit" name="btn-update-client" class="btn-primary btn-update-produit"   >Modifier</button></td>';    
                                          echo "</tr>";
                                          $json='';
                                       }
                                 ?>
                            </tbody>
                        </table>
                       <a class="form-control btn btn-success btn-lg btn-block" target="_blank" href="./imprime-produits.php">Imprimer</a>
                </div>
                 </div>
            </div>
        </div>
    </div>
    <hr/>
</main>
    <!-- -->
    
    <script >
        var btnsUpdateProduit= document.getElementsByClassName('btn-update-produit'); 
         for(i=0;i<btnsUpdateProduit.length;i++){
            btnsUpdateProduit[i].onclick=function (){
            //  var donnees = eval('('+this.getAttribute("data")+')');
            //donnees=this.getAttribute("data");
            donnees=this.parentNode.childNodes[0].innerHTML;
            donnees = JSON.parse(donnees);
             form_update_produit=document.getElementById("form_update_produit");
             form_update_produit.Nom_du_produit.value=donnees.Nom_du_produit;
             form_update_produit.ref_produit.value=donnees.Ref_produit;
              //form_update_produit.n_fournisseur.value=donnees.n_fournisseur;
            // form_update_produit.code_categorie.value=donnees.code_categorie;
             form_update_produit.quantite_par_unite.value=donnees.quantite_par_unite;
             form_update_produit.prix_unitaire.value=donnees.Prix_unitaire;
             form_update_produit.unites_en_stock.value=donnees.Unites_en_stock;
             form_update_produit.unites_commandees.value=donnees.Unites_commandees;
             form_update_produit.niveau_de_reapprovisionnement.value=donnees.Niveau_de_reapprovisionnement;
            
           form_update_produit.indisponible.checked=donnees.Indisponible;
           console.log(donnees);
         }
     }     
          document.getElementById("form_add_produit").onsubmit=function(){
              var indexSelectedFournisseur=document.getElementById("nom_fournisseur").selectedIndex ;
                var indexSelectedCategorie=document.getElementById("nom_categorie").selectedIndex ;
        //alert(form_add_produit.n_categorie[indexSelectedCategorie].value);  return false;
        var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
          var param='quantite_par_unite=' + form_add_produit.quantite_par_unite.value +'Nom_du_produit=' + form_add_produit.Nom_du_produit.value + '&n_fournisseur=' + form_add_produit.n_fournisseur[indexSelectedFournisseur].value+'&code_categorie=' + form_add_produit.n_categorie[indexSelectedCategorie].value+'&prix_unitaire=' + form_add_produit.prix_unitaire.value+'&unites_en_stock=' + form_add_produit.unites_en_stock.value;
        param+='&unites_commandees=' + form_add_produit.unites_commandees.value + '&niveau_de_reapprovisionnement=' + form_add_produit.niveau_de_reapprovisionnement.value+'&indisponible=' + form_add_produit.indisponible.checked;

        // alert(param); return false;
           xhr.open('POST', "./ajax/add_produit.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                
            xhr.send(param);
            xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                         document.getElementById("lbl-result-add-produit").innerHTML=xhr.responseText;
                   }
                   else {
                         document.getElementById("lbl-result-add-produit").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     }  
     
               document.getElementById("form_update_produit").onsubmit=function(){
              var indexSelectedFournisseur=document.getElementById("nom_fournisseur").selectedIndex ;
                var indexSelectedCategorie=document.getElementById("nom_categorie").selectedIndex ;
        //alert(form_add_produit.n_categorie[indexSelectedCategorie].value);  return false;
        var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
         //  alert(form_update_produit.Nom_du_produit.value) return  false;
        var param='quantite_par_unite=' + form_update_produit.quantite_par_unite.value +'&Nom_du_produit=' + form_update_produit.Nom_du_produit.value + '&n_fournisseur=' + form_update_produit.n_fournisseur[indexSelectedFournisseur].value+'&code_categorie=' + form_update_produit.n_categorie[indexSelectedCategorie].value+'&prix_unitaire=' + form_update_produit.prix_unitaire.value+'&unites_en_stock=' + form_update_produit.unites_en_stock.value;
        param+='&unites_commandees=' + form_update_produit.unites_commandees.value + '&niveau_de_reapprovisionnement=' + form_update_produit.niveau_de_reapprovisionnement.value+ '&ref_produit=' + form_update_produit.ref_produit.value+'&indisponible=' + form_update_produit.indisponible.checked;

        // alert(param); return false;
           xhr.open('POST', "./ajax/update_produit.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                
            xhr.send(param);
            xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                         document.getElementById("lbl-result-update-produit").innerHTML=xhr.responseText;
                   }
                   else {
                         document.getElementById("lbl-result-update-produit").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     } 
    </script>
    
   