<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$url = $_POST["url"];
$icone = $_POST["icone"];
//$picto = $_FILES["picto"]["name"]; //dans notre exemple on a pas d'upload de fichier à gérer

// Gérer l'upload du fichier
//move_uploaded_file($_FILES["picto"]["tmp_name"], "../../../uploads/services/" . $picto);

insertRow("reseau_social", [
        "url" => $url,
        "icone" => $icone
]);
        
//Rediriger vers la liste du crud
header("Location: index.php");