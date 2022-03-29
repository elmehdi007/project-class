<?php

//require_once './model/Class_Commande.php';
require_once './model/IOperationDB.php'; 
require_once'./vendor/autoload.php';
require './model/Class_Commande.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$idComande=$_GET['numcomd'];


ob_start();
?>
<style>
    table{
        width: 100%;
    }
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
          <?php $commande= new Class_Commande();?>
            
            <img width="60" src="img/les_comptoirs_logo.png">
            <table align="right" ><tr><td><label align="right" ><?php echo date("Y-m-d H:i:s"); ?></label></td></tr></table>
            <h1 color="#03242b" >Facture Numero : <?php echo  $idComande;?></h1>
            <h4 color="#03242b" >Date de Facture : <?php echo  $commande->getDateCommandeoFFactureByNumFcture($idComande);?></h4>
            <div>
                 <?php echo $commande->getClientOfcommande($idComande) ?>   
            </div>
            <table style="width:100%" border="1" cellspacing="0" bor border-collapse="true"  width="100%" class="table table-bordered  table-light table-responsive-md">
                            <tbody  style="width:100%">
                                <tr  style="width:100%" style="background: #eee; ">
                                    <th>Produit</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantite</th>
                                    <th>Remise</th>
                                    <th>Prix Total</th>
                                </tr>
                                  <tr>
                                       
                                      <?php
                                         echo  $commande->getAllFactureByNumCommande($idComande);
                                         
                                         ?>
                         
                                   </tr>
                            </tbody>
             </table>
                        <table  border="0"   cellspacing="0" bor border-collapse="true"  width="100%" class="table table-bordered  table-light table-responsive-md">
                            <tbody>

                                  <tr>
                                       
                                      <?php
                                         echo  $commande->writeTotalInfacture($idComande);
                                         
                                         ?>
                         
                                   </tr>
                            </tbody>
                        </table>
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
   $pdf =new Html2Pdf("P", "A4", "FR", "utf-8");
             try {
                 $pdf->pdf->SetAuthor('Miage 2018 - Gestion comptoire');
                 $pdf->pdf->SetTitle('Facture Numero: '.$idComande);
                 $pdf->pdf->SetSubject('Facture Numero: '.$idComande);
                 $pdf->pdf->SetKeywords('Facture Numero: '.$idComande);
                 $pdf->writeHTML($content);
                 $pdf->Output('facture_'.$idComande.'.pdf');
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



