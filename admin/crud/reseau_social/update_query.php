<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_POST["id"];
$url = $_POST["label"];
$icone = $_POST["icone"];
//$picto = $_FILES["picto"]["name"]; si upload de fichiers



updateRow("reseau_social", $id, [
    "url" => $url,
    "icone" => $icone
]);



// si on a un upload de fichier
//if ($picto) {
    // Gérer l'upload du fichier
//    move_uploaded_file($_FILES["picto"]["tmp_name"], "../../../uploads/services/" . $picto);
//} else {
//    $service = getOneRow("service", $id);
//    $picto = $service["picto"];
//}

//updateService($id, $label, $picto);

header("Location: index.php");