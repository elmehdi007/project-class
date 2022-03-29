<?php
    $userName=$_SESSION['user_name'];
    $eMail=$_SESSION['e-mail'];
    $privilige=$_SESSION['privilege'];
    
    $txt = file_get_contents('view/compteInfo.html');
    printf($txt,$userName,$eMail,$privilige);
?>
