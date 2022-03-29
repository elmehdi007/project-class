<?php

//require_once './model/Class_Commande.php';
require_once  './model/Class_DBConnexion.php';
require_once './model/IOperationDB.php'; 
require_once'./vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$allClient=Client::lister();  

ob_start();
?>
<style>
    th{
        padding: 5mm 2mm;
                text-align: center;
    }
    td{
        text-align: center;
         padding: 5mm 1mm;
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
                      <table border="1"   cellspacing="0" bor border-collapse="true" class="">
                            <tbody>
                                <tr  style="">
                                    <th >Code Client</th>
                                    <th>Société</th>                                    
                                    <th >Contact</th>
                                    <th >Fonction</th>
                                    <th >Adresse</th>
                                    <th >Ville</th>
                                    <th >Région</th>
                                    <th > Code postal </th>
                                    <th >Pays</th>
                                    <th > Téléphone </th>
                                    <th > Fax </th>
                                </tr>
                                 <?php 
                                  $json="";
                                   for($i=0;$i<count($allClient);$i++)
                                       {
                                         $json.='{"codeClient":"'.$allClient[$i]['Code client'].'","societe":"'.$allClient[$i]['Société'].'","contact":"'.$allClient[$i]['Contact'].'","fonction":"'.$allClient[$i]['Fonction'].'","adresse":"'.$allClient[$i]['Adresse'].'","ville":"'.$allClient[$i]['Ville'].'" , ';
                                         $json.=' "region":"'.$allClient[$i]['Région'].'", "codePostal":"'.$allClient[$i]['Code postal'].'" , "pays":"'.$allClient[$i]['Pays'].'", "telephone":"'.$allClient[$i]['Téléphone'].'", "fax":"'.$allClient[$i]['Fax'].'" }';
                                         
                                         echo '<tr>';
                                         echo '<td >'.$allClient[$i]['Code client'].'</td>'.'<td>'.$allClient[$i]['Société'].'</td>';
                                         echo '<td  >'.$allClient[$i]['Contact'].'</td>'.'<td>'.$allClient[$i]['Fonction'].'</td>';
                                         echo '<td  >'.$allClient[$i]['Adresse'].'</td>'.'<td>'.$allClient[$i]['Ville'].'</td>';
                                          echo '<td  >'.$allClient[$i]['Région'].'</td>'.'<td>'.$allClient[$i]['Code postal'].'</td>';
                                          echo '<td  >'.$allClient[$i]['Pays'].'</td>'.'<td>'.$allClient[$i]['Téléphone'].'</td>';
                                          echo '<td  >'.$allClient[$i]['Fax'].'</td>';    
                                          echo "</tr >";
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
                 $pdf->pdf->SetTitle('Liste Clients');
                 $pdf->pdf->SetSubject('Liste Clients');
                 $pdf->pdf->SetKeywords('liste Clients');
                 $pdf->writeHTML($content);
                 $pdf->Output('liste-clients.pdf');
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



