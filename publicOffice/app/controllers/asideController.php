<?php
namespace App\Controllers\AsideController;

use \PDO;
use \App\Models\CreatifsModel;
use \App\Models\TagsModel;

function renderAction(PDO $connexion, ?array $project = null, array $tags = [])
{
    // Inclusion des modèles nécessaires pour récupérer les créatifs et les tags
    include_once '../app/models/creatifsModel.php';
    include_once '../app/models/tagsModel.php';

    GLOBAL $asideCreatifs, $asideTags;
// Si un projet est fourni, on utilise les tags associés à ce projet, sinon on récupère tous les créatifs et tous les tags
    if ($project) {
        $asideCreatifs = [];
        $asideTags = $tags;
    } else {
        $asideCreatifs = CreatifsModel\findAll($connexion);
        $asideTags = TagsModel\findAll($connexion);
    }

    include '../app/views/partials/_aside.php';
}