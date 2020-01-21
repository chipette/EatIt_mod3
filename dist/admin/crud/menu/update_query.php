<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_POST["id"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$description = $_POST["description"];
$image = $_FILES["image"]["name"];
$specialite_ids = $_POST["specialite_ids"];


if ($image) {
    // Gérer l'upload du fichier
    move_uploaded_file($_FILES["image"]["tmp_name"], "../../../uploads" . $image);
} else {
    //récupérer l'ancienne image et la renvoyer en bdd, pour la remettre en tant qu'image
    $medecin = getOneRow("medecin", $id);
    $image = $medecin["image"];
}


updateRow("medecin", $id, [
    "nom" => $nom,
    "prenom" => $prenom,
    "description" => $description,
    "image" => $image
]);


//j'appel la fonction pour supprimer de la BDD, les specialites du médecin à mettre à jour (lien avec l'id)
deleteSpecialiteMedecin($id);

//je rajoute dans la BDD, les specialites du médecin à mettre à jour
foreach ($specialite_ids as $specialite_id) {
    insertRow("medecin_has_specialite", [
       "medecin_id" => $id,
        "specialite_id"=> $specialite_id
    ]);
}

header("Location: index.php");