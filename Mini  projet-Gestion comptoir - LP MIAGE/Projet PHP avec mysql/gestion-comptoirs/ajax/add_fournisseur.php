<?php
     require_once '../model/Class_DBConnexion.php';
    require_once '../model/IOperationDB.php'; 


    $fourniseur=new fournisseur($_POST['nom_fournisseur'] ,$_POST['contact'] ,
                                      $_POST['fonction'],$_POST['adresse'],
                                      $_POST['ville'],$_POST['region'],
                                      $_POST['code_postal'],$_POST['pays'],$_POST['telephone'],$_POST['fax'],$_POST['page']);
                              echo $fourniseur->insert();
							
