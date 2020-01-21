<?php
//je fais le lien entre le fichier-ci et celui qui contient le lien avec la bdd
require_once __DIR__ . "/../model/database.php";

$specialites = getAllRows("specialite");
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-bottom d-block d-md-none bg-orange mobile_nav">
    <div class="container">

        <a class="navbar-brand" href="index.php">Eat !t</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavMobile" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavMobile">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#eatEcolo">Eat'Ecolo !</a> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMobile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nos restaurants partenaires
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMobile">
                        <?php foreach ($specialites as $specialite) : ?>
                            <h5 class="dropdown-header"><?= $specialite["libelle"]; ?></h5>
                            <?php $restaurants = getAllRows("restaurant", ["specialite_id" => $specialite["id"]]); ?>

                            <?php foreach ($restaurants as $restaurant) : ?>
                                <a class="dropdown-item" href="resto.php?id=<?= $restaurant["id"]; ?>"><?= $restaurant["nom"]; ?></a>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes menus favoris</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ma commande</a>
                </li>
            </ul>
        </div>

    </div><!--/container-->
</nav>   


<nav class="navbar navbar-expand-lg navbar-light sticky-top d-none d-md-block bg-orange main_nav">
    <div class="container">

        <a class="navbar-brand" href="index.php">Eat !t</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#eatEcolo">Eat'Ecolo !</a> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nos restaurants partenaires
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($specialites as $specialite) : ?>
                            <h5 class="dropdown-header"><?= $specialite["libelle"]; ?></h5>
                            <?php $restaurants = getAllRows("restaurant", ["specialite_id" => $specialite["id"]]); ?>

                            <?php foreach ($restaurants as $restaurant) : ?>
                                <a class="dropdown-item" href="resto.php?id=<?= $restaurant["id"]; ?>"><?= $restaurant["nom"]; ?></a>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes menus favoris</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ma commande</a>
                </li>
            </ul>
        </div>

    </div><!--/contanier-->  
</nav>

<main>