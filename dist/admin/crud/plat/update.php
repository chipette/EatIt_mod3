<?php
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"]; // récupère l'id du plat sélectionné dans l'url

$plat = getOneRow("plat", $id); // a partir de l'id, récupère les données du médecin selectionné (d'où le getOneRow)



require_once __DIR__ . "/../../layout/header.php";
?>

    <h1>Modification d'un plat</h1>

    <form action="update_query.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" value="<?= $plat["nom"]; ?>" class="form-control" placeholder="Nom" required>
        </div>
        <div class="form-group">
            <label>Prix</label>
            <input type="text" name="adresse" value="<?= $plat["prix"]; ?>" class="form-control" placeholder="Adresse" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img src="../../../uploads/<?= $plat["image"]; ?>" class="img-thumbnail">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $plat["description"]; ?></textarea>
        </div>
        
        <input type="hidden" name="id" value="<?= $plat["id"]; ?>">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Modifier
        </button>
    </form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>