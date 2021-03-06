<?php
require_once __DIR__ . "/../../../model/database.php";

$restaurants = getAllRows("restaurant");

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Gestion des restaurants</h1>

<a href="create.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<!-- Affichage des erreurs -->
<?php if (isset($_GET["errcode"])): ?>
    <div class="alert alert-danger">
        <i class="fa fa-times"></i>
        <?php if ($_GET["errcode"] == 23000): ?>
            Erreur lors de la suppression.
        <?php else: ?>
            Une erreur est survenue...
        <?php endif; ?>
    </div>
<?php endif; ?>

<hr>

<table class="table table-striped table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Description</th>
            <th>Logo</th>
            <th>Image</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($restaurants as $restaurant) : ?>
            <tr>
                <td><?= $restaurant["nom"]; ?></td>
                <td><?= $restaurant["adresse"]; ?></td>
                <td><?= $restaurant["description"]; ?></td>
                <td>
                    <!-- upload d'une photo du restaurant selectionné par l'admin -->
                    <img src="../../../uploads/<?= $restaurant["logo"]; ?>" class="img-thumbnail" alt="">
                </td>
                <td>
                    <!-- upload d'une photo du restaurant selectionné par l'admin -->
                    <img src="../../../uploads/<?= $restaurant["image"]; ?>" class="img-thumbnail" alt="">
                </td>
                <td class="actions">
                    <a href="update.php?id=<?= $restaurant["id"]; ?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                        Modifier
                    </a>
                    <form action="delete_query.php" method="post">
                        <input type="hidden" name="id" value="<?= $restaurant["id"]; ?>">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>