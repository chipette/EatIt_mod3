<?php

/* 
 Ce fichier contient toute les requêtes concernant la table des specialites
 */

function getAllplatsByResto($id = null) {  
    global $connexion; 
    
    // Exécuter une requête SQL
    //dans cette requête, j'utlise les jointures: 
    //récupérer la liste des plats associée aux restaurants
    $query = "
        SELECT plat.*, restaurant.nom AS restaurant_nom
        FROM plat
        INNER JOIN restaurant ON plat.restaurant_id = restaurant.id
    ";
    
    if ($id) {
        $query .= " WHERE restaurant.id = :id "; // "where" optionnel qui prend en paramètre l'id du restaurant sélectioné pour permettre l'affichage du nom du resto quand on le choisi dans la liste de filtre
    }
    
    $query .= " ORDER BY restaurant.id ASC";
   

    $stmt = $connexion->prepare($query);//je prépare la requête
    if ($id) {
        $stmt->bindValue(":id", $id);
    }
    $stmt->execute(); //j'exécute la requête

    // Retourner les résultats sous forme de tableau
    return $stmt->fetchAll();
}