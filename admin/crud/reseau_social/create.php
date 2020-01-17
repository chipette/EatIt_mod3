<?php require_once __DIR__ . "/../../layout/header.php"; ?>

<h1>Ajout d'un réseau social</h1>

<form action="create_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" class="form-control" placeholder="URL" required>
    </div>
    <div class="form-group">
        <label>Icone</label>
        <input type="text" name="icone" class="form-control" placeholder="Icone" required>
    </div>
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Ajouter
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>