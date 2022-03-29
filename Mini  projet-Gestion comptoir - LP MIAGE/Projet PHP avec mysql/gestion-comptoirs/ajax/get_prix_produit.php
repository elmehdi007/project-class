<?php
 
     require_once '../model/Class_DBConnexion.php';
    require_once '../model/IOperationDB.php'; 


    $prixProduit= Produit::getPrixOfProduit($_POST['codeProduit']);
     
    echo $prixProduit;  exit();