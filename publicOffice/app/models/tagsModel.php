<?php

namespace App\Models\TagsModel;

use \PDO;
function findAll(PDO $connexion): array
{
    $sql = "SELECT *
            FROM tags
            ORDER BY id;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByProjectId(PDO $connexion, int $projetId): array
{
    $sql = "SELECT t.*
            FROM tags t
            INNER JOIN projets_has_tags pt ON t.id = pt.tag
            WHERE pt.projet = :projetId
            ORDER BY t.id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':projetId', $projetId, PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
