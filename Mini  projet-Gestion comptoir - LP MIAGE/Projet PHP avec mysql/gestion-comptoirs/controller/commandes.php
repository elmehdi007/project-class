<?php
    include  'model/Class_Commande.php';
    $commande= new Class_Commande();
     $currentClient;
    if($commande->getIdCurrentClient()==NULL || $commande->getIdCurrentCommande()==NULL ){
        $currentClient=$commande->getFirstClientHasCommande();
    }
    
    else{                   
        $headNextFacture; $idClient;$idComande;
        $nextAction=$_GET['action'];
        if($nextAction=="next")
            {
               $headNextFacture= $commande->getHeadNextFacture();
               $idClient=$headNextFacture['Code client'];
               $idComande=$headNextFacture['N° commande'];
            }
          else if ($nextAction=="prev")
              {
                $headNextFacture= $commande->getHeadPrevFacture();
                $idClient=$headNextFacture['Code client'];
                $idComande=$headNextFacture['N° commande'];
              }
       
              else if ($nextAction=="last")
              {
                $headLastFacture= $commande->getHeadLastFacture();
                $idClient=$headLastFacture['Code client'];
                $idComande=$headLastFacture['N° commande'];
              }
             else //if ($nextAction=="first") and other
              {
                $headFistFacture= $commande->getHeadFistFacture();
                $idClient=$headFistFacture['Code client'];
                $idComande=$headFistFacture['N° commande'];
              }
        $currentClient=$commande->getClientHasCommandeByIdAndIdCommande($idClient, $idComande);
    }
    
    
    $CommandeCurrentClient=$commande->navigateCommandeOfClient($currentClient['Code client'], $currentClient['N° commande']);
    $commande->setCurrentFactureClient($currentClient['Code client'], $currentClient['N° commande']);
    
   //var_dump($CommandeCurrentClient);
  //  var_dump($commande->calculeTotal());
?>

<main role="main" class="container">
    <div class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                    <i class="fa fa-upload" aria-hidden="true"></i> Detaill Commandes</div>
                <div class="card-body text-primary">
                    <form  action="#" method="post" class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lbl-title" for="code">Code client: </label>
                                      <?php 
                                              echo "<label>".$currentClient['Code client']."</label>";
                                             //echo  ("".$commande->renderAllClientHTML($currentClient['Code client'])."");
                                      ?>
                                    <input type="hidden" name="id-client" />
                                    <!--<input type="text" id="code-client" name="code-client" class="form-control" placeholder="code client" required>-->
                                </div>

                                <div class="form-group">
                                    <label class="lbl-title-"  for="Adresse"><?php echo Class_Commande::checkDataFromDb("Adresse",$currentClient['Adresse']); ?></label>
                                    <div class="form-group">
                                        <label class="lbl-title-"  for="ville"><?php echo Class_Commande::checkDataFromDb("Ville",$currentClient['Ville']);?></label>
                                        <label class="lbl-title-"  for="region"><?php echo Class_Commande::checkDataFromDb("Région",$currentClient['Région']); ?></label>
                                        <label class="lbl-title-"  for="code-postale"><?php echo Class_Commande::checkDataFromDb("Code postal",$currentClient['Code postal']); ?></label>
                                    </div>
                                    <label class="lbl-title-"  class="" style="text-align: right" for="code"><?php echo Class_Commande::checkDataFromDb("Pays",$currentClient['Pays']);  ?></label><br/>
                                </div>
                             <div class="form-group">
                                    <label class="lbl-title"  for="code">Representant</label>
                                        <?php
                                          echo $commande->getAllEmploye($CommandeCurrentClient[0]['N° employé']);
                                        ?>
                                    <input type="hidden" name="id-employe" id="id-employe" />
                                    <!--<input type="text" id="code-client" name="code-client" class="form-control" placeholder="code client" required>-->
                           </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lbl-title"  for="code">Envoye a </label>
                                    <input type="text" id="nom-client-livraison" value="<?php echo $currentClient['Société'] ?>" name="nom-client-livraison" class="form-control" placeholder="destinataire" required>
                                </div>

                                <div class="form-group">
                                    <label class="lbl-title"  for="adresse-destinataire">adresse Destinataire</label>
                                    <input type="text" id="adresse-destinataire" name="adresse-destinataire" value="" class="form-control" placeholder="adresse Destinataire" required>
                                </div>
                                 
                                 <div class="form-group form-inline">
                                    <input type="text" id="ville-destinataire" value="<?php echo $currentClient['Ville livraison']; ?>" name="ville-destinataire" class="form-control" placeholder="ville Destinataire" style="width: 163px;" required>
                                    <input type="text" id="region-destinataire" value="<?php echo $currentClient['Région livraison']; ?>" name="region-destinataire" class="form-control" placeholder="region Destinataire" style="width: 163px;margin: 0 6px;" >
                                    <input type="text" id="code-postale-destinataire"  value="<?php echo $currentClient['Code postal livraison']; ?>"  name="code-postale-destinataire" class="form-control" placeholder="code postale Destinataire" style="width: 163px;margin: 0 6px;">
                                </div>
                               <div class="form-group">
                                    <input type="text" id="pays-liveraison" value="<?php echo $currentClient['Pays livraison']; ?>"  name="pays-liveraison" class="form-control" placeholder="pays livarison Destinataire" required>
                                </div>

                                <fieldset class="" style="display: block;padding-top: 0.35em;padding-bottom: 0.625em;padding-left: 0.75em;padding-right: 0.75em;border: 2px groove #eee !important;">
                                  <legend>Messager:</legend>
                                      <?php $messagerCommandeCurrentClient=$CommandeCurrentClient["Nom du messager"]; ?>
                                       
                                  <label class="lbl-title"  class="lbl-rdio" ><input class="in-rdio" type="checkbox" name="messager-Speedy" <?php if($messagerCommandeCurrentClient=="Speedy Express") echo "checked" ;?> >Speedy</label>
                                      <label class="lbl-title"   class="lbl-rdio"><input class="in-rdio" type="checkbox" name="messager-united"  <?php if($messagerCommandeCurrentClient=="United Package") echo "checked" ;?> >united</label>
                                      <label class="lbl-title"   class="lbl-rdio"><input class="in-rdio" type="checkbox" name="messager-federal"  <?php if($messagerCommandeCurrentClient=="Federal Shipping") echo "checked" ;?> >federal</label>
                                </fieldset>
                                
                            </div>
                        </div> 
                         <div class="form-group">
                            <div class="flex">
                                <div class="flex-parti" style="padding-top: 4px;">
                                         <label class="lbl-title"  for="num-commande">Num comm: <?php echo ($CommandeCurrentClient[0]['N° commande']); ?></label>
                                     </div>
                                    <div class="flex-parti">
                                         <label class="lbl-title"  for="date-commande">Date comm: </label>
                                         <input class="form-control" type="text" name="date-commande" value="<?php echo ($CommandeCurrentClient[0]['Date commande']); ?>"/>
                                     </div>
                                      <div class="flex-parti">
                                         <label class="lbl-title"  for="livraisson-avant-date">a liver avant: </label>
                                         <input class="form-control" type="text" id="livraisson-avant-date" name="livraisson-avant-date" value="<?php echo ($CommandeCurrentClient[0]['À livrer avant']); ?>" />
                                     </div>
                                       <div class="flex-parti">
                                         <label class="lbl-title"  for="date-envoi">Date envoi: </label>
                                         <input class="form-control" type="text" name="date-envoi" name="date-envoi" value="<?php echo ($CommandeCurrentClient[0]['Date envoi']); ?>" />
                                     </div>
                            </div>
                         </div>
                        <hr/>
                        <table class="table table-bordered  table-light table-responsive-md">
                            <tbody>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantite</th>
                                    <th>Remise</th>
                                    <th>Prix Total</th>
                                </tr>
                                    <?php 
                                        echo ($commande->RenderNavigateCommandeOfClient($CommandeCurrentClient));
                                    ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                             </div>
                           <div class="col-md-6">
                               <div class="form-group"> <label class="lbl-title" >Sous Total: </label><label ><?php echo ($commande->calculeSousTotal()); ?></label></div>
                               <div class="form-group"> <label class="lbl-title" >Port</label><input type="text" name="port" id="port"  value="<?php echo ($CommandeCurrentClient[0]['Port']); ?>"  class="form-control"/></div>
                               <div class="form-group"><label class="lbl-title" > Total: </label ><label><?php echo ($commande->calculeTotal()); ?></label></div >
                             </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <a class="pagn" href="./?p=commandes&action=prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>Présidant</a>
                                <a class="pagn" href="./?p=commandes&action=next"><i class="fa fa-chevron-right" aria-hidden="true"></i>Suivant</a>
                                <a class="pagn" class="pagn" href="./?p=commandes&action=last"><i class="fa fa-step-forward" aria-hidden="true"></i>Dernier</a>
                            <a class="pagn" href="./?p=commandes&action=first"><i class="fa fa-step-backward" aria-hidden="true"></i>Premier</a>
                        </div>
                         <div class="form-group ">
                             <!--<button type="submit" id="btn-add-commande" name="btn-update-commande" class="form-control btn btn-success btn-lg btn-block">Modifier</button>-->
                             <?php  //die (($CommandeCurrentClient[0]['N° commande']))
                         echo '<a  target="_blank" href="./imprimer-facture.php?numcomd='.$CommandeCurrentClient[0]['N° commande'].'" class="form-control btn btn-success btn-lg btn-block">Imprimer</a>';
                       ;?>
                         </div>
          
                    </form>
                    <!--<div class="form-group ">
                        <br/><button type="submit" id="btn-add-commande" class="form-control btn btn-success btn-lg btn-block">Ajouter commande</button>
                    </div>-->

                </div>
            </div>

        </div>
    </div>
    <hr/>
    
    <div class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                    <i class="fa fa-upload" aria-hidden="true"></i> Ajouter Commandes</div>
                <div class="card-body text-primary">
                    <form  action="#" method="post" class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lbl-title" for="code">Code client: </label>
                                      <?php 
                                              echo  $commande->renderAllClientHTML('in_code_client');
                                             //echo  ("".$commande->renderAllClientHTML($currentClient['Code client'])."");
                                      ?>
                                    <input type="hidden" name="id-client" />
                                    <!--<input type="text" id="code-client" name="code-client" class="form-control" placeholder="code client" required>-->
                                </div>

                                <div class="form-group">
                                    <label id="lbl_adresse" class="lbl-title-"  for="Adresse"></label>
                                    <div class="form-group">
                                        <label id="lbl_ville" class="lbl-title-"  for="ville"> </label>
                                        <label  id="lbl_region" class="lbl-title-"  for="region"> </label>
                                        <label id="lbl_postale" class="lbl-title-"  for="code-postale"></label>
                                    </div>
                                    <label  id="lbl_pays" class="lbl-title-"  class="" style="text-align: right" for="code"></label><br/>
                                </div>
                             <div class="form-group">
                                    <label class="lbl-title"  for="code">Representant</label>
                                   
                                        <?php
                                          echo $commande->getAllEmploye($CommandeCurrentClient[0]['N° employé'],'_in');
                                        ?>
                                    <input type="hidden" name="id-employe" id="id-employe" />
                                    <!--<input type="text" id="code-client" name="code-client" class="form-control" placeholder="code client" required>-->
                           </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lbl-title"  for="code">Envoye a </label>
                                    <input type="text" id="in_nom_client_livraison" value="" name="in_nom_client_livraison" class="form-control" placeholder="destinataire" required>
                                </div>

                                <div class="form-group">
                                    <label class="lbl-title"  for="adresse-destinataire">adresse Destinataire</label>
                                    <input type="text" id="in_adresse_destinataire" name="in_adresse_destinataire" value="<?php echo $currentClient['Adresse livraison']; ?>" class="form-control" placeholder="adresse Destinataire" required>
                                </div>
                                 
                                 <div class="form-group form-inline">
                                    <input type="text" id="in_ville_destinataire" value="" name="in_ville_destinataire" class="form-control" placeholder="ville Destinataire" style="width: 163px;" required>
                                    <input type="text" id="in_region_destinataire" value="" name="in_region_destinataire" class="form-control" placeholder="region Destinataire" style="width: 163px;margin: 0 6px;" >
                                    <input type="text" id="in_code_postale_destinataire"  value=""  name="in_code_postale_destinataire" class="form-control" placeholder="code postale Destinataire" style="width: 163px;margin: 0 6px;" required>
                                </div>
                               <div class="form-group">
                                    <input type="text" id="in_pays_liveraison" value=""  name="in_pays_liveraison" class="form-control" placeholder="pays livarison Destinataire" required>
                                </div>

                                <fieldset class="" style="display: block;padding-top: 0.35em;padding-bottom: 0.625em;padding-left: 0.75em;padding-right: 0.75em;border: 2px groove #eee !important;">
                                  <legend>Messager:</legend>
                                      <?php $messagerCommandeCurrentClient=$CommandeCurrentClient["Nom du messager"]; ?>
                                       
                                  <label class="lbl-title"  class="lbl-rdio" ><input class="in-rdio" type="radio" name="messager-Speedy" >Speedy</label>
                                  <label class="lbl-title"   class="lbl-rdio"><input class="in-rdio" type="radio" name="messager-united" >united</label>
                                  <label class="lbl-title"   class="lbl-rdio"><input class="in-rdio" type="radio" name="messager-federal" checked>federal</label>
                                </fieldset>
                                
                            </div>
                        </div> 
                         <div class="form-group">
                            <div class="flex">
                                <div class="flex-parti" style="padding-top: 4px;">
                                         <label class="lbl-title"  for="num-commande">Num comm: <?php echo ($CommandeCurrentClient[0]['N° commande']); ?></label>
                                     </div>
                                    <div class="flex-parti">
                                         <label class="lbl-title"  for="date-commande">Date comm: </label>
                                         <input class="form-control" type="date" name="date-commande" value=""/>
                                     </div>
                                      <div class="flex-parti">
                                         <label class="lbl-title"  for="livraisson-avant-date">a liver avant: </label>
                                         <input class="form-control" type="date" id="livraisson-avant-date" name="livraisson-avant-date" value="" />
                                     </div>
                                       <div class="flex-parti">
                                         <label class="lbl-title"  for="date-envoi">Date envoi: </label>
                                         <input class="form-control" type="date" name="date-envoi" name="date-envoi" value="" />
                                     </div>
                            </div>
                         </div>
                        <hr/>
                        <table  class="table table-bordered table-light table-responsive-md">
                            <tbody id="table_prepare_commande">
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantite</th>
                                    <th>Remise</th>
                                    <!--<th>Prix Total</th>-->
                                </tr>
                                    <?php 
                                        echo ($commande->renderNewCommande($CommandeCurrentClient));
                                    ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                             </div>
                           <div class="col-md-6">
                               <input type="button" id="btn_add_ligne" class="form-control btn btn-success btn-lg btn-block" value="Nouvelle ligne" />
                               <input type="button" id="remove_last_row_new_comd" class="form-control btn btn-success btn-lg btn-block" value="Suprimer dernier ligne" />
                               <div class="form-group"> <label class="lbl-title" >Port</label><input type="number" name="port"  id="port"  value="<?php ?>"  class="form-control"/></div>
                             </div>
                        </div>
                        
						    
                        <div class="form-group ">
                                <br/><button type="submit" id="btn_add_commande" name="btn_add_commande" class="form-control btn btn-success btn-lg btn-block">Ajouter commande</button>
                        </div>
                        <?php 
                            if(isset($_POST['btn_add_commande'])){
                                   require_once './model/Class_DBConnexion.php';
                                  require_once './model/IOperationDB.php'; 
                                  require_once './model/Class_Commande.php';
                                   $commande = new Class_Commande();
                                   $commande->loadListProduit($_POST);
                                   $numeroMessager="1";
                                   if($_POST['messager-federal'])$numeroMessager=3; else $numeroMessager=2;
                               //    var_dump(  $commande->listProduit);  exit();
                                    
                                  echo $commande->addCommande($_POST['in_code_client_name'],$_POST['code_employe'],$_POST['date-commande'],$_POST['livraisson-avant-date'],$_POST['date-envoi'],$numeroMessager,$_POST['port'],$_POST['in_nom_client_livraison'],$_POST['in_adresse_destinataire'],$_POST['in_ville_destinataire'],$_POST['in_region_destinataire'],$_POST['in_code_postale_destinataire'],$_POST['in_pays_liveraison']);
                                  $commande->imprimeaAddedPDF();
                            }
                        ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
<!--        <div class="form-group">
            <h2>Imprimer une facture</h2>
            <input class="form-control " id="input-numero-commande" type="text" name="numero-facture" name="date-envoi" placeholder="Numero de commande" required/><br/>
            <button type="submit"  id="btn-imprimer-fact" class="form-control btn btn-success btn-lg btn-block">Imprimer</button>
       </div>-->
</main>

  <script src="js/commande.js"></script>

    <!-- -->
