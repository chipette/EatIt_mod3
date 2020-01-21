<?php
require_once __DIR__ . "/../../../model/database.php";

$specialites = getAllRows("specialite");
$id = $_GET["id"];

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Gestion des plats</h1>

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

<div class="dropdown mb-5">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Choisissez votre restaurant
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php foreach ($specialites as $specialite) : ?>
        <h5 class="dropdown-header"><?= $specialite["libelle"]; ?></h5>
        <?php $restaurants = getAllRows("restaurant", ["specialite_id" => $specialite["id"]]); ?>

        <?php foreach ($restaurants as $restaurant) : ?>
            <a class="dropdown-item" href="#?id=<?= $restaurant["id"]; ?>"><?= $restaurant["nom"]; ?></a>
        <?php endforeach; ?>

    <?php endforeach; ?>
  </div>
</div>

<table class="table table-striped table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Nom</th>            
            <th>Description</th>
            <th>Prix</th>
            <th>Image</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $plats = getAllRows("plat", ["restaurant_id" => $id]); ?>
        
        <?php foreach ($plats as $plat) : ?>
            <tr>
                <td><?= $plat["nom"]; ?></td>
                <td><?= $plat["description"]; ?></td>
                <td><?= $plat["prix"]; ?></td>
                <td>
                    <!-- upload d'une photo du médecin selectionné par l'utilisateur -->
                    <img src="../../../uploads/<?= $plat["image"]; ?>" class="img-thumbnail" alt="">
                </td>
                <td class="actions">
                    <a href="update.php?id=<?= $plat["id"]; ?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                        Modifier
                    </a>
                    <form action="delete_query.php" method="post">
                        <input type="hidden" name="id" value="<?= $plat["id"]; ?>">
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