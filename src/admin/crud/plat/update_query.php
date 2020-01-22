<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_POST["id"];
$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$image = $_FILES["image"]["name"]; //on veur récupérer le nom du fichier uploadé, et il est uploadé sous forme d'une tableau dont l'index est "image", 
//et on a dans ce tableau "image" à l'index "name", le nom du fichier à uploader
$restaurant_id = $_POST["restaurant_id"];
$type_plat_id = $_POST["type_plat_id"];


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
    "prix" => $prix,
    "restaurant_id" => $restaurant_id,
    "type_plat_id" => $type_plat_id
]);



header("Location: index.php");