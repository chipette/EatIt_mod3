<?php require_once __DIR__ . "/../../layout/header.php"; 

$id = $_GET["id"];
$plat = getOneRow("plat", $id);
$restaurants = getAllRows("restaurant");
$categories = getAllRows("type_plat");


?>

<h1>Modification d'un plat</h1>

<form action="update_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Selectionnez votre restaurant</label>
        <select name="restaurant_id" class="form-control" id="exampleFormControlSelect1">
            <?php foreach ($restaurants as $restaurant) : ?> 
            <?php $selected = $restaurant["id"] == $plat["restaurant_id"] ? "selected" : ""; ?>
                <option value="<?= $restaurant["id"]; ?>" <?= $selected; ?>>
                    <?= $restaurant["nom"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= $plat["nom"]; ?>" class="form-control" placeholder="Nom du plat" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" value="<?= $plat["description"]; ?>" class="form-control" placeholder="Description rapide du plat" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Selectionnez la catégorie du plat créé</label>
        <select name="type_plat_id" class="form-control" id="exampleFormControlSelect2">
            <?php foreach ($categories as $categorie) : ?> 
            <?php $selected = $categorie["id"] == $plat["type_plat_id"] ? "selected" : ""; ?>
                <option value="<?= $categorie["id"]; ?>">
                    <?= $categorie["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Prix</label>
        <input type="text" name="prix" value="<?= $plat["prix"]; ?>" class="form-control" placeholder="Prix" required>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control" placeholder="Image" required>
        <img src="../../../uploads/<?= $plat["image"]; ?>" class="img-thumbnail">
    </div>
    
    <input type="hidden" name="id" value="<?= $plat["id"]; ?>">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Modifier
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>