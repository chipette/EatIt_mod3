<?php require_once __DIR__ . "/../../layout/header.php"; 

$specialites = getAllRows("specialite");
?>

<h1>Ajout d'un restaurant</h1>

<form action="create_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" placeholder="Nom du retaurant" required>
    </div>
    <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="adresse" class="form-control" placeholder="Adresse de l'établissement" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" class="form-control" placeholder="Description rapide du restaurant" required>
    </div>
    <div class="form-group">
        <label>Spécialité</label>
        <select name="specialite_id" class="form-control">
            <option disabled selected>Choisissez votre specialité</option>
            <?php foreach ($specialites as $specialite) : ?>
                <option value="<?= $specialite["id"]; ?>"><!-- on veut envoyer au serveur l'id de la spécialité sélectionnée -->
                    <?= $specialite["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Logo</label>
        <input type="file" name="logo" class="form-control" placeholder="Logo" required>
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