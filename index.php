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

function logError (
    $errno,
    $errstr,
    $errfile,
    $errline
)
{
    $log = $errno . $errstr . $errfile . $errline . "\n";
    file_put_contents(__DIR__ . "/../../log/" . date("d-m-Y") . ".log", $log, FILE_APPEND);
}
    set_error_handler("logError");

    register_shutdown_function(function() {
        $error = error_get_last();
        if ($error) {
            logError($error['type'], $error['message'], $error['file'], $error['line']);
        }
    });

?>