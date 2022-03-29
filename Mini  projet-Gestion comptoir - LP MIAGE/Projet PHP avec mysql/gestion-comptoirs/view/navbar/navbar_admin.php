<style>
    /*Corr bug de dropdown-menu-right*/
    .dropdown-menu-right {
        right: 0;
        left: auto;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand font-weight-bold" href="index.php">
        <img src="img/les_comptoirs_logo.png" width="40" height="40" alt=""> Les Comptoirs
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./index.php?p=client">Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?p=fournisseur">Fournisseurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?p=produit">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?p=commandes">Commandes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Autre
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?p=statistic">Statistique</a>
                    <a class="dropdown-item" href="index.php?p=import_file_excel">Importer un fichier Excel</a>
                    <a class="dropdown-item" href="#">Gérer les utilisateurs</a>
                </div>
            </li>
        </ul>

        <!--<a class="btn btn-outline-light my-2 my-sm-0" href="index.php?p=mon_compte"><i class="fa fa-user-circle animation" aria-hidden="true"></i> Mon Compte</a>-->
        <ul class="navbar-nav "> 
        <li class="nav-item dropdown">

            <a class="btn btn-outline-light my-2 my-sm-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle animation" aria-hidden="true"></i> <?php echo strtoupper(Bonjour." ". $_SESSION['user_name']);  ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="index.php?p=compteInfo"><i class="fa fa-info-circle" aria-hidden="true"></i> Information</a>
                <a class="dropdown-item text-danger" href="controller/deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Deconnexion</a>
            </div>
        </li>
        </ul>

    </div>
</nav>