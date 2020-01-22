<?php require_once __DIR__ . "/../../layout/header.php"; 

$restaurants = getAllRows("restaurant");
$categories = getAllRows("type_plat");

?>

<h1>Ajout d'un plat</h1>

<form action="create_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Selectionnez votre restaurant</label>
        <select name="restaurant_id" class="form-control" id="exampleFormControlSelect1">
            <option disabled selected>Choisissez un resto</option>
            <?php foreach ($restaurants as $restaurant) : ?> 
                <option value="<?= $restaurant["id"]; ?>">
                    <?= $restaurant["nom"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" placeholder="Nom du plat" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" class="form-control" placeholder="Description rapide du plat" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Selectionnez la catégorie du plat créé</label>
        <select name="type_plat_id" class="form-control" id="exampleFormControlSelect2">
            <option disabled selected>Choisissez une catégorie</option>
            <?php foreach ($categories as $categorie) : ?> 
                <option value="<?= $categorie["id"]; ?>">
                    <?= $categorie["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Prix</label>
        <input type="text" name="prix" class="form-control" placeholder="Prix" required>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control" placeholder="Image" required>
    </div>
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Ajouter
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>