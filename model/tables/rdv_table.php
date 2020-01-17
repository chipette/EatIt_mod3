<?php

/* 
 * Fichier qui contient les fonctions et requêtes qui concernent l'envoie des informations récoltées en bdd
 */

function insertRdv(string $nom, string $prenom, string $email, string $telephone, string $date, string $heure, string $message, int $specialite_id) {
    global $connexion;
    
    $query = "
        INSERT INTO rdv (nom, prenom, email, telephone, date, heure, message, specialite_id)
        VALUES (:nom, :prenom, :email, :telephone, :date, :heure, :message, :specialite_id)
    ";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telephone", $telephone);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":heure", $heure);
    $stmt->bindParam(":message", $message);
    $stmt->bindParam(":specialite_id", $specialite_id);
    $stmt->execute();
}