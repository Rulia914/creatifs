<?php

namespace App\Models\CreatifsModel;

use \PDO;
function findAll(PDO $connexion): array
{
    $sql = 'SELECT 
                id, 
                pseudo, 
                bio, 
                image 
            FROM creatifs;';

    $rs = $connexion->query($sql);

    return $rs->fetchAll(PDO::FETCH_ASSOC);
}