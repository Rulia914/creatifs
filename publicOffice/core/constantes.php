<?php

define('PUBLIC_BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/');
define('ADMIN_BASE_URL', str_replace('publicOffice', 'backOffice', PUBLIC_BASE_URL) );