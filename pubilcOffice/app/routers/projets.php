<?php

use \App\Controllers\ProjetsController;

include_once '../app/controllers/projetsController.php';

switch ($_GET['projetId']) {
    case 'show':
        ProjetsController\showAction($connexion, (int) $_GET['id']);
        break;
    default:
        ProjetsController\indexAction($connexion);
        break;

}