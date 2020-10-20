<?php
class World {

    private $title;
    private $modelPlayer;
    private $listWorld;

    public function __construct() {
        $this->title = "All Worlds";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            $this->deleteWorld = $this->modelPlayer->deleteWorld($_GET["id"]);
            }
            $this->listWorld = $this->modelPlayer->getMyWorlds();
                if ($_SESSION["admin"] == 1) {
                    $this->listWorld = $this->modelPlayer->getMyWorldsAdmin();
                }
                if (count($this->listWorld) === 0) {
                    $this->errorMessage = 'No world yet';
                }
        include (__DIR__ . './../view/view_world.php');
    }
    
}
?>