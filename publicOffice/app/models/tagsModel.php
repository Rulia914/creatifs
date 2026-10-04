<?php

namespace App\Models\TagsModel;

use \PDO;

function findAll(PDO $connexion): array
{
    // On sélectionne tous les tags
    $sql = "SELECT *
            FROM tags
            ORDER BY id;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByProjectId(PDO $connexion, int $projectId): array
{
    // On sélectionne tous les tags (t.*) et on ajoute un champ boolean 'is_checked'
    $sql = "SELECT t.*, 
                   (pt.projet IS NOT NULL) AS is_checked
            FROM tags t
            LEFT JOIN projets_has_tags pt 
                   ON t.id = pt.tag 
                  AND pt.projet = :projectId
            ORDER BY t.id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':projectId', $projectId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function insertByProjetId(PDO $connexion, int $projectId, array $tagIds): void
{
    // On insère les liaisons entre le projet et les tags sélectionnés
    $sql = "INSERT INTO projets_has_tags (projet, tag)
            VALUES (:projet, :tag);";

    $rs = $connexion->prepare($sql);

    // La requête préparée est réutilisée pour chaque tag coché
    foreach ($tagIds as $tagId) {
        $rs->bindValue(':projet', $projectId, PDO::PARAM_INT);
        $rs->bindValue(':tag', $tagId, PDO::PARAM_INT);
        $rs->execute();
    }
}

function deleteByProjectId(PDO $connexion, int $projectId): void
{
    // On supprime toutes les liaisons entre le projet et les tags
    $sql = "DELETE FROM projets_has_tags
            WHERE projet = :projectId;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':projectId', $projectId, PDO::PARAM_INT);
    $rs->execute();
}