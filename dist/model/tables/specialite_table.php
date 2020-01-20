<?php

/* 
 Ce fichier contient toute les requêtes concernant la table des specialites
 */

function getAllSpecialitesByMedecin(int $id) {  //je donne le type de mon paramètre à passer à ma fonction
    global $connexion; //je définie la portée de la variable $connexion comme étant "globale", donc elle existe dans la fonction
    
    // Exécuter une requête SQL
    //je définie ma requête en renommant ma table "medecin_has_specialite" en "mhs" pour réduire la longueur de la requête
    //dans cette requête, j'utlise les jointures
    $query = "
        SELECT *
        FROM specialite
        INNER JOIN medecin_has_specialite AS mhs ON specialite.id = mhs.specialite_id
        WHERE mhs.medecin_id = :id
            ;";
    
    // format de l'horaire d'ouverture et fermeture en heure(%k)"h"minutes(%i) ex: 9h00, 17h00

    $stmt = $connexion->prepare($query);//je prépare la requête
    $stmt-> bindParam(":id", $id); // cette ligne fait le lien entre $id et :id, c'est un paramètre de sécurité
    $stmt->execute(); //j'exécute la requête

    // Retourner les résultats sous forme de tableau
    return $stmt->fetchAll();
}


function deleteSpecialiteMedecin ($id) {
    global $connexion; //je définie la portée de la variable $connexion comme étant "globale", donc elle existe dans la fonction
    
    $query= "DELETE FROM medecin_has_specialite WHERE medecin_id = :id";
    
    $stmt = $connexion->prepare($query);//je prépare la requête
    $stmt-> bindParam(":id", $id); // cette ligne fait le lien entre $id et :id, c'est un paramètre de sécurité
    $stmt->execute(); //j'exécute la requête
           
}