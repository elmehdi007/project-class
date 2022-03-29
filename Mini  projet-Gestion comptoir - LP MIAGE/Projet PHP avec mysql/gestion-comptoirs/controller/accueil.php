<?php
 //var_dump($_SESSION);die();
 if(!isset($_SESSION['user_name'])){
    include('view/bienvenue_guest.html');
 }
 else {
     ?>
<img src="img/tree.png" alt="" width="385" height="387" class=" bottomRigh ">
<div class="container-fluid" style="padding-top:50px;">
        <h1 class="center" style="text-align: center;">Gestion Comptoir </h1>
</div>


 
  <?php 
     }
  ?>


<style>
    body{
        /*background: #eee;*/
        background-image: url(img/pattern.jpg);
    }
    img.bottomRigh {
    position: absolute;
    bottom: 0;
    right: 0;
}

@media all and (max-width:490px){
        img.bottomRigh {
         height: 327px;
    }
}
    </style>