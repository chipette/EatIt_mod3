<?php
require_once __DIR__ . "/model/database.php";


$id = $_GET["id"]; //je récupère l'id du resto sur lequel l'utilisateur a cliqué
$resto = getOneRow("restaurant", $id); //récupère la ligne qui correspond à l'id récupéré via l'url
$image = (empty($resto["image"])) ? "images/favicon.svg" : "uploads/" . $resto["image"];
$logo = (empty($resto["logo"])) ? "images/favicon2.png" : "images/" . $resto["logo"];
$specialites = getAllRows("specialite");

$plats = getAllRows("plat", ["restaurant_id" => $id, "type_plat_id" => 1]);
$accs = getAllRows("plat", ["restaurant_id" => $id, "type_plat_id" => 2], ["prix" => "ASC"]);
$desserts = getAllRows("plat", ["restaurant_id" => $id, "type_plat_id" => 3], ["prix" => "ASC"]);
$boissons = getAllRows("plat", ["restaurant_id" => $id, "type_plat_id" => 4], ["prix" => "ASC"]);

require_once 'layout/header.php';
require_once 'layout/nav.php';
?>

<header class="page_header">

    <section class="restos">

        <div class="container">

            <article class="presentation_resto">
                <div class="restos_title">

                    <div class="restos_logo"><img src="<?= $logo; ?>" alt="<?= "logo " . $resto["nom"]; ?>" width="50"></div>
                    <h2><?= $resto["nom"] ?></h2>
                </div>

                <div class="restos_txt">
                    <p><?= $resto["adresse"]; ?></p>

                    <p><?= $resto["description"]; ?></p>
                </div>
            </article>


            <div class="restos_img"><img src="<?= $image; ?>" alt="<?= "logo " . $resto["nom"]; ?>" ></div><!--/resto_img-->

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

<section class="menus" id="menu">

    <div class="container">

        <h1 class="text-center">Plats</h1>

        <div class="menus_list mt-5">

            <?php foreach ($plats as $plat) : ?>
                <?php $image = (empty($plat["image"])) ? " " : "uploads/" . $plat["image"]; ?>
                <div class="card border-0">
                    <img class="card-img-top img_menu" src="<?= $image; ?>" alt="<?= $plat["nom"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $plat["nom"]; ?></h5>
                        <p class="card-text"><?= $plat["description"]; ?></p>
                        <p class="card-text prix"><?= $plat["prix"]; ?> €</p>
                        <a href="#" class="btn btn-primary">Commander</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div><!--/menus_list-->

    </div><!--/container-->
</section><!--/menus-->



<section class="accompagnements" id="acc">

    <div class="container">
        <div class="bloc_titre">
            <div class="img"><img src="images/accompagnement.svg" alt="accompagnement"></div>
            <h1>Entrées et accompagnements</h1>
        </div>

        <?php foreach ($accs as $acc) : ?>  
            <div class="bloc_txt">
                <div class="plat">
                    <p><?= $acc["nom"]; ?></p>
                    <p><?= $acc["prix"]; ?> €</p>
                </div>
                <p><?= $acc["description"]; ?></p>
            </div>
        <?php endforeach; ?>  
    </div><!--/container-->

</section><!--/accompagnements-->



<section class="desserts" id="dessert">

    <div class="container">
        <div class="bloc_titre">
            <div class="img"><img src="images/dessert.svg" alt="dessert"></div>
            <h1>Desserts</h1>
        </div>

        <?php foreach ($desserts as $dessert) : ?>
            <div class="bloc_txt">
                <div class="plat">
                    <p><?= $dessert["nom"]; ?></p>
                    <p><?= $dessert["prix"]; ?> €</p>
                </div>
                <p><?= $dessert["description"]; ?></p>
            </div>
        <?php endforeach; ?>  
    </div><!--/container-->

</section><!--/desserts-->



<section class="boissons" id="boisson">

    <div class="container">
        <div class="bloc_titre">
            <div class="img"><img src="images/boisson.svg" alt="boisson"></div>
            <h1>Boissons</h1>
        </div>
        <?php foreach ($boissons as $boisson) : ?>
            <div class="bloc_txt">
                <div class="plat">
                    <p><?= $boisson["nom"]; ?></p>
                    <p><?= $boisson["prix"]; ?> €</p>
                </div>
                <p><?= $boisson["description"]; ?></p>  
            </div>
        <?php endforeach; ?>


    </div><!--/container-->  
</section><!--/boissons -->

<?php require_once 'layout/footer.php'; ?>