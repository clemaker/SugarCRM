<?php
class Stats {

    private $title;
    private $model;
    private $listCharacters;
    private $modelPlayer;
    private $deletePerso;    
    private $type;

    public function __construct() {
        $this->title = "Stats";
        $this->model = new Model();
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            $this->deletePerso = $this->modelPlayer->deletePerso($_GET["id"]);
        }
        $this->listCharacters = $this->modelPlayer->getMyCharacters();
        if (isset($_GET["all"])) {
            $this->listCharacters = $this->model->getAll();
        }
        elseif (isset($_GET["pv"])) {
            $this->listCharacters = $this->model->getPv();
        }
        elseif (isset($_GET["pm"])) {
            $this->listCharacters = $this->model->getPm();
        }
        elseif (isset($_GET["atk"])) {
            $this->listCharacters = $this->model->getAtk();
        }
        elseif (isset($_GET["def"])) {
            $this->listCharacters = $this->model->getDef();
        }
        elseif (isset($_GET["vit"])) {
            $this->listCharacters = $this->model->getVit();
        }
        if ($_SESSION["admin"] == 1) {
            $this->listCharacters = $this->modelPlayer->getMyCharactersAdmin();
            if (isset($_GET["all"])) {
                $this->listCharacters = $this->model->getAllAdmin();
            }
            elseif (isset($_GET["pv"])) {
                $this->listCharacters = $this->model->getPvAdmin();
            }
            elseif (isset($_GET["pm"])) {
                $this->listCharacters = $this->model->getPmAdmin();
            }
            elseif (isset($_GET["atk"])) {
                $this->listCharacters = $this->model->getAtkAdmin();
            }
            elseif (isset($_GET["def"])) {
                $this->listCharacters = $this->model->getDefAdmin();
            }
            elseif (isset($_GET["vit"])) {
                $this->listCharacters = $this->model->getVitAdmin();
            }
        }
        
        if (count($this->listCharacters) === 0) {
            $this->errorMessage = 'No characters yet';
        }
        include (__DIR__ . './../view/view_stats.php');
    }
    
}
?>