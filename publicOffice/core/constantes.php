<?php

define(
    'PUBLIC_BASE_URL',
    // Concatène : schéma (http/https) + hôte + dossier courant (public/) + slash final.
    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/'
);
