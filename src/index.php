<?php
require_once 'layout/header.php';
require_once 'layout/header_home.php';
require_once 'layout/nav.php';
?>

<section class="d-block d-md-none commande_rapide">
    <div class="container">
        <h4 class="text-center">Je sais déjà ce que je veux, je commande directement : </h4>
        <a href="commande.html" class="btn btn-secondary badge-pill btn_cmde_rapide">Je commande</a>
    </div>
</section>

<section class="eatEcolo" id="eatEcolo">
    <div class="container">
        <h1 class="text-center">Eat'Ecolo!</h1>

        <article class="valeur">
            <div class="row inverse">
                <img class="mx-5" src="images/valeur1.svg" width="150" height="150" alt="cloche">
                <div class="col-sm-12 col-md-6 mt-5 mt-md-0">
                    <h3 class="dark_red">Eat it, <span class="lowercase">Régalez vous, chez vous</span></h3>
                    <p><span class="color">Envie d’un repas tout prêt à votre domicile?</span>
                        Eat It peut devenir votre intermédiaire avec les meilleurs de la restauration rapide rennaise. 
                        Tout ce que vous avez à faire, c’est commander sur notre site et attendre votre plat.
                    </p>

                    <p class="text-primary">Commander n’a jamais été aussi simple et rapide !</p>
                </div>
            </div>
        </article><!-- /valeur -->

        <article class="valeur">
            <div class="row">
                <img class="mx-5" src="images/valeur2.svg" width="150" height="150" alt="local">
                <div class="col-sm-12 col-md-6 mt-5 mt-md-0">
                    <h3 class="green">Une cuisine saine et locale</h3>
                    <p>Nos partenaires restaurateurs sélectionnent chaque jour les meilleurs produits, dans <span class="color">le respect 
                            d'une agriculture durable et locale</span> et bien sûr en accord avec les saisons.
                        Les plats sont préparés avec des <span class="color">ingrédients frais et sans conservateurs</span>, additifs, et colorants... 
                    </p>
                    <p class="text-primary">Comme si vous aviez cuisiné vous-même !</p>
                </div>
            </div>
        </article><!--/valeur -->

        <article class="valeur">
            <div class="row inverse">
                <img class="mx-5" src="images/valeur3.svg" width="150" height="150" alt="vélo">
                <div class="col-sm-12 col-md-6 mt-5 mt-md-0">
                    <h3>Une livraison rapide et de qualité</h3>
                    <p>Afin de satisfaire au mieux vos attentes, la livraison de vos plats est effectuée entre <span class="color">30 et 45 minutes 
                            après commande</span>span, selon votre localisation et le restaurant partenaire. Ceux-ci s’engagent également à vous 
                        proposer des plats chauds au moyen de caisses isothermes servant à conserver la chaleur.
                        Très concernés par les questions environnementales, <span class="color">nos livraisons s'effectuent EXCLUSIVEMENT à vélo</span>.
                    </p>

                    <p class="text-primary">Vous pouvez bénéficier de nos services 7j/j.</p>
                </div>
            </div>
        </article><!--/valeur -->

    </div><!--/container-->
</section>

<section class="partenaires" id="restos">
    <div class="container">
        <h1 class="text-center">Nos restaurants Partenaires</h1>
        <p class="intro text-center mt-3">Une envie particulière pour le repas? </br> Trouvez le style de menus qui vous plait aujourd’hui avec nos restaurants partenaires.</p>

        <div class="js-accordion mt-5">

            <?php foreach ($specialites as $specialite) : ?>
                <div class="card card_accordion">
                    <div class="card-header">
                        <button class="btn btn-link" type="button">
                            <span><?= $specialite["libelle"]; ?></span><i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div class="collapse">
                        <div class="card-body">

                            <div class="carousel_partenaires owl-carousel px-sm- mt-5 center"> 
                                <?php $restaurants = getAllRows("restaurant", ["specialite_id" => $specialite["id"]]); ?>
                                <?php foreach ($restaurants as $restaurant) : ?>
                                    <?php $image = (empty($restaurant["image"])) ? "images/favicon2.png" : "uploads/" . $restaurant["image"]; ?>
                                    <article class="card border-0">
                                        <a href="resto.php?id=<?= $restaurant["id"]; ?>"><img src="<?= $image; ?>" class="card-img-top" alt="<?= $restaurant["nom"]; ?>"></a>
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="resto.php?id=<?= $restaurant["id"]; ?>"><?= $restaurant["nom"]; ?></a></h3>
                                            <p class="card-text"><?= $restaurant["description"]; ?></p>
                                            <a href=".php?id=<?= $restaurant["id"]; ?>" class="btn btn-info badge-pill">Consulter la carte</a>
                                        </div>
                                    </article>

                                <?php endforeach; ?>
                            </div><!--/caroussel-->

                        </div><!--/card-body-->
                    </div><!--/collapse-->
                </div><!--/card-->

            <?php endforeach; ?>              
        </div><!--/accordion--> 

    </div><!--/container-->
</section>

<section class="process">
    <div class="container">
        <h1 class="text-center">Comment ça marche?</h1>

        <div class="etape_process">
            <div class="etape"><!-- étape 1 -->
                <div class="icone"><img class="mx-auto toque" src="images/choix_resto.svg" width="100" height="100" alt="icone toque"></div>
                <p>1.</p> 
                <p>Choisissez votre restaurant</p>
                <p class="mb-5">Nos restaurants partenaires, ont été sélectionnés pour la qualité 
                    de leurs ingrédients et leurs recettes.
                </p>
            </div>

            <div class="etape"><!-- étape 2 -->
                <div class="icone"><img class="mx-auto cloche" src="images/choix_repas.svg"  width="100" height="100" alt="icone cloche repas"></div> <!-- je crée une div pour y insérer l'icone car .svg et donc pas de dimension -->
                <p>2.</p> 
                <p>Choisissez les plats, boissons et desserts.</p>
            </div>

            <div class="etape"><!-- étape 3 -->
                <div class="icone"><img class="mx-auto check" src="images/check-circle-regular.svg"  width="100" height="100" alt="check"></div>
                <p>3.</p> 
                <p>Remplissez le formulaire de commande et réglez en ligne</p>
                <p>Vous serez livrés dans un délai de 30 à 45 minutes et prévenu par SMS en cas de retard.</p>
            </div>
        </div><!--/etape_process-->

    </div><!--/container -->
</section>

<section class="avis">
    <div class="container">
        <h1 class="text-center">Ce sont les Eaters qui en parlent le mieux!</h1>

        <fieldset>
            <div class="top_form">
                <h3>Avis (  )</h3> <!-- php affichage nb_avis entre les () -->
                <a href="#" class="btn btn-info badge-pill btn_avis">Ecrivez un avis</a>
            </div>

            <div class="body_form">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="5">
                    <label class="form-check-label" for="inlineCheckbox1">Ravi ( )</label> <!-- php affichage nb_5 entre ()-->
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4">
                    <label class="form-check-label" for="inlineCheckbox2">Très bien ( )</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3">
                    <label class="form-check-label" for="inlineCheckbox1">Moyen ( )</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="2">
                    <label class="form-check-label" for="inlineCheckbox2">Médiocre ( )</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Mécontent ( )</label>
                </div>
            </div>

            <div class="carousel_avis owl-carousel px-sm- mt-5 center"> 
                <article class="card border-0">
                    <a href="#"><img src="images/pizza2.jpg" class="card-img-top" alt="photo_plat"></a>
                    <div class="card-body">
                        <div class="auteur">
                            <img src="images/favicon2.png" style="width:32px; height:32px;" alt="icone">
                            <h2>Aurélien N.</h2> <!-- php récupérer nom auteur avis -->
                        </div>
                        <h3 class="card-title">Repas servis chaud</h3> 
                        <p class="card-text">Service rapide et coursiers agréables.
                            On a pû manger chaud de très bonnes pizzas!
                            Je recommande!
                        </p>
                        <a href="#" class="card-link">Lire la suite</a>
                    </div>
                </article>

                <article class="card border-0">
                    <div class="card-body">
                        <div class="auteur">
                            <img src="images/favicon2.png" style="width:32px; height:32px;" alt="icone">
                            <h2>Ludivine522</h2> <!-- php récupérer nom auteur avis -->
                        </div>
                        <h3 class="card-title">Service un peu long</h3> 
                        <p class="card-text">Temps de service conforme à celui indiqué mais que je trouve long          malgré tout. Je pense que cela s’explique qu’ils livrent en vélo.
                            Livreur sympathique, et bonne qualité des repas.
                        </p>
                        <a href="#" class="card-link">Lire la suite</a>
                    </div>
                </article>

                <article class="card border-0">
                    <a href="#"><img src="images/falafel2.jpg" class="card-img-top" alt="photo_plat"></a>
                    <div class="card-body">
                        <div class="auteur">
                            <img src="images/favicon2.png" style="width:32px; height:32px;" alt="icone">
                            <h2>Capucine L.</h2> <!-- php récupérer nom auteur avis -->
                        </div>
                        <h3 class="card-title">Bonne découverte</h3> 
                        <p class="card-text">Je n’avais jamais osé faire appel à un service de livraison de peur       d’être déçue ou de manger froid.
                            Bonne surprise! Eat it est un service fiable, et les coursiers … 
                        </p>
                        <a href="#" class="card-link">Lire la suite</a>
                    </div>
                </article>
            </div><!--/caroussel-->
        </fieldset>

    </div>
</section>

<?php require_once 'layout/footer.php'; ?>