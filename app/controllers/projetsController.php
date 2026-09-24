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