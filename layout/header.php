<?php 
//je fais le lien entre le fichier-ci et celui qui contient le lien avec la bdd
require_once __DIR__ . "/../model/database.php";

$socialNetworks = getAllRows("reseau_social");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Salutem - Maison médicale</title>
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="header-top">
        <div class="container">
            <div class="social-networks">
                <!-- je boucle sur les réseaux sociaux -->
                <?php foreach ($socialNetworks as $social) : ?>
                    <a href="<?= $social["url"]; ?>">
                        <i class="fa <?= $social["icone"]; ?>"></i>
                    </a>
                <?php endforeach; ?>
                
            </div>
            <div class="contact-infos">
                <ul>
                    <li>
                        <i class="fa fa-phone"></i>
                        <a href="tel:0243785462">0243785462</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:contact@salutem.fr">contact@salutem.fr</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="logo">
                <i class="fa fa-heartbeat"></i>
                Salutem
            </div>
            <div class="status">
                Votre centre est actuellement <span class="open">ouvert</span>
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#">La maison médicale</a></li>
                <li><a href="#">Nos docteurs</a></li>
                <li><a href="#">Nous contacter</a></li>
            </ul>
        </div>
    </div>
</header>

<main>
    
    <!-- les balises "body" et "main" sont uniquement OUVERTES, elles seront refermées dans le fichier footer.php -->