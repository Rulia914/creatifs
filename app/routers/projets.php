<?php

use \App\Controllers\ProjetsController;

include_once '../app/controllers/projetsController.php';

switch ($_GET['projets']) {
    case 'show':
        ProjetsController\showAction($connexion, $_GET['id']);
        break;
    case 'delete':
        ProjetsController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        ProjetsController\indexAction($connexion);
        break;

}