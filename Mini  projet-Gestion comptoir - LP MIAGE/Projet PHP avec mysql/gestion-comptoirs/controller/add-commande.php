<?php
    include  'model/Class_Commande.php';
    $commande= new Class_Commande();

    
?>

<main role="main" class="container">
    <div class="row /**justify-content-md-center**/" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card border-secondary mb-3" style="">

                <div class="card-header">
                    <i class="fa fa-upload" aria-hidden="true"></i> Commandes</div>
                <div class="card-body text-primary">
                    <form  action="#" method="post" class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Code client</label>
                                    <select id="code-clients" name="code-clients" class="form-control">
                                        <?php 
                                             echo  ($commande->renderAllClientHTML($currentClient['Code client']));
                                        ?>
                                    </select>
                                    <input type="hidden" name="id-client" />
                                    <!--<input type="text" id="code-client" name="code-client" class="form-control" placeholder="code client" required>-->
                                </div>

                                <div class="form-group">
                                    <label for="Adresse"><?php  ?></label>
                                    <div class="form-group-">
                                        <label for="ville"><?php ?></label>
                                        <label for="region"><?php   ?></label>
                                        <label for="code-postale"><?php  ?></label>
                                    </div>
                                    <label class="" style="text-align: right" for="code"><?php   ?></label><br/>
                                </div>
                             <div class="form-group">
                                    <label for="code">Representant</label>
                                    <select id="code-employe" name="code-employe" class="form-control">
                                        <?php
                                          echo $commande->getAllEmploye($CommandeCurrentClient[0]['N° employé']);
                                        ?>
                                    </select>
                                    <input type="hidden" name="id-employe" id="id-employe" />
                                    <!--<input type="text" id="code-client" name="code-client" class="form-control" placeholder="code client" required>-->
                           </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Envoye a </label>
                                    <input type="text" id="nom-client-livraison" value="" name="nom-client-livraison" class="form-control" placeholder="destinataire" required>
                                </div>

                                <div class="form-group">
                                    <label for="adresse-destinataire">adresse Destinataire</label>
                                    <input type="text" id="adresse-destinataire" name="adresse-destinataire" value="" class="form-control" placeholder="adresse Destinataire" required>
                                </div>
                                 
                                 <div class="form-group form-inline">
                                    <input type="text" id="ville-destinataire" value="" name="ville-destinataire" class="form-control" placeholder="ville Destinataire" style="width: 163px;" required>
                                    <input type="text" id="region-destinataire" value="" name="region-destinataire" class="form-control" placeholder="region Destinataire" style="width: 163px;margin: 0 6px;" required>
                                    <input type="text" id="code-postale-destinataire"  value=""  name="code-postale-destinataire" class="form-control" placeholder="code postale Destinataire" style="width: 163px;margin: 0 6px;" required>
                                 </div>
                               <div class="form-group">
                                    <input type="text" id="pays-liveraison" value=""  name="pays-liveraison" class="form-control" placeholder="pays livarison Destinataire" required>
                                </div>
                               <div class="form-group">
                                     <input type="text" id="port"  value=""  name="port" class="form-control" placeholder="port" style="" required>
                                </div>

                                <fieldset class="" style="display: block;padding-top: 0.35em;padding-bottom: 0.625em;padding-left: 0.75em;padding-right: 0.75em;border: 2px groove #eee !important;">
                                  <legend>Messager:</legend>
                                      <label class="lbl-rdio" ><input class="in-rdio" type="checkbox" name="messager-Speedy">Speedy</label>
                                      <label  class="lbl-rdio"><input class="in-rdio" type="checkbox" name="messager-united">united</label>
                                      <label  class="lbl-rdio"><input class="in-rdio" type="checkbox" name="messager-federal">federal</label>
                                </fieldset>
                                
                            </div>
                        </div> 
                         <div class="form-group">
                            <div class="flex">
                                <div class="flex-parti" style="padding-top: 4px;">
                                         <label for="num-commande">Num comm:</label>
                                     </div>
                                    <div class="flex-parti">
                                         <label for="date-commande">Date comm: </label>
                                         <input class="form-control" type="text" name="date-commande" value=""/>
                                     </div>
                                      <div class="flex-parti">
                                         <label for="livraisson-avant-date">a liver avant: </label>
                                         <input class="form-control" type="text" id="livraisson-avant-date" name="livraisson-avant-date" value="" />
                                     </div>
                                       <div class="flex-parti">
                                         <label for="date-envoi">Date envoi: </label>
                                         <input class="form-control" type="text" name="date-envoi" name="date-envoi" value="" />
                                     </div>
                            </div>
                         </div>
                              <div class="form-group">
                                  <label>Ajouter produits </label>
                                <select>
                                    <?php echo $commande->getRenderAllProuits(null);?>
                                </select>
                                    <button type="submit" id="btn-add-commande" class="form-control btn btn-success btn-lg btn-block">Ajouter commande</button>
                             </div>
                        <button type="submit" id="btn-add-commande" class="form-control btn btn-success btn-lg btn-block">Ajouter commande</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <hr/>
</main>
    <!-- -->
