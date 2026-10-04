<?php

namespace App\Models\CreatifsModel;

use \PDO;
function findAll(PDO $connexion): array
{
    // Requête SQL pour récupérer tous les créatifs avec le nombre de projets associés
    $sql = "SELECT 
                c.id, 
                c.pseudo, 
                c.bio, 
                c.image, 
                COUNT(p.id) AS projectCount 
            FROM creatifs c
            LEFT JOIN projets p ON c.id = p.creatif 
            GROUP BY c.id, c.pseudo, c.bio, c.image;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}