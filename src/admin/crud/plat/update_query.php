<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_POST["id"];
$nom = $_POST["nom"];
$description = $_POST["description"];
$image = $_FILES["image"]["name"];
$prix = $_POST["prix"];


if ($image) {
    // Gérer l'upload du fichier
    move_uploaded_file($_FILES["image"]["tmp_name"], "../../../uploads" . $image);
} else {
    //récupérer l'ancienne image et la renvoyer en bdd, pour la remettre en tant qu'image
    $restaurant = getOneRow("restaurant", $id);
    $image = $restaurant["image"];
}


updateRow("plat", $id, [
    "nom" => $nom,
    "description" => $description,
    "image" => $image,
    "prix" => $prix
]);



header("Location: index.php");