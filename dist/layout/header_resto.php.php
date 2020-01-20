<?php 
//je fais le lien entre le fichier-ci et celui qui contient le lien avec la bdd
require_once __DIR__ . "/../model/database.php";

//$socialNetworks = getAllRows("reseau_social");

?>

<!DOCTYPE html>
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


<body class="page_resto">
    
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
                <h5 class="dropdown-header">Italiens</h5>
                <a class="dropdown-item" href="resto.php">Basilic & Co</a>
                <a class="dropdown-item" href="#">Picotta</a>
                <h5 class="dropdown-header">Asiatiques</h5>
                <a class="dropdown-item" href="#">Sushi Market</a>
                <h5 class="dropdown-header">Orientaux</h5>
                <a class="dropdown-item" href="#">Cedars Rolls</a>
                <h5 class="dropdown-header">Burgers</h5>
                <a class="dropdown-item" href="#">La Burger Attitude</a>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavResto" aria-controls="navbarNavResto" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavResto">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#eatEcolo">Eat'Ecolo !</a> 
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownResto" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nos restaurants partenaires
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownResto">
                <h5 class="dropdown-header">Italiens</h5>
                <a class="dropdown-item" href="resto.php">Basilic & Co</a>
                <a class="dropdown-item" href="#">Picotta</a>
                <h5 class="dropdown-header">Asiatiques</h5>
                <a class="dropdown-item" href="#">Sushi Market</a>
                <h5 class="dropdown-header">Orientaux</h5>
                <a class="dropdown-item" href="#">Cedars Rolls</a>
                <h5 class="dropdown-header">Burgers</h5>
                <a class="dropdown-item" href="#">La Burger Attitude</a>
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


  
    <header class="page_header">

      <section class="restos">

          <div class="container">

            <article class="presentation_resto">
              <div class="restos_title">
                <div class="restos_logo"><img src="images/logo_bCo.svg" alt="logo Basilic & Co" width="50"></div>
                <h2>Basilic & Co - Rennes</h2>
              </div>

              <div class="restos_txt">
                <p>Pizza & spécialités italiennes.
                  Ouvert de 11h30 à 14h30 et de 18h à 00h30</br>
                  1 rue du Maréchal Joffre, Rennes, 35000
                </p>

                <p>Pizza de terroir 100% fait maison à partir d’ingrédients français artisanaux : 
                  pâte fraîche maison étalée à la main, sauce tomate maison, mozzarella artisanale française, 
                  fromages labellisés, viandes 100% d’origine française.
                </p>
              </div>
            </article>


            <div class="restos_img"><img src="images/img_resto_bCo.jpg" alt="pizza" ></div><!--/resto_img-->

          </div><!--/container-->
        </section><!--/resto-->

          <nav class="navbar navbar-expand-lg navbar-light bg-orange d-none d-md-block sec_nav mt-3">
            <div class="container">

                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#menu">Menus</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#acc">Entrées & accompagnements</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#dessert">Desserts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#boisson">Boissons</a>
                  </li>
                </ul>

            </div>
          </nav>



    </header><!--/page_header-->


  
    <main>
