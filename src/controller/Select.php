<?php
class Select {

    private $title;
    private $modelPlayer;
    private $notification;
    private $listCharacters;
    private $quest;

    public function __construct() {
        $this->title = "Select your Character";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        $this->listCharacters = $this->modelPlayer->getMyCharacters();
        $this->quest = $this->modelPlayer->getMyQuest($_GET["id"]);
        include (__DIR__ . './../view/view_select.php');
    }
    
}
?>