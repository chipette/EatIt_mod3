<?php
/* 
 * fichier qui va regrouper les requêtes SQL a passer pour la table horaire
 */


function getAllHoraires() {
    global $connexion; //je définie la portée de la variable $connexion comme étant "globale", donc elle existe dans la fonction
    
    // Exécuter une requête SQL
    $query = "
        SELECT
            id,
            jour,
            jour_numero,
            time_format(ouverture, '%kh%i') AS ouverture, 
            time_format(fermeture, '%kh%i') AS fermeture
        FROM horaire
        ORDER BY jour_numero;";//je définie ma requête 
    
    // format de l'horaire d'ouverture et fermeture en heure(%k)"h"minutes(%i) ex: 9h00, 17h00

    $stmt = $connexion->prepare($query);//je prépare la requête
    $stmt->execute(); //j'exécute la requête

    // Retourner les résultats sous forme de tableau
    return $stmt->fetchAll();
}
