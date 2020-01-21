<?php require_once 'layout/header_resto.php';

  
?>


    <section class="menus" id="menu">

      <div class="container">
          
        <h1 class="text-center">Pizzas</h1>

        <div class="menus_list mt-5">

            <?php $plats = getAllRows("plat", ["restaurant_id" => $id, "type_plat_id" => 1]); ?>
            
            <?php foreach ($plats as $plat) : ?>
            <?php $image = (empty($plat["image"])) ? " " : "uploads/" .$plat["image"]; ?>
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
          <div class="img"><img src="images/bCo_salade.jpg" alt="salade verte"></div>
          <h1>Entrées et accompagnements</h1>
        </div>

        <div class="bloc_txt">
          <div class="plat">
            <p>Salade verte</p>
            <p>2,90€</p>
          </div>
          <p>Salade verte, tomates cerises et vinaigrette artisanale au choix : huile d’olive de Kalamata AOP - 
            vinaigre balsamique ou Huile de Sésame - vinaigre au citron ou Huile au Basilic - vinaigre à l’échalote 
            ou Huile de Noix - vinaigre de cidre.</p>
        </div>
      </div><!--/container-->

    </section><!--/process-->


  
    <section class="desserts" id="dessert">
      
      <div class="container">
        <div class="bloc_titre">
          <div class="img"><img src="images/bCo_glaces.jpg" alt="glaces"></div>
            <h1>Desserts</h1>
        </div>

          <div class="bloc_txt">
            <div class="plat">
              <p>Glaces artisanales  «Terre Adélice »</p>
              <p>3,90€</p>
            </div>
            <p>Fabriquées à partir de fruits entiers en fort pourcentage, sans renforts d’arômes ni colorants, 
            les sorbets et glaces Terre Adélice privilégient la qualité et l’authenticité du goût et sont fabriqués à partir 
            de produits biologiques, de lait frais et de crème fraîche collectés sur le plateau ardéchois.
            Parfums aux choix : chocolat, vanille, framboise, café, citron, fraise?</p>
          </div>

          <div class="bloc_txt">
            <div class="plat">
              <p>Foccacia maison prali-choco</p>
              <p>8,90€</p>
            </div>
            <p>Dessert tout chaud prédécoupé en 10 bâtonnets à partager... ou pas !</p>
          </div>

          <div class="bloc_txt">
            <div class="plat">
              <p>Tiramisu café</p>
              <p>5,90€</p>
            </div>
            <p>Le dessert italien classique, fabriqué selon le savoir-faire artisanal</p>
          </div>

      </div>


    </section><!--/presentation -->


    
    <section class="boissons" id="boisson">

      <div class="container">
        <div class="bloc_titre">
          <div class="img"><img src="images/bCo_jus.jpg" alt="jus de pommes"></div>
            <h1>Boissons</h1>
        </div>

        <div class="bloc_txt">
          <div class="plat">
            <p>Jus de pomme artisanal</p>
            <p>3,50€</p>
          </div>
        </div>

        <div class="bloc_txt">
          <div class="plat">
            <p>Limonade artisanale</p>
            <p>4,90€</p>
          </div>
          <p>Différents parfums: nature, grenadine, pêche</p>
        </div>

        <div class="bloc_txt">
          <div class="plat">
            <p>Eaux</p>
            <p>2,20€</p>
          </div>
          <p>Evian, Badoit, San Pelegrino</p>
        </div>
        
      </div><!--/container-->  
    </section><!--/temoignages -->

  <?php require_once 'layout/footer.php'; ?>