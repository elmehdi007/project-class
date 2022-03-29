<?php
    
   $import_file_excel_form ;
    $listeTable ;
// var_dump($_FILES['data']['name']);    die();
if(!isset($_FILES['data']['name'])){
    require_once('model/Class_DBConnexion.php');
     require_once('model/Class_ExcelToMySQL.php');
    require_once('model/Class_Msg.php');
     $import_file_excel_form = file_get_contents('view/import_file_excel_form.html');
    $listeTable = DBConnexion::tableListe();
}

 
 $msgOut="";
    if(isset($_FILES['data']['name']) AND $_FILES['data']['error'] == 0) //si le fichier est envoyer
    {
         require_once('../model/Class_DBConnexion.php');
        require_once('../model/Class_ExcelToMySQL.php');
          require_once('../model/Class_Msg.php');
        $infosfichier = pathinfo($_FILES['data']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('xls', 'xlsx');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            $dataArra = ExcelToMySQL::readData($_FILES['data']['tmp_name']);
            $msg = DBConnexion::insertInToTable($_POST['selectedTable'],$dataArra);
           
            if(is_null($msg)) 
                $msgOut='Fichier ajouter avec success';
                //Msg::Msg_success('Fichier ajouter avec success');
            else if ($msg == 'err_NbrColumns')
                //Msg::Msg_error('Le nombre des colonnes différent!');
            $msgOut='Le nombre des colonnes différent!';
            else 
               // Msg::Msg_error('Erreur lors de l\'ajoute du fichier<br>Message: '.$msg);
                $msgOut='Erreur lors de l\'ajoute du fichier<br>Message: '.$msg;
        }
        else  $msgOut='C\'est pas un fichier excel!'; //Msg::Msg_error('C\'est pas un fichier excel!');

     $import_file_excel_form = file_get_contents('../view/import_file_excel_form.html');
    $listeTable = DBConnexion::tableListe();
        die($msgOut);
    }

    printf($import_file_excel_form,$listeTable);
?>