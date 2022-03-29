<?php
     require_once '../model/Class_DBConnexion.php';
    require_once '../model/IOperationDB.php'; 


    $infoClient= Client::getClient($_POST['in_code_client']);
     
    $resultat='{"code_client": "'. trim($infoClient['Code client']).' ", ';
    $resultat.=' "societe": "'.trim($infoClient['Société']).' " ,';
    $resultat.=' "contact": "'.trim($infoClient['Contact']).' ", ';
    $resultat.=' "fonction": "'.trim($infoClient['Fonction']).' " ,';
    $resultat.=' "adresse": "'.trim($infoClient['Adresse']).'  " , ';
    $resultat.=' "ville": "'.trim($infoClient['Ville']).'  ", ';
    $resultat.=' "region": "'.trim($infoClient['Région']).'  ", ';
    
    $resultat.=' "code_postal": "'.trim($infoClient['Code postal']).' " , ';
    $resultat.=' "pays": "'.trim($infoClient['Pays']).' " ,';
    $resultat.=' "telephone" :"'.trim($infoClient['Téléphone']).' ", '; 
    $resultat.=' "fax" :"'.trim($infoClient['Fax']).' " }';
    
    echo $resultat;
     exit();