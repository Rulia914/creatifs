<?php

namespace App\Controllers\projetsController;

use \App\Models\projetsModel;
use \PDO;

function indexAction(PDO $connexion){

include_once '../app/models/projetsModel.php';
$projets = projetsModel\findAll($connexion);

global $title, $content;
$title = 'Accueil';

ob_start();
include '../app/views/projets/index.php';
$content = ob_get_clean();
}

function showAction (PDO $connexion, int $id){
    include_once '../app/models/projetsModel.php';
    $projet = ProjetsModel\findOneById($connexion, $id); 

    //include_once '../app/models/creatifsModel.php';
    //$creatif = \App\Models\CreatifsModel\findOneById($connexion, $projet['id']); 

    global $title, $content;
    $title = $projet['titre'];    

    ob_start();
    include '../app/views/projets/show.php';
    $content = ob_get_clean();
    }

