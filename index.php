<?php
session_start();
require ('src/controller/AddNewAttack.php');
require ('src/controller/AddNewChapter.php');
require ('src/controller/AddNewPerso.php');
require ('src/controller/AddNewQuest.php');
require ('src/controller/AddNewWorld.php');
require ('src/controller/AllChapters.php');
require ('src/controller/AllQuests.php');
require ('src/controller/Attack.php');
require ('src/controller/Chapter.php');
require ('src/controller/Home.php');
require ('src/controller/Login.php');
require ('src/controller/Quest.php');
require ('src/controller/Select.php');
require ('src/controller/Stats.php');
require ('src/controller/World.php');
require ('src/model/Model.php');
require ('src/model/ModelDegats.php');
require ('src/model/ModelPlayer.php');
require ('src/controller/ErrorDisplay.php');

$contents = file_get_contents(__DIR__ . '/config/env.json');
$obt = json_decode($contents);
define('ENV', $obt->env);

// $page = filter_input(INPUT_GET, "page");
$page = $_SERVER['REDIRECT_URL'];

$road = array(
    "/edenszero/addattack" => AddNewAttack::class,
    "/edenszero/addchapter" => AddNewChapter::class,
    "/edenszero/addperso" => AddNewPerso::class,
    "/edenszero/addquest" => AddNewQuest::class,
    "/edenszero/addworld" => AddNewWorld::class,
    "/edenszero/chapters" => AllChapters::class,
    "/edenszero/attack" => Attack::class,
    "/edenszero/quests" => AllQuests::class,
    "/edenszero/chapter" => Chapter::class,
    "/edenszero/home" => Home::class,
    "/edenszero/login/([a-z]{1,8})" => Login::class,
    "/edenszero/quests/[0-9]{1,3}/[aA-zZ]{1,20}/quest" => Quest::class,
    "/edenszero/quests/([0-9]{1,3})/select" => Select::class,
    "/edenszero/stats" => Stats::class,
    "/edenszero/world" => World::class
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