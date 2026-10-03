<?php

// Définition du namespace pour organiser le code
namespace App\Controllers\ProjectsController;

// Importation des classes nécessaires (Modèle et connexion PDO)
use \App\Models\ProjectsModel;
use \PDO;

function indexAction(PDO $connexion){
    // 1. On inclut le fichier du modèle pour accéder aux fonctions BDD
    include_once '../app/models/projectsModel.php';
    
    // 2. On récupère la liste de tous les projets depuis la base de données
    $projects = projectsModel\findAll($connexion);

    // 3. On déclare les variables globales pour transmettre les données au template principal
    GLOBAL $title, $content;
    $title = 'Accueil';

    // 4. On démarre la mise en mémoire tampon pour capturer le HTML de la vue
    ob_start();
    include '../app/views/projects/index.php';
    $content = ob_get_clean(); // On stocke le HTML généré dans $content
}


//Affiche les détails d'un projet spécifique
function showAction (PDO $connexion, int $id){
    // 1. On inclut le modèle
    include_once '../app/models/projectsModel.php';
    include_once '../app/models/tagsModel.php';
    
    // 2. On récupère les informations du projet correspondant à l'ID passé en paramètre
    $project = ProjectsModel\findOneById($connexion, $id); 
    $tags = \App\Models\TagsModel\findAllByProjectId($connexion, $id);

    // 3. On définit le titre de la page avec le nom du projet
    GLOBAL $title, $content, $asideProject, $asideProjectTags;
    $title = $project['titre'];    
    $asideProject = $project;
    $asideProjectTags = $tags;

    // 4. On capture le contenu HTML de la vue de détail
    ob_start();
    include '../app/views/projects/show.php';
    $content = ob_get_clean();
}

//Supprime un projet puis redirige l'utilisateur
function deleteAction(PDO $connexion, int $id){
    // 1. On demande au modèle de supprimer le projet avec cet ID
    ProjectsModel\deleteOneById($connexion, $id);
    // 2. On redirige l'utilisateur vers la page d'accueil du site
    header('Location: '. PUBLIC_BASE_URL);
}


// Affiche le formulaire pour ajouter un nouveau projet
function addFormAction(PDO $connexion){
    GLOBAL $project, $title, $content;

    // 1. On prépare une structure de projet vide pour charger le formulaire sans erreur
    $project = [
        'id'      => null,
        'titre'   => '',
        'texte'   => '',
        'image'   => '',
        'creatif' => null
    ];
    $title = "Ajout d'un projet";
    // 2. On charge le fichier du formulaire d'ajout
    ob_start();
    include '../app/views/projects/addForm.php';
    $content = ob_get_clean();
}

//Traite la soumission du formulaire et insère le nouveau projet en BDD
function addInsertAction(PDO $connexion){
    include_once '../app/models/projectsModel.php';

    // 1. Gestion de la photo de couverture : image par défaut si aucune image envoyée
    $imageName = 'default.jpg';
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        // On déplace le fichier téléversé depuis le dossier temporaire vers le dossier public 'images/'
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $imageName);
    }

    // 2. On rassemble les données envoyées par le formulaire ($_POST)
    $data = [
        'titre'   => $_POST['title'] ?? '',
        'texte'   => $_POST['text'] ?? '',
        'image'   => $imageName,
        'creatif' => (int) ($_POST['category_id'] ?? 1)
    ];

    // 3. On enregistre le projet en base de données et on récupère son ID
    $id = \App\Models\ProjectsModel\insertOne($connexion, $data);

    // 4. On génère une URL lisible (slug) et on redirige vers la page du projet créé
    $slug = \Core\Helpers\slugify($data['titre']);
    header('Location: ' . PUBLIC_BASE_URL . "projects/{$id}/{$slug}.html");
    exit(); // On stoppe l'exécution du script après la redirection
}

// Affiche le formulaire pré-rempli pour modifier un projet existant
function editFormAction(PDO $connexion, int $id) {
    include_once '../app/models/projectsModel.php';

    GLOBAL $project, $title, $content;

    // 1. On récupère les données du projet à modifier
    $project = ProjectsModel\findOneById($connexion, $id);

 
  
    $title = "Modification : " . $project['titre'];

    // 3. On réutilise le formulaire d'ajout en le pré-remplissant
    ob_start();
    include '../app/views/projects/addForm.php';
    $content = ob_get_clean();
}

//Traite la soumission du formulaire de modification
function editUpdateAction(PDO $connexion, int $id) {
    include_once '../app/models/projectsModel.php';

    // 1. On récupère les données actuelles du projet
    $project = ProjectsModel\findOneById($connexion, $id);
    
    // 2. On rassemble les données envoyées par le formulaire
    $data = [
        'titre'   => $_POST['title'],
        'texte'   => $_POST['text'],
        'image'   => $project['image'],
        'creatif' => (int) ($_POST['creatif'] ?? $project['creatif'])
    ];

    // 3. On conserve l'image actuelle si aucune nouvelle image n'est envoyée
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $imageName);
        $data['image'] = $imageName;
    }

    // 4. On met à jour le projet en base de données
    ProjectsModel\editOneById($connexion, $id, $data);

    // 5. On génère une URL lisible (slug) et on redirige vers le projet modifié
    $slug = \Core\Helpers\slugify($data['titre']);
    header('Location: ' . PUBLIC_BASE_URL . "projects/{$id}/{$slug}.html");
    exit(); // On stoppe l'exécution du script après la redirection
}