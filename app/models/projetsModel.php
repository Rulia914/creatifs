<?php

namespace App\Models\projetsModel;

use \PDO;

function findAll(PDO $connexion, int $limit = 10): array
{
    $sql = 'SELECT *
            FROM projets
            LIMIT :limit;';
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connexion, int $id) : array
{
    $sql = 'SELECT *
            FROM projets
            WHERE id = :id;';
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
