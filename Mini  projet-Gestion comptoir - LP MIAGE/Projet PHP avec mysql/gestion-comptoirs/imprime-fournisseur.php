<?php

//require_once './model/Class_Commande.php';
require_once  './model/Class_DBConnexion.php';
require_once './model/IOperationDB.php'; 
require_once'./vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$allFournisseurs= fournisseur::lister();  

ob_start();
?>
<style>
    th{
        padding: 5mm 2mm;
    }
    td{
        text-align: center;
         text-align: center;
    }
    .right{
        float: right;
        text-align: right;
        right: 0;
    }
</style>
<page>
        <div class="card-body text-primary">
                        <img width="60" src="img/les_comptoirs_logo.png">
                        <label align="right" class="left" style=" float: left;text-align: left;"><?php echo date("Y-m-d H:i:s"); ?></label><br/><br/>
                        <h2>Liste de fournisseur</h2>
                        <table border="1"   cellspacing="0" bor border-collapse="true" class="">
                            <tbody>
                                <tr  style="">
                                    <th >Num Four</th>
                                    <th>Société</th>                                    
                                    <th>Contact</th>
                                    <th>Fonction</th>
                                    <th>Adresse</th>
                                    <th>Région</th>
                                    <th> Code postal </th>
                                    <th>Pays</th>
                                    <th> Téléphone </th>
                                    <th> Fax </th>
                                    <th>Page D'acceuil</th>
                                </tr>
                                 <?php 
                                       for($i=0;$i<count($allFournisseurs);$i++)
                                       {
                                         echo "<tr>";
                                         echo '<td>'.$allFournisseurs[$i]['N° fournisseur'].'</td>'.'<td>'.$allFournisseurs[$i]['Société'].'</td>';
                                         echo '<td>'.$allFournisseurs[$i]['Contact'].'</td>'.'<td>'.$allFournisseurs[$i]['Fonction'].'</td>';
                                         echo '<td>'.$allFournisseurs[$i]['Adresse'].'<br/>'.$allFournisseurs[$i]['Ville'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Région'].'</td>'.'<td>'.$allFournisseurs[$i]['Code postal'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Pays'].'</td>'.'<td>'.$allFournisseurs[$i]['Téléphone'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Fax'].'</td>';
                                          echo '<td>'.$allFournisseurs[$i]['Page accueil'].'</td>';
                                          echo "</tr>";
                                       }
                                 ?>
                            </tbody>
                        </table>
      
                </div>
    <page_footer> 
          <table >
             <tr width="100%">
                 <td right="50%"  align="left" width="50%">Gestion Comptoire; </td>
                 <td left="50%" align="right" width="50%">Societe X ain SEBAA Casablanca</td>

              </tr>
        </table>

    </page_footer>
</page>

<?php 
   $content=ob_get_clean();
   $pdf =new Html2Pdf("P", "A2", "FR",true, "utf-8");
             try {
                 $pdf->pdf->SetAuthor('Miage 2018 - Gestion comptoire');
                 $pdf->pdf->SetTitle('Liste fournisseurs');
                 $pdf->pdf->SetSubject('Liste fournisseurs');
                 $pdf->pdf->SetKeywords('liste fournisseurs');
                 $pdf->writeHTML($content);
                 $pdf->Output('liste-fournisseurs.pdf');
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



