<?php

//include('model/Class_DBConnexion.php');
include('model/Class_Msg.php');


if(isset($_POST['password']) && isset($_POST['userName']))
{
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    if(DBConnexion::userCnxCheck($userName,$password))
    {
        header('Location: index.php?p=compteInfo');
        exit();
    }
    else
    {
        Msg::Msg_error('Nom utilisateur ou mot de passe incorrect!');
        include('view/connexion_form.html');
    }
}
else
    include('view/connexion_form.html');
?>