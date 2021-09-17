<?php
session_start();
require ('src/controller/Home.php');
require ('src/model/Model.php');

$contents = file_get_contents(__DIR__ . '/config/env.json');
$obt = json_decode($contents);
define('ENV', $obt->env);

$page = $_SERVER['REDIRECT_URL'];

$road = array(
    "/sugarcrm/home" => Home::class,
    "/sugarcrm/login/([a-z]{1,8})" => Login::class,
);
    foreach ($road as $roadValue => $className) {
        if (preg_match("#^$roadValue$#", $page, $match)) {
            $controller = new $className;
            array_shift($match);
            $controller->manage(...$match);
        break;
        }
    }

    if (!isset($controller)) {
        // ERROR 404
        $controller = new Home;
        $controller->manage();
    };
?>