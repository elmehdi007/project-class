<?php
    //include('model/Class_DBConnexion.php');
    include('../model/Class_ExcelToMySQL.php');
    include('../model/Class_Msg.php');
   
    if(isset($_FILES['fileExcel']) AND $_FILES['fileExcel']['error'] == 0) //si le fichier est envoyer
    {
        $infosfichier = pathinfo($_FILES['fileExcel']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('xls', 'xlsx');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            $dataArra = ExcelToMySQL::readData($_FILES['fileExcel']['tmp_name']);
            $msg = DBConnexion::insertInToTable($_POST['selectedTable'],$dataArra);
            if(is_null($msg)) 
                Msg::Msg_success('Fichier ajouter avec success');
            else if ($msg == 'err_NbrColumns')
                Msg::Msg_error('Le nombre des colonnes différent!');
            else 
                Msg::Msg_error('Erreur lors de l\'ajoute du fichier<br>Message: '.$msg);

        }
        else Msg::Msg_error('C\'est pas un fichier excel!');

    }

    $import_file_excel_form = file_get_contents('view/import_file_excel_form.html');
    $listeTable = DBConnexion::tableListe();
    printf($import_file_excel_form,$listeTable);
?>