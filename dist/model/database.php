<?php
//chemin relatif au fichier parameters depuis n'importe où
//on relie ce fichier au fichier parameters d'où on récupère les constantes de paramétrages
require_once __DIR__ . "/../config/parameters.php";

// Se connecter à la base de données
try {
    $connexion = new PDO("mysql:dbname=" . DB_NAME . ";host=" .DB_HOST, DB_USER , DB_PASS, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', lc_time_names = 'fr_FR'", //premiere requete passée à la création et demande de l'affichage utf8 avec les accents
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //les deux lignes servent à le levée d'exceptions et affichage des erreurs
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $ex){
    echo "Erreur de connexion à la base de données !";
}



// Charger les fonctions des fichiers du dossier "tables"
$files = glob(__DIR__ . "/tables/*.php");
foreach ($files as $filepath) {
    require_once $filepath;
}



/**
 * creation de fonction générique qui nous retourne toutes les lignes de la table de la bdd spécifiée en paramètre
 * @global type $connexion : Connexion à la base de données
 * @param string $table : nom de la table
 * @return type Array : Lignes des tables
 */
function getAllRows(string $table) {
    global $connexion; //je définie la portée de la variable $connexion comme étant "globale", donc elle existe dans la fonction
    
    // Exécuter une requête SQL
    $query = "SELECT * FROM $table";//je définie ma requête

    $stmt = $connexion->prepare($query);//je prépare la requête
    $stmt->execute(); //j'exécute la requête

    // Retourner les résultats sous forme de tableau que l'on parcourera avec une boucle
    return $stmt->fetchAll();
}


/**
 * creation de fonction générique qui nous retourne toutes les lignes avec l'id recherché de la table de la bdd spécifiée en paramètre
 * @global type $connexion : Connexion à la base de données
 * @param string $table : nom de la table
 * @return type Array : Lignes des tables
 */
function getAllRowsToCat(string $table, string $entree_id, int $id) {
    global $connexion; //je définie la portée de la variable $connexion comme étant "globale", donc elle existe dans la fonction
    
    // Exécuter une requête SQL
    $query = "SELECT * FROM $table WHERE $entree_id = $id";//je définie ma requête

    $stmt = $connexion->prepare($query);//je prépare la requête
    //$stmt->bondParam(":id", $id);
    $stmt->execute(); //j'exécute la requête

    // Retourner les résultats sous forme de tableau que l'on parcourera avec une boucle
    return $stmt->fetchAll();
}


/**
 * fonction générique qui nous retourne une seule ligne d'une table de la bdd selon l'id
 * @global type $connexion
 * @param string $table : nom de la table
 * @param int $id : id de la ligne souhaitée
 * @return type Array : ligne de la table sous forme de tableau simple
 */
function getOneRow(string $table, int $id) {
    global $connexion; //je définie la portée de la variable $connexion comme étant "globale", donc elle existe dans la fonction
    
    // Exécuter une requête SQL
    $query = "SELECT * FROM $table WHERE id = :id";//je définie ma requête en la sécurisant en mettant ":id" à la place de $id (trop risqué)

    $stmt = $connexion->prepare($query);//je prépare la requête
    $stmt->bindParam(":id", $id);//sécurité pour éviter les "injections" SQL depuis l'URL va de paire avec la ligne 58
    $stmt->execute(); //j'exécute la requête

    // Retourner les résultats sous d'un tableau simple clé <-> valeur qu'on ne peut pas parcourir avec une boucle
    return $stmt->fetch();
}


/**
 * Insérer une nouvelle ligne dans une table
 * @global type $connexion Connection à la base de données
 * @param string $table Nom de la table
 * @param array $data Données à insérer
 * @return int Identifiant de la nouvelle ligne
 */
function insertRow(string $table, array $data) {
    global $connexion;

    $query = "INSERT INTO $table (";
    
    foreach ($data as $column => $value) {
        $query .= $column . ",";
    }
    $query = rtrim($query, ","); // Retirer la dernière virgule
    
    $query .= ") VALUES (";
    
    foreach ($data as $column => $value) {
        $query .= ":" . $column . ",";
    }
    $query = rtrim($query, ","); // Retirer la dernière virgule
    
    $query .= ")";

    $stmt = $connexion->prepare($query);
    foreach ($data as $column => $value) {
        $stmt->bindValue(":" . $column, $value);
    }
    $stmt->execute();
    
    return $connexion->lastInsertId();
}


/**
 * Modifier une ligne dans une table
 * @global PDO $connexion Connection à la base de données
 * @param string $table Nom de la table
 * @param int $id Identifiant de la ligne à mettre à jour
 * @param array $data Données à modifier
 * @return bool Indique si la requête SQL a réussie
 */
function updateRow(string $table, int $id, array $data) {
    global $connexion;

    $query = "UPDATE $table SET ";
    
    foreach ($data as $column => $value) {
        $query .= $column . " = :" . $column. ",";
    }
    $query = rtrim($query, ","); // Retirer la dernière virgule
    
    $query .= " WHERE id = :id";

    $stmt = $connexion->prepare($query);
    $stmt->bindValue(":id", $id);
    foreach ($data as $column => $value) {
        $stmt->bindValue(":" . $column, $value);
    }
    return $stmt->execute();
}


/**
 * Supprimer une ligne dans une table
 * @global type $connexion Connection à la base de données
 * @param string $table Nom de la table
 * @param int $id Identifiant de la ligne à mettre à jour
 * @return ?PDOException Indique si la requête SQL a réussie
 */
function deleteRow(string $table, int $id) {
    global $connexion;

    $query = "DELETE FROM $table WHERE id = :id";

    $stmt = $connexion->prepare($query);
    $stmt->bindValue(":id", $id);
    try {
        $stmt->execute();
    } catch (PDOException $exception) {
        return $exception;
    }

    return null;
}