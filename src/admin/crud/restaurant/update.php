<?php
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"]; // récupère l'id du médecin sélectionné dans l'url

$medecin = getOneRow("medecin", $id); // a partir de l'id, récupère les données du médecin selectionné (d'où le getOneRow)
$specialites = getAllRows("specialite");
$specialites_medecin = getAllSpecialitesByMedecin($id);// récupérer les specialites du medecin sélectionné

$specialites_ids = array_map(function($specialite) { // prend un tableau associatif en entrée et en ressort un simplifié ici juste un id => specialité(s) du médecin
    return $specialite["id"];
}, $specialites_medecin);


require_once __DIR__ . "/../../layout/header.php";
?>

    <h1>Modification d'un médecin</h1>

    <form action="update_query.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" value="<?= $medecin["nom"]; ?>" class="form-control" placeholder="Nom" required>
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?= $medecin["prenom"]; ?>" class="form-control" placeholder="Prénom" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img src="../../../uploads/<?= $medecin["image"]; ?>" class="img-thumbnail">
        </div>
        <div class="form-group">
            <label>Spécialités</label>
            <select name="specialite_ids[]" class="form-control" multiple><!-- liste à choix multiples "select"+ "multiple" + [] à la fin de du nom de la variable "specialites_ids" car on récupère un tableau et nom un seul id -->
                <?php foreach ($specialites as $specialite) : ?>
                    <?php $selected = (in_array($specialite["id"], $specialites_ids)) ? "selected" : ""; ?>
                    <option value="<?= $specialite["id"]; ?>" <?= $selected; ?>><!-- on veut envoyer au serveur les id des spécialités sélectionnées -->
                        <?= $specialite["libelle"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $medecin["description"]; ?></textarea>
        </div>
        
        <input type="hidden" name="id" value="<?= $medecin["id"]; ?>">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Modifier
        </button>
    </form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>