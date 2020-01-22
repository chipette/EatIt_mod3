<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_POST["id"];

$error = deleteRow("restaurant", $id);

if ($error) {
    header("Location: index.php?errcode=" . $error->getCode());
    exit;
}

header("Location: index.php");