<?php
     require_once '../model/Class_DBConnexion.php';
    require_once '../model/IOperationDB.php'; 


    $produit=new Produit($_POST['Nom_du_produit'], $_POST['n_fournisseur'], $_POST['code_categorie'], 
                         $_POST['quantite_par_unite'], $_POST['prix_unitaire'], $_POST['unites_en_stock'],
                         $_POST['unites_commandees'] ,$_POST['niveau_de_reapprovisionnement'] ,$_POST['indisponible']);
                         echo $produit->insert();
							
