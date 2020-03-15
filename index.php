<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('START_APP', microtime(true));
define('PATH_ROOT', __DIR__);

require_once PATH_ROOT.'/vendor/myApp/Main.php';
require_once PATH_ROOT.'/vendor/myApp/AutoLoad.php';

$app = new App();

$app->run();