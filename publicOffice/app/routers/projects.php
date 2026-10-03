<?php

use App\Controllers\ProjectsController;
// Inclusion du fichier du contrôleur de projets
include_once '../app/controllers/projectsController.php';

// Détermination de l'action à exécuter à partir de l'URL ($_GET)
// Si aucune action n'est spécifiée, 'index' sera l'action par défaut
$action = $_GET['projectId'] ?? $_GET['projects'] ?? 'index';

// Redirection vers la bonne fonction du contrôleur selon l'action demandée
switch ($action) {
    // Affiche la page de détail d'un projet
    case 'show':
        ProjectsController\showAction($connexion, (int) $_GET['id']);
        break;
    // Supprime un projet précis
    case 'delete':
        ProjectsController\deleteAction($connexion, (int) $_GET['id']);
        break;
    // Affiche le formulaire pour ajouter un nouveau projet
    case 'addForm':
        ProjectsController\addFormAction($connexion);
        break;
    // Traite et enregistre les données du formulaire d'ajout
    case 'addInsert':
        ProjectsController\addInsertAction($connexion);
        break;
    // Affiche le formulaire pré-rempli pour modifier un projet existant
    case 'editForm':
        \App\Controllers\ProjectsController\editFormAction($connexion, (int) $_GET['id']);
        break;
    // Traite et enregistre les modifications d'un projet existant
    case 'editUpdate':
        \App\Controllers\ProjectsController\editUpdateAction($connexion, (int) $_GET['id']);
        break;
    // Action par défaut : affiche la liste complète des projets
    default:
        ProjectsController\indexAction($connexion);
        break;
}