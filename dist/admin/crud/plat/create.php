<?php
//fichier de la page d'ajout d'un médecin

require_once __DIR__ . "/../../../model/database.php";

$specialites = getAllRows("specialite");

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Ajout d'un médecin</h1>

<form action="create_query.php" method="post" enctype="multipart/form-data"><!-- enctype est présent pour donner la possibilite d'uploader des fichiers -->
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" placeholder="Nom" required>
    </div>
    <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Spécialités</label>
        <select name="specialite_ids[]" class="form-control" multiple><!-- liste à choix multiples "select"+ "multiple" + [] à la fin de du nom de la variable "specialites_ids" car on récupère un tableau et nom un seul id -->
            <?php foreach ($specialites as $specialite) : ?>
                <option value="<?= $specialite["id"]; ?>"><!-- on veut envoyer au serveur les id des spécialités sélectionnées -->
                    <?= $specialite["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Ajouter
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>