<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$image = $_FILES["image"]["name"]; //on veur récupérer le nom du fichier uploadé, et il est uploadé sous forme d'une tableau dont l'index est "image", 
//et on a dans ce tableau "image" à l'index "name", le nom du fichier à uploader
$restaurant_id = $_POST["restaurant_id"];
$type_plat_id = $_POST["type_plat_id"];



// Gérer l'upload du fichier
move_uploaded_file($_FILES["image"]["tmp_name"], "../../../uploads/" . $image);

//on appelle la "super fonction" qui va insérer les données en bdd, on lui passe en paramètres le nom de la table concernée et les données sous forme de tableau
//associatif
//comme dans cette "super fonction" il y a un return du dernier id inséré (voir dans fichier database.php), on récupère cet id dans la variable "$plat_id"
$plat_id = insertRow("plat", [
    "nom" => $nom,    
    "description" => $description,
    "image" => $image,
    "prix" => $prix,
    "restaurant_id" => $restaurant_id,
    "type_plat_id" => $type_plat_id
]);

//Rediriger vers la liste du crud
header("Location: index.php");