<?php
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"]; // on récupère l'id du réseau social dans l'url de la page

$reseau_social = getOneRow("reseau_social", $id); // on récupère les données du réseau social concerné par l'id

require_once __DIR__ . "/../../layout/header.php";
?>

    <h1>Modification d'un réseau social</h1>

    <form action="update_query.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" value="<?= $reseau_social["url"] ?>" class="form-control" placeholder="URL" required>
            <!-- l'attribut "value" nous sert à préremplir le champs avec les données récupérées via l'id dans l'url de la page-->
        </div>
        <div class="form-group">
            <label>Icone</label>
            <input type="text" name="icone" value="<?= $reseau_social["icone"] ?>" class="form-control" placeholder="Icone" required>
        </div>
        <input type="hidden" name="id" value="<?= $reseau_social["id"]; ?>">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Modifier
        </button>
    </form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>