<?php

/*
 * fichier qui regroupe les fonctions qui n'ont pas de rapports avec la bdd, mais avec l'affichage du site
 */

function getHeader(string $title) {
    require_once 'layout/header.php';
    getNav();
}

function getHeaderHome(string $title) {
    require_once 'layout/header.php';
    require_once 'layout/header_home.php';
    getNav();
}

function getNav() {
    require_once "layout/nav.php";
}

function getFooter() {
    require_once "layout/footer.php";
}

function isActive(string $url, bool $endWith = false): bool {
    if (
            (!$endWith && strpos($_SERVER['REQUEST_URI'], $url)) || ($endWith && endsWith($_SERVER['REQUEST_URI'], $url))
    ) {
        return true;
    }
    return false;
}

function endsWith(string $str, string $search): bool {
    $length = strlen($search);
    return substr($str, -$length) === $search;
}

function debug($var, bool $die = true) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($die) {
        die;
    }
}

function getCurrentUser() {
    // Démarrer la session si pas encore démarrée
    if (!isset($_SESSION)) {
        session_start();
    }
    // Récupérer l'utilisateur en cours si connecté
    if (isset($_SESSION["id"])) {
        return getOneRow("utilisateur", $_SESSION["id"]);
    }
    return null;
}
