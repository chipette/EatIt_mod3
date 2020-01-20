<?php 
//je fais le lien entre le fichier-ci et celui qui contient le lien avec la bdd
require_once __DIR__ . "/../model/database.php";

$id = $_GET["id"]; //je récupère l'id du resto sur lequel l'utilisateur a cliqué
$resto = getOneRow("restaurant", $id); //récupère la ligne qui correspond à l'id récupéré via l'url
$image = (empty($resto["image"])) ? "images/favicon.svg" : "uploads/" .$resto["image"];
$logo = (empty($resto["logo"])) ? "images/favicon2.png" : "uploads/" .$resto["logo"];
$specialites = getAllRows("specialite");


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


  
    <header class="page_header">

      <section class="restos">

          <div class="container">

            <article class="presentation_resto">
              <div class="restos_title">
                 
                <div class="restos_logo"><img src="<?= $logo; ?>" alt="<?= "logo " .$resto["nom"]; ?>" width="50"></div>
                <h2><?= $resto["nom"] ?></h2>
              </div>

              <div class="restos_txt">
                <p><?= $resto["adresse"]; ?></p>

                <p><?= $resto["description"]; ?></p>
              </div>
            </article>


            <div class="restos_img"><img src="<?= $image; ?>" alt="<?= "logo " .$resto["nom"]; ?>" ></div><!--/resto_img-->

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
