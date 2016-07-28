<?php
//Front

//Вывод всех ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

require_once 'config/constants.php';
require_once (ROOT.'/components/Router.php');
require_once (ROOT.'/components/DB.php');
$router=new Router();
$router->run();