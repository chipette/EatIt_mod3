<?php
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"]; // récupère l'id du restaurant sélectionné dans l'url

$restaurant = getOneRow("restaurant", $id); // a partir de l'id, récupère les données du médecin selectionné (d'où le getOneRow)
$specialites = getAllRows("specialite");



require_once __DIR__ . "/../../layout/header.php";
?>

    <h1>Modification d'un restaurant</h1>

    <form action="update_query.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" value="<?= $restaurant["nom"]; ?>" class="form-control" placeholder="Nom" required>
        </div>
        <div class="form-group">
            <label>Adresse</label>
            <input type="text" name="adresse" value="<?= $restaurant["adresse"]; ?>" class="form-control" placeholder="Adresse" required>
        </div>
        <div class="form-group">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
            <img src="../../../uploads/<?= $restaurant["logo"]; ?>" class="img-thumbnail">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img src="../../../uploads/<?= $restaurant["image"]; ?>" class="img-thumbnail">
        </div>
        <div class="form-group">
            <label>Spécialités</label>
            <select name="specialite_id" class="form-control"><!-- liste à choix multiples "select"+ "multiple" + [] à la fin de du nom de la variable "specialites_ids" car on récupère un tableau et nom un seul id -->
                <?php foreach ($specialites as $specialite) : ?>
                    <?php $selected = $specialite["id"] == $restaurant["specialite_id"] ? "selected" : ""; ?>
                    <option value="<?= $specialite["id"]; ?>" <?= $selected; ?>><!-- on veut envoyer au serveur les id des spécialités sélectionnées -->
                        <?= $specialite["libelle"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $restaurant["description"]; ?></textarea>
        </div>
        
        <input type="hidden" name="id" value="<?= $restaurant["id"]; ?>">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Modifier
        </button>
    </form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>