<?php

//FRONT CONTROLLER

// общие ошибки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');


// установка соединения с бд

// вызов роутера
$router = new Router();
$router->run();

?>
