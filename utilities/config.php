<?php

define('DB_NAME', "boutique");
define('BD_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "troiswa");

$www= str_replace('/index.php', "", $_SERVER['SCRIPT_NAME']).'views/';
define('WWW', $www);