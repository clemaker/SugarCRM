<?php
class ErrorDisplay {

    public function __construct() {

    }

    public function logError (
        $errno,
        $errstr,
        $errfile,
        $errline
    ) {
        $error = "Date: " . date("d-m-Y") . "\n";
        $error .= "Type d'erreur: $errno\n";
        $error .= "Message d'erreur: $errstr\n";
        $error .= "Fichier: $errfile\n";
        $error .= "Line $errline\n";
        $log = $errno . $errstr . $errfile . $errline . "\n";
        file_put_contents("edenszero/log/" . date("d-m-Y") . ".log", $log, FILE_APPEND);
    }

}