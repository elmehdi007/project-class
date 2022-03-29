<?php
if(isset($_SESSION['privilege']) && $_SESSION['privilege'] == 'Admin'){
    echo ("<style>.nav-link{color:#fff !important;}</style>");
    include('view/navbar/navbar_admin.php');
}
else if (isset($_SESSION['privilege']) && $_SESSION['privilege'] == 'User'){
    include('view/navbar/navbar_user.html');
}
else{
	//header("location: index.php?p=connexion");
 include('view/navbar/navbar_guest.html');
}
?>
