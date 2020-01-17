<!-- Fichier du menu gauche de l'interface admin -->

<?php require_once __DIR__ . '/../../functions.php'; ?>

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo isActive("/admin/", true) ? 'active' : ''; ?>" href="<?php echo SITE_ADMIN; ?>">
                    <i class="fa fa-home"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isActive("/crud/reseau_social/") ? 'active' : ''; ?>" href="<?php echo SITE_ADMIN; ?>crud/reseau_social/">
                    <i class="fa fa-users"></i>
                    Réseaux sociaux
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isActive("/crud/medecin/") ? 'active' : ''; ?>" href="<?php echo SITE_ADMIN; ?>crud/medecin/">
                    <i class="fa fa-user-md"></i>
                    Médecins
                </a>
            </li>
        </ul>
    </div>
</nav>