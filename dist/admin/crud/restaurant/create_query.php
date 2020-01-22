<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$nom = $_POST["nom"];
$adresse = $_POST["adresse"];
$description = $_POST["description"];
$specialite_id = $_POST["specialite_id"];
$logo = $_FILES["logo"]["name"];
$image = $_FILES["image"]["name"]; //on veur récupérer le nom du fichier uploadé, et il est uploadé sous forme d'une tableau dont l'index est "image", 
//et on a dans ce tableau "image" à l'index "name", le nom du fichier à uploader




// Gérer l'upload du fichier
move_uploaded_file($_FILES["image"]["tmp_name"], "../../../uploads/" . $image);
move_uploaded_file($_FILES["logo"]["tmp_name"], "../../../uploads/" . $logo); 

//on appelle la "super fonction" qui va insérer les données en bdd, on lui passe en paramètres le nom de la table concernée et les données sous forme de tableau
//associatif
//comme dans cette "super fonction" il y a un return du dernier id inséré (voir dans fichier database.php), on récupère cet id dans la variable "$resto_id"
$resto_id = insertRow("restaurant", [
    "nom" => $nom,
    "adresse" => $adresse,
    "description" => $description,
    "logo" => $logo,
    "image" => $image,
    "specialite_id" => $specialite_id
    
]);

//Rediriger vers la liste du crud
header("Location: index.php");