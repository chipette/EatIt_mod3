<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_POST["id"];
$nom = $_POST["nom"];
$adresse = $_POST["adresse"];
$description = $_POST["description"];
$logo = $_FILES["logo"]["name"];
$image = $_FILES["image"]["name"];
$specialite_id = $_POST["specialite_id"];


if ($image) {
    // Gérer l'upload du fichier
    move_uploaded_file($_FILES["image"]["tmp_name"], "../../../uploads" . $image);
} else {
    //récupérer l'ancienne image et la renvoyer en bdd, pour la remettre en tant qu'image
    $restaurant = getOneRow("restaurant", $id);
    $image = $restaurant["image"];
}

if ($logo) {
    // Gérer l'upload du fichier
    move_uploaded_file($_FILES["logo"]["tmp_name"], "../../../uploads" . $image);
} else {
    //récupérer l'ancienne image et la renvoyer en bdd, pour la remettre en tant qu'image
    $restaurant = getOneRow("restaurant", $id);
    $logo = $restaurant["logo"];
}


updateRow("restaurant", $id, [
    "nom" => $nom,
    "adresse" => $adresse,
    "description" => $description,
    "logo" => $logo,
    "image" => $image,
    "specialite_id" => $specialite_id
]);



header("Location: index.php");