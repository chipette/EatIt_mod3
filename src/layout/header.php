<?php 
//je fais le lien entre le fichier-ci et celui qui contient le lien avec la bdd
require_once __DIR__ . "/../model/database.php";

$specialites = getAllRows("specialite");

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="...">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.7/css/fork-awesome.min.css" integrity="sha256-gsmEoJAws/Kd3CjuOQzLie5Q3yshhvmo7YNtBG7aaEY=" crossorigin="anonymous">
  <title>Eat it</title>
  <link rel="shortcut icon" href="./images/favicon.png">
  <link rel="stylesheet" href="css/main.css" type="text/css">

</head>

<body class="home">
    <pre>
        <?php // var_dump($specialites) ?>
    </pre>

    <header class="header_home"> 

      <nav class="navbar navbar-light bg-orange header_nav">
        <div class="container">

          <a class="navbar-brand" href="index.php">
            <img src="images/logoRVB.svg" width="344" height="119" alt="logo">
          </a>
          <div class="login_social">
            <ul class="navbar-nav login_nav mx-auto mx-md-0 ml-md-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">déja Eater</a> 
              </li>
              <li class="nav-item ml-3">
                <a class="nav-link" href="#">devenir Eater</a>
              </li>
            </ul>

            <ul class="navbar-nav social_nav mx-auto mx-md-0 ml-md-auto mt-2 mt-md-0 mb-3 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" href="http://www.instagram.com" target="blank" title="Suivez-nous sur Instagram"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
              </li>
              <li class="nav-item ml-3">
                <a class="nav-link" href="http://www.twitter.fr" target="blank" title="Suivez-nous sur Twitter"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i><span class="sr-only">Twitter</span></a> 
              </li>
              <li class="nav-item ml-3">
                <a class="nav-link" href="http://www.facebook.fr" target="blank" title="Suivez-nous sur Facebook"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
              </li>
            </ul>
          </div> <!--/login_social-->

        </div><!--/container-->

      </nav>
  
      <div class="d-block d-md-none image"><img class="mx-auto d-block" src="images/header_img_L.jpg" alt="livraison_repas"></div>

      <section class="d-none d-md-block image_header">
        <div class="container">
          <div class="cmde_rapide">
            <h4>Je sais déjà ce que je veux, <br> je commande directement : </h4>
            <a href="commande.html" class="btn btn-secondary badge-pill btn_cmde_rapide">Je commande</a>
          </div><!--/cmde_rapide -->
        </div><!--/container -->
      </section>
    </header>

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
                    <?php $restaurants = getAllRowsToCat("restaurant", "specialite_id", $specialite["id"]); ?>
                    
                        <?php foreach ($restaurants as $restaurant) : ?>
                            <a class="dropdown-item" href="resto.php"><?= $restaurant["nom"]; ?></a>
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
                    <?php $restaurants = getAllRowsToCat("restaurant", "specialite_id", $specialite["id"]); ?>
                    
                        <?php foreach ($restaurants as $restaurant) : ?>
                            <a class="dropdown-item" href="resto.php"><?= $restaurant["nom"]; ?></a>
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


    
    <!-- les balises "body" et "main" sont uniquement OUVERTES, elles seront refermées dans le fichier footer.php -->