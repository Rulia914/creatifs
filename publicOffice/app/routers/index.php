<?php

// consigne : aside sur toutes les pages, donc on l'appelle ici dans le routeur principal
//include_once '../app/controllers/asideController.php';
//\App\Controllers\AsideController\renderAction($connexion);


//DETAIL PROJECT.show
//PATTERN : /projects/id/slug.html
//URL : ?projectId=show&id=x
//CTRL : projectsController
//ACTION : showAction
if (isset($_GET['projectId']) || isset($_GET['projects'])):
    include_once '../app/routers/projects.php';

//ROUTE PAR DEFAUT
//PATTERN : ?
//CTRL : ProjectsController
//ACTION : index

else :
include_once '../app/controllers/projectsController.php';
\App\Controllers\ProjectsController\indexAction($connexion);

endif;