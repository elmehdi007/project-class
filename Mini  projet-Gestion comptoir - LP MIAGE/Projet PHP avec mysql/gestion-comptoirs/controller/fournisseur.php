<?php
    require_once './model/IOperationDB.php'; 
    $allFournisseurs= fournisseur::lister(); 


?>

<main role="main" class="container-fluid">
    <div class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                <i class="fa fa-upload" aria-hidden="true"></i> Ajoute fournisseur</div>
                
                <div class="card-body text-primary">                       
                    <form id="form_add_fournisseur"  action="" method="post" class="">
                        <div class="form-group form-inline">  
                            <input id="nom_fournisseur" name="nom_fournisseur" id="nom_fournisseur" class="form-control" type="text" placeholder="nom de fournisseur" style="width: 50%;">
                           <input id="contact" name="contact" id="contact" class="form-control " type="text" placeholder="Contact" style="width: 50%;">
                        </div> 
                         <div class="form-group ">  
                            <input id="fonction" name="fonction" id="fonction" class="form-control" type="text" placeholder="fonction"  >
                        </div> 
                        <div class="form-group form-inline">  
                            <input id="adresse" name="adresse" id="adresse" class="form-control" type="text" placeholder="adresse" style="width: 50%;" >
                           <input id="ville" name="ville" id="ville" class="form-control " type="text" placeholder="ville" style="width: 50%;" >
                        </div> 
                         <div class="form-group form-inline">  
                            <input id="region" name="region" id="region" class="form-control" type="text" placeholder="region" style="width: 50%;" >
                           <input id="pays" name="pays" id="pays" class="form-control " type="text" placeholder="pays" style="width: 50%;" >
                        </div> 
                        
                        <div class="form-group ">  
                            <input id="code_postal" name="code_postal" id="code-postal" class="form-control" type="text" placeholder="code-postal">
                        </div> 
                        <div class="form-group form-inline">  
                            <input id="telephone" name="telephone" id="telephone" class="form-control" type="text" placeholder="Téléphone" style="width: 50%;" >
                           <input id="fax" name="fax" id="fax" class="form-control " type="text" placeholder="Fax" style="width: 50%;" >
                        </div> 
                          <div class="form-group">  
                           <input id="page" name="page"  class="form-control " type="text" placeholder="page"  >
                        </div> 
                          <label class="lbl-result" id="lbl-result-add-fournisseur"></label>
                        <button type="submit" id="btn-add-fournisseur" name="btn-add-fournisseur" class="form-control btn btn-success btn-lg btn-block">Ajouter</button>
                                    <?php
//                        if(isset($_POST['btn-add-fournisseur'])){
//                              $fournisseur=new fournisseur($_POST['nom-fournisseur'] ,$_POST['contact'] ,
//                                      $_POST['fonction'],$_POST['adresse'],
//                                      $_POST['ville'],$_POST['region'],
//                                      $_POST['code-postal'],$_POST['pays'],$_POST['telephone'],$_POST['fax'],$_POST['page']);
//                              echo $fournisseur->insert();
//                            }
                       ?>
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
                <i class="fa fa-upload" aria-hidden="true"></i> Modifier  fournisseur</div>
                
                <div class="card-body text-primary">                       
                    <form id="form_update_fournisseur" action="" method="post" class="">
                        <div class="form-group form-inline">  
                            <input id="nom_fournisseur" name="nom_fournisseur"  class="form-control" type="text" placeholder="nom de societe" style="width: 50%;">
                           <input id="contact" name="contact" id="contact" class="form-control " type="text" placeholder="Contact" style="width: 50%;">
                        </div> 
                         <div class="form-group ">  
                            <input id="fonction" name="fonction" id="fonction" class="form-control" type="text" placeholder="fonction"  >
                        </div> 
                        <div class="form-group form-inline">  
                            <input id="adresse" name="adresse" id="adresse" class="form-control" type="text" placeholder="adresse" style="width: 50%;" >
                           <input id="ville" name="ville" id="ville" class="form-control " type="text" placeholder="ville" style="width: 50%;" >
                        </div> 
                         <div class="form-group form-inline">  
                            <input id="region" name="region" id="region" class="form-control" type="text" placeholder="region" style="width: 50%;" >
                           <input id="pays" name="pays" id="pays" class="form-control " type="text" placeholder="pays" style="width: 50%;" >
                        </div> 
                        
                        <div class="form-group ">  
                            <input id="code_postal" name="code_postal"  class="form-control" type="text" placeholder="code postal">
                        </div> 
                        <div class="form-group form-inline">  
                            <input id="telephone" name="telephone" id="telephone" class="form-control" type="text" placeholder="Téléphone" style="width: 50%;" >
                           <input id="fax" name="fax" id="fax" class="form-control " type="text" placeholder="Fax" style="width: 50%;" >
                        </div> 
                         <div class="form-group">  
                           <input id="page" name="page"  class="form-control " type="text" placeholder="page"  >
                        </div> 
                        <label class="lbl-result" id="lbl-result-update-fournisseur"></label>
                        <input id="code_founisseur" name="code_founisseur"   type="hidden" >
                        <button type="submit" id=" btn-confirm-update-client" name="btn-confirm-update-fournisseur" class="form-control btn btn-success btn-lg btn-block">Modifier</button>
                                    <?php
//                        if(isset($_POST['btn-confirm-update-fournisseur'])){
//                              $fournisseur=new fournisseur($_POST['nom_fournisseur'] ,$_POST['contact'] ,
//                                      $_POST['fonction'],$_POST['adresse'],
//                                      $_POST['ville'],$_POST['region'],
//                                      $_POST['code-postal'],$_POST['pays'],$_POST['telephone'],$_POST['fax'],$_POST['page']);
//                                      $fournisseur->NumFournisseur= $_POST['code_founisseur'];
//                                  echo $fournisseur->update();
//                            }
                       ?>
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
                <i class="fa fa-upload" aria-hidden="true"></i> fournisseur</div>
                
                <div class="card-body text-primary">
                      <table class="table table-bordered  table-light table-responsive-md table-responsive" style=" height: 25em; ">
                            <tbody>
                                <tr>
                                    <th>Num Fournisseur</th>
                                    <th>Société</th>                                    
                                    <th>Contact</th>
                                    <th>Fonction</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Région</th>
                                    <th> Code postal </th>
                                    <th>Pays</th>
                                    <th> Téléphone </th>
                                    <th> Fax </th>
                                    <th>Page D'acceuil</th>
                                    <th>Modifier</th>
                                </tr>
                                 <?php 
                                  $json="";
                                   for($i=0;$i<count($allFournisseurs);$i++)
                                       {
                                         $json.='{"NumFournisseur":"'.$allFournisseurs[$i]['N° fournisseur'].'","societe":"'.$allFournisseurs[$i]['Société'].'","contact":"'.$allFournisseurs[$i]['Contact'].'","fonction":"'.$allFournisseurs[$i]['Fonction'].'","adresse":"'.$allFournisseurs[$i]['Adresse'].'","ville":"'.$allFournisseurs[$i]['Ville'].'" , ';
                                        $json.=' "region":"'.$allFournisseurs[$i]['Région'].'", "codePostal":"'.$allFournisseurs[$i]['Code postal'].'" , "pays":"'.$allFournisseurs[$i]['Pays'].'", "telephone":"'.$allFournisseurs[$i]['Téléphone'].'", "fax":"'.$allFournisseurs[$i]['Fax'].'" '.', "pageAcceuil":"'.$allFournisseurs[$i]['Page accueil'].'" }';                                        
                                         echo "<tr>";
                                         echo '<td>'.$allFournisseurs[$i]['N° fournisseur'].'</td>'.'<td>'.$allFournisseurs[$i]['Société'].'</td>';
                                         echo '<td>'.$allFournisseurs[$i]['Contact'].'</td>'.'<td>'.$allFournisseurs[$i]['Fonction'].'</td>';
                                         echo '<td>'.$allFournisseurs[$i]['Adresse'].'</td>'.'<td>'.$allFournisseurs[$i]['Ville'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Région'].'</td>'.'<td>'.$allFournisseurs[$i]['Code postal'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Pays'].'</td>'.'<td>'.$allFournisseurs[$i]['Téléphone'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Fax'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Page accueil'].'</td>';
                                          echo  '<td><label class="hidden">'.$json.'</label><button data="'.'" id="btn-update-client" name="btn-update-client" class="btn-primary btn-update-client"   >Modifier</button></td>';                                             
                                          echo "</tr>";
                                          $json='';
                                       }
                                 ?>
                            </tbody>
                        </table>
                    <a href="./imprime-fournisseur.php" target="_blanc" class="form-control btn btn-success btn-lg btn-block">Imprimer</a>
                </div>
                 </div>
            </div>

        </div>
    </div>
    <hr/>
</main>
    <!-- -->
    
    <script src="./js/fournisseur-js.js"> </script>