<?php

define('DB_NAME', "boutique");
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "troiswa");

// Le code ci-dessous permet de créer le chemin dans une constante
// pour faire "l'include" de mon header et footer dans mes views
$www= str_replace('/index.php', "", $_SERVER['SCRIPT_NAME']).'views/';
define('WWW', $www);