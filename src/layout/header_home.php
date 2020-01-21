<?php 

require_once __DIR__ . "/../model/database.php";

$reseaux_sociaux = getAllRows("reseau_social"); 

?>


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
                    <?php foreach ($reseaux_sociaux as $reseau_social) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $reseau_social["url"]; ?>" target="blank" title="Suivez-nous sur <?= $reseau_social["nom"]; ?>"
                                <i class="fa <?= $reseau_social["icone"]; ?>"></i>
                            </a><span class="sr-only"><?= $reseau_social["nom"]; ?></span>
                        </li>
                    <?php endforeach; ?>
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