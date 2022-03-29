<?php
require_once'./vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//require_once './model/Class_Commande.php';
require_once  './model/Class_DBConnexion.php';
require_once './model/IOperationDB.php'; 


  $allProduits= Produit::lister(); 

   
ob_start();
?>
<page>
        <div class="card-body text-primary">
                        <img width="60" src="img/les_comptoirs_logo.png">
            <table align="right" ><tr><td><label align="right" ><?php echo date("Y-m-d H:i:s"); ?></label></td></tr></table>
                       <table border="1"   cellspacing="0" bor border-collapse="true" class="table table-bordered  table-light table-responsive-md table-responsive" style=" height: 25em; ">
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
                                </tr>
                                 <?php 
                                  $json="";
                                   for($i=0;$i<count($allProduits);$i++)
                                       {
                                       $json.='{"Ref_produit":"'.$allProduits[$i]['Réf produit'].'","Nom_du_produit":"'.$allProduits[$i]['Nom du produit'].'","N_fournisseur":"'.$allProduits[$i]['N° fournisseur'].'","Code_categorie":"'.$allProduits[$i]['Code catégorie'].'","Quantité_par_unite":"'.$allProduits[$i]['Quantité par unité'];
                                       $json.=' "Prix_unitaire":"'.$allProduits[$i]['Prix unitaire'].'", "Unites_en_stock":"'.$allProduits[$i]['Unités en stock'].'" , "Unites_commandees":"'.$allProduits[$i]['Unités commandées'].'", "Niveau_de_reapprovisionnement	":"'.$allProduits[$i]['Niveau de réapprovisionnement'].'", "Indisponible":"'.$allProduits[$i]['Indisponible'].'" }';
      
                                          echo "<tr>";
                                          echo '<td>'.$allProduits[$i]['Réf produit'].'</td>'.'<td>'.$allProduits[$i]['Nom du produit'].'</td>';
                                          echo '<td>'.$allProduits[$i]['N° fournisseur'].'</td>'.'<td>'.$allProduits[$i]['Code catégorie'].'</td>';
                                          echo '<td>'.$allProduits[$i]['Quantité par unité'].'</td>'.'<td>'.$allProduits[$i]['Prix unitaire'].'</td>';
                                          echo '<td>'.$allProduits[$i]['Unités en stock'].'</td>'.'';
                                          echo '<td>'.$allProduits[$i]['Unités commandées'].'</td>'.'<td>'.$allProduits[$i]['Niveau de réapprovisionnement'].'</td>';
                                          echo '<td>'.$allProduits[$i]['Indisponible'].'</td>';    
                                          echo "</tr>";
                                          $json='';
                                       }
                                 ?>
                            </tbody>
                        </table>
      
                </div>
        <page_footer> 
         <table width="100%" align="left">
             <tr width="100%">
                 <td right="50%"  align="left" width="50%">Gestion Comptoire; </td>
                 <td left="50%" align="right" width="50%">Societe X ain SEBAA Casablanca</td>

              </tr>
        </table>

    </page_footer>
</page>

<?php 
   $content=ob_get_clean();
   $pdf =new Html2Pdf("P", "A2", "FR", "utf-8");
             try {
                 $pdf->pdf->SetAuthor('Miage 2018 - Gestion comptoire');
                 $pdf->pdf->SetTitle('Liste des produits');
                 $pdf->pdf->SetSubject('Liste des produits');
                 $pdf->pdf->SetKeywords('Liste des produits');
                 $pdf->writeHTML($content);
                 $pdf->Output('liste-produits.pdf');
             } 
             catch (HTML2PDF_exception $e) {
                 die($e);
             }
   //$s =new Class_Commande();
//var_dump($s->setCurrentCommande());
//$s->setCurrentClient();  session_start();
//var_dump($s->getHeadPrevFacture ());              
//var_dump($s->renderAllProduit(1));
?>



