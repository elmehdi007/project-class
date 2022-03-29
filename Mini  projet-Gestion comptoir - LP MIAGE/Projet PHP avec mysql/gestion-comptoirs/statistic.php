<?php
  require_once"./model/Class_DBConnexion.php";
  $year=$_GET['year'];
   $bdd = new DBConnexion();
   $bdd=$bdd->getPdo();
          $sql="SELECT CONCAT (year(`Date commande`),month(`Date commande`)),COUNT(*) as nbrCommande from `commandes` WHERE YEAR(`Date commande`)='".$year."'";
		  $sql.=" group by CONCAT (year(`Date commande`),month(`Date commande`))  order by nbrCommande desc"; 
       $reponse =$bdd->query($sql);
       $allCommandeOfYear=$reponse->fetchAll();
	$maxX=12;
	$maxY=$allCommandeOfYear[0][ nbrCommande];
    //var_dump($allCommandeOfYear);
   
   $img = imagecreate(12*5*2,$maxY*5+14);
   
   $couleur = imagecolorallocate($img,80, 04,30);
   imageline($img, 0, 3, 05, 0, $couleur);
   imagepng($img);
   
   
   header("Content-type: image/<type>");
   ?>