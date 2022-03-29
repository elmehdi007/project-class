<?php
     require_once '../model/Class_DBConnexion.php';
    require_once '../model/IOperationDB.php'; 


    $client=new Client($_POST['nom_societe'] ,$_POST['contact'] ,
                                      $_POST['fonction'],$_POST['adresse'],
                                      $_POST['ville'],$_POST['region'],
                                      $_POST['code-postal'],$_POST['pays'],$_POST['telephone'],$_POST['fax']);
                              echo $client->insert();
							
