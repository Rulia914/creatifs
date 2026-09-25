<?php

//DETAIL PROJET.show
//PATTERN : /projets/id/slug.html
//URL : ?projetId=x
//CTRL : projetsController
//ACTION : showAction
if (isset($_GET['projetId'])):
    include_once '../app/routers/projets.php';

//ROUTE PAR DEFAUT
//PATTERN : ?
//CTRL : ProjetsController
//ACTION : index

else :
include_once '../app/controllers/projetsController.php';
\App\Controllers\ProjetsController\indexAction($connexion);

endif;