<?php
// require_once './model/Class_DBConnexion.php';
require_once './model/IOperationDB.php'; 
    $allClient=Client::lister();  
    // Client::checkExistClient("WOLZA"); 
   //echo Client::genererCodeClient("aa cccccddd"); die();
?>

<main role="main" class="container-fluid">
    <div class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                <i class="fa fa-upload" aria-hidden="true"></i> Ajoute Clients</div>
                
                <div class="card-body text-primary">                       
                    <form id="form_add_client" name="form-add-client"  action="" method="post" class="" >
                        <div class="form-group form-inline">  
                            <input id="nom_societe" name="nom-societe" id="nom-societe" class="form-control" type="text" placeholder="nom de societe" style="width: 50%;">
                           <input id="Contact" name="contact" id="Contact" class="form-control " type="text" placeholder="Contact" style="width: 50%;">
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
                            <input id="code_postal" name="code-postal" id="code-postal" class="form-control" type="text" placeholder="code-postal">
                        </div> 
                        <div class="form-group form-inline">  
                            <input id="telephone" name="telephone" id="telephone" class="form-control" type="text" placeholder="Téléphone" style="width: 50%;" >
                           <input id="fax" name="fax" id="fax" class="form-control " type="text" placeholder="Fax" style="width: 50%;" >
                        </div> 
                        <label id="lbl-result-add-client"></label>
                        <button type="submit" id="btn-add-client" name="btn-add-client" class="form-control btn btn-success btn-lg btn-block">Ajouter Client</button>
                                    <?php
//                        if(isset($_POST['btn-add-client'])){
                            //echo "<h1>Heloo</h1>";
//                              $client=new Client($_POST['nom-societe'] ,$_POST['contact'] ,
//                                      $_POST['fonction'],$_POST['adresse'],
//                                      $_POST['ville'],$_POST['region'],
//                                      $_POST['code-postal'],$_POST['pays'],$_POST['telephone'],$_POST['fax']);
//                              echo $client->insert();
//							  
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
        <main id="main-update-client "  role="main" class="container-fluid">
    <div id="main-update-client" class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                <i class="fa fa-upload" aria-hidden="true"></i> Modifier  Client</div>
                
                <div class="card-body text-primary">                       
                    <form  id="form_update_client" name="form_update_client"  action="" method="post" class="">
                        <div class="form-group form-inline">  
                            <input id="nom_societe" name="nom_societe" id="nom_societe" class="form-control" type="text" placeholder="nom de societe" style="width: 50%;">
                           <input id="Contact" name="contact" id="Contact" class="form-control " type="text" placeholder="Contact" style="width: 50%;">
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
                            <input id="code_postal" name="code_postal"  class="form-control" type="text" placeholder="code-postal">
                        </div> 
                        <div class="form-group form-inline">  
                            <input id="telephone" name="telephone" id="telephone" class="form-control" type="text" placeholder="Téléphone" style="width: 50%;" >
                           <input id="fax" name="fax" id="fax" class="form-control " type="text" placeholder="Fax" style="width: 50%;" >
                        </div> 
                        <input id="code_client" name="code_client"   type="hidden" >
                        <label id="lbl-result-update-client"></label>
                        <button type="submit" id="btn-confirm-update-client" name="btn-confirm-update-client" class="form-control btn btn-success btn-lg btn-block">Modifier Client</button>
                                    <?php
//                        if(isset($_POST['btn-confirm-update-client'])){
//                              $client=new Client($_POST['nom_societe'] ,$_POST['contact'] ,
//                                      $_POST['fonction'],$_POST['adresse'],
//                                      $_POST['ville'],$_POST['region'],
//                                      $_POST['code_postal'],$_POST['pays'],$_POST['telephone'],$_POST['fax']);
//                              $client->codeClient= $_POST['code_client'];
//                                  echo $client->update();
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
                <i class="fa fa-upload" aria-hidden="true"></i> Clients</div>
                
                <div class="card-body text-primary">
                      <table class="table table-bordered  table-light table-responsive-md table-responsive" style=" height: 25em; ">
                            <tbody>
                                <tr>
                                    <th>Code Client</th>
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
                                    <th>Modifier</th>
                                </tr>
                                 <?php 
                                  $json="";
                                   for($i=0;$i<count($allClient);$i++)
                                       {
                                         $json.='{"codeClient":"'.$allClient[$i]['Code client'].'","societe":"'.$allClient[$i]['Société'].'","contact":"'.$allClient[$i]['Contact'].'","fonction":"'.$allClient[$i]['Fonction'].'","adresse":"'.$allClient[$i]['Adresse'].'","ville":"'.$allClient[$i]['Ville'].'" , ';
                                         $json.=' "region":"'.$allClient[$i]['Région'].'", "codePostal":"'.$allClient[$i]['Code postal'].'" , "pays":"'.$allClient[$i]['Pays'].'", "telephone":"'.$allClient[$i]['Téléphone'].'", "fax":"'.$allClient[$i]['Fax'].'" }';
                                         
                                          echo "<tr>";
                                          echo '<td>'.$allClient[$i]['Code client'].'</td>'.'<td>'.$allClient[$i]['Société'].'</td>';
                                          echo '<td>'.$allClient[$i]['Contact'].'</td>'.'<td>'.$allClient[$i]['Fonction'].'</td>';
                                          echo '<td>'.$allClient[$i]['Adresse'].'</td>'.'<td>'.$allClient[$i]['Ville'].'</td>';
                                          echo '<td>'.$allClient[$i]['Région'].'</td>'.'<td>'.$allClient[$i]['Code postal'].'</td>';
                                          echo '<td>'.$allClient[$i]['Pays'].'</td>'.'<td>'.$allClient[$i]['Téléphone'].'</td>';
                                          echo '<td>'.$allClient[$i]['Fax'].'</td><td><label class="hidden">'.$json.'</label><button data="'.'" id="btn-update-client" name="btn-update-client" class="btn-primary btn-update-client"   >Modifier</button></td>';    
                                          echo "</tr>";
                                          $json='';
                                       }
                                 ?>
                            </tbody>
                        </table>
                       <a class="form-control btn btn-success btn-lg btn-block" target="_blank" href="./imprime-clients.php">Imprimer</a>
                </div>
                 </div>
            </div>
        </div>
    </div>
    <hr/>
</main>
    <!-- -->
    
    <script src="./js/client-js.js"></script>
    
   