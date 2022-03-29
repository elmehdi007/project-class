<?php
     require_once '../model/Class_DBConnexion.php';
    require_once '../model/IOperationDB.php'; 


    $fourniseur=new fournisseur($_POST['nom_societe'] ,$_POST['contact'] ,
                                      $_POST['fonction'],$_POST['adresse'],
                                      $_POST['ville'],$_POST['region'],
                                      $_POST['code_postal'],$_POST['pays'],$_POST['telephone'],$_POST['fax'],$_POST['page']);
                                      $fourniseur->NumFournisseur=$_POST['code_founisseur'];
                              echo $fourniseur->update();
							
