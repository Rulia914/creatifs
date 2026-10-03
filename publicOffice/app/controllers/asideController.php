<?php
namespace App\Controllers\AsideController;

use \PDO;
use \App\Models\CreatifsModel;
use \App\Models\TagsModel;

function renderAction(PDO $connexion, ?array $project = null, array $tags = [])
{
    include_once '../app/models/creatifsModel.php';
    include_once '../app/models/tagsModel.php';

    GLOBAL $asideCreatifs, $asideTags;

    if ($project) {
        $asideCreatifs = [];
        $asideTags = $tags;
    } else {
        $asideCreatifs = CreatifsModel\findAll($connexion);
        $asideTags = TagsModel\findAll($connexion);
    }

    include '../app/views/partials/_aside.php';
}