<?php

namespace App\Controllers\ProjetsController;

use \App\Models\ProjetsModel;
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

function deleteAction(PDO $connexion, int $id){
    
    ProjetsModel\deleteOneById($connexion, $id);
    header('Location: '. PUBLIC_BASE_URL);
}

