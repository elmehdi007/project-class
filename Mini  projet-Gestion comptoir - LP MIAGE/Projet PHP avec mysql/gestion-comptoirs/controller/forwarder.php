<?php

    
    include('controller/navbar.php');

    if(isset($_GET["p"]))
    {
      switch ($_GET["p"]) {//
         case 'statistic':
          include('controller/statistic.php');
          break;
        case 'connexion':
          include('controller/connexion.php');
          break;
         case 'produit':
          include('controller/produit.php');
          break;
        case 'fournisseur':
          include('controller/fournisseur.php');
          break;
        case 'imprime-fournisseur':
          include('controller/imprime-fournisseur.php');
          break;
       case 'imprime-clients':
          include('controller/imprime-clients.php');
          break;
         case 'client': 
          include('controller/client.php');
          break;
         case 'catégories':
          include('controller/catégories.php');
          break;
         case 'add-commande':
          include('controller/add-commande.php');
          break;
        case 'fournisseurs':
          include('controller/fournisseurs.php');
          break;
        case 'produits':
          include('controller/produits.php');
          break;
        case 'commandes':
          include('controller/commandes.php');
          break;
        case 'compteInfo':
          include('controller/compteInfo.php');
          break;
        case 'import_file_excel':
          include('controller/import_file_excel.php');
          break;
        default:
          include('controller/accueil.php'); 
          break;
      }
    }
    else
    {
      include('controller/accueil.php'); 
    }
?>