<?php
// fichier de requêtes SQL vers la BDD quand on veut ajouter un médecin

require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$image = $_FILES["image"]["name"]; //on veur récupérer le nom du fichier uploadé, et il est uploadé sous forme d'une tableau dont l'index est "image", 
//et on a dans ce tableau "image" à l'index "name", le nom du fichier à uploader
$specialite_ids = $_POST["specialite_ids"];
$description = $_POST["description"];


// Gérer l'upload du fichier
move_uploaded_file($_FILES["image"]["tmp_name"], "../../../uploads/" . $image);

//on appelle la "super fonction" qui va insérer les données en bdd, on lui passe en paramètres le nom de la table concernée et les données sous forme de tableau
//associatif
//comme dans cette "super fonction" il y a un return du dernier id inséré (voir dans fichier database.php), on récupère cet id dans la variable "$medecin_id"
$medecin_id = insertRow("medecin", [
    "nom" => $nom,
    "prenom" => $prenom,
    "image" => $image,
    "description" => $description
]);

//je boucle sur le tabelau des specialite_ids pour faire entrer dans la table de jointure (ou table associative) la ou les spécialités du nouveau medecin ajouté
foreach ($specialite_ids as $specialite_id) {
    insertRow("medecin_has_specialite", [
        "medecin_id" => $medecin_id,
        "specialite_id" => $specialite_id
    ]);
}
header("Location: index.php");