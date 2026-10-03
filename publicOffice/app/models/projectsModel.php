<?php

// Définition de l'espace de nom du modèle (utilisé pour appeler ces fonctions depuis le contrôleur)
namespace App\Models\projectsModel;

// Importation de la classe PDO pour interagir avec la base de données
use \PDO;

//Récupère une liste de projects (limité à $limit résultats) avec les informations du créatif associé
function findAll(PDO $connexion): array
{
    // Requête SQL pour récupérer tous les champs du projet + les infos de son créatif
    $sql = 'SELECT 
            p.*, 
            c.id AS creatif_id,
            c.pseudo AS pseudo, 
            c.bio AS bio, 
            c.image AS creatif_image
            FROM projets p
            LEFT JOIN creatifs c ON p.creatif = c.id';

    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

//Récupère un seul projet en base de données à partir de son ID
function findOneById(PDO $connexion, int $id): array
{
    // Requête SQL pour cibler un projet précis via son ID
    $sql = 'SELECT 
            p.*, 
            c.id AS creatif_id,
            c.pseudo AS pseudo, 
            c.bio AS bio, 
            c.image AS creatif_image
        FROM projets p
        LEFT JOIN creatifs c ON p.creatif = c.id
        WHERE p.id = :id;';

    // Préparation et exécution de la requête
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();

    // Retourne un tableau associatif avec les données du projet (ou false si non trouvé)
    return $rs->fetch(PDO::FETCH_ASSOC);
}

//Supprime un projet et ses liaisons avec les tags
function deleteOneById(PDO $connexion, int $id)
{
    // 1. Supprime d'abord les associations du projet dans la table pivot (tags)
    $sql = "DELETE FROM projets_has_tags
            WHERE projet = :id";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();

    // 2. Supprime ensuite le projet de la table principale
    $sql = "DELETE FROM projets
            WHERE id = :id";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
}

//Insère un nouveau projet en base de données et retourne son ID
function insertOne(PDO $connexion, array $data): int
{
    // Requête SQL d'insertion
    $sql = 'INSERT INTO projets (titre, texte, dateCreation, image, creatif) 
            VALUES (:titre, :texte, NOW(), :image, :creatif);';

    // Injection sécurisée des données transmises par le formulaire
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':titre', $data['titre'], PDO::PARAM_STR);
    $rs->bindValue(':texte', $data['texte'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->bindValue(':creatif', $data['creatif'], PDO::PARAM_INT);
    $rs->execute();

    // Renvoie l'ID auto-généré du projet venant d'être créé
    return (int) $connexion->lastInsertId();
}

//Modifie les données d'un projet existant
function editOneById(PDO $connexion, int $id, array $data): bool
{
    // Requête SQL de mise à jour
    $sql = 'UPDATE projets 
            SET titre = :titre,
                texte = :texte,
                image = :image,
                creatif = :creatif
            WHERE id = :id;';

    // Injection des nouvelles valeurs et ciblage par l'ID
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':titre', $data['titre'], PDO::PARAM_STR);
    $rs->bindValue(':texte', $data['texte'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->bindValue(':creatif', $data['creatif'], PDO::PARAM_INT);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);

    // Retourne true si la mise à jour a réussi, sinon false
    return $rs->execute();
}