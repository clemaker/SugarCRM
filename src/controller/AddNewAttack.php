<?php
class AddNewAttack {

    private $title;
    private $model;
    private $listPerso;
    private $editedPerso;
    private $modelPlayer;

    public function __construct() {
        $this->title = "Adding Attack";
        $this->model = new Model();
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        $this->listPerso = $this->modelPlayer->getMyCharactersAdmin();
        if ($this->listPerso === false) {
            $this->errorMessage = "Sorry, unable to get the list of characters";
        }
        if (isset($_GET["id"])) {
            if (isset($_POST["name"])) {
                if (!isset($_POST["dispo"])) {
                    $_POST["dispo"] = 0;
                }
                if ($_POST["name"] != "" AND $_POST["perso"] != "" AND $_FILES["file"] != "" AND $_POST["pui"] != "" AND $_POST["cost"] != "") {
                    $this->editedAttack = $this->modelPlayer->editedAttack($_POST["name"], $_POST["perso"], $_FILES["file"], $_POST["pui"], $_POST["cost"], $_POST["dispo"], $_GET["id"]);
                    if ($this->editedAttack === true) {
                        $this->notification = "The attack has been edited";
                    }           
                    if ($this->editedAttack === false) {
                        $this->errorMessage = "Unable to edit the attack";
                    }
                }
            }
            $this->editAttack = $this->modelPlayer->editAttack($_GET["id"]);
            $this->titre = "Edditing attack";
            $this->name = $this->editAttack[0]["attack_name"];
            $this->perso = $this->editAttack[0]["perso_name"];
            $this->pic = $this->editAttack[0]["attack_img"];
            $this->pui = $this->editAttack[0]["attack_pui"];
            $this->cost = $this->editAttack[0]["attack_use"];
            $this->add = "Edit that attack";
            $this->id = $this->editAttack[0]["attack_id"];
            if ($this->editAttack[0]['attack_dispo'] == 1) {
                $this->checked = "checked";
            }
            else {
                $this->checked = "";
            }
            $this->editQuest = $this->modelPlayer->editAttack($_GET["id"]);
        }
        else {
            $this->titre = "Adding attack";
            $this->name = "";
            $this->perso = "";
            $this->pic = "";
            $this->pui = "";
            $this->cost = "";
            $this->add = "Add that attack";
            $this->id = "";
            $this->checked = "";
        if (isset($_POST["name"]) AND !isset($_GET["id"])) {
            if (!isset($_POST["dispo"])) {
                $_POST["dispo"] = 0;
            }
                if ($_POST["name"] != "" AND $_POST["perso"] != "" AND $_FILES["file"] != "" AND $_POST["pui"] != "" AND $_POST["cost"] != "") {
                    $this->newAttack = $this->modelPlayer->addNewAttack($_POST["name"], $_POST["perso"], $_FILES["file"],  $_POST["pui"], $_POST["cost"], $_POST["dispo"]);
                    if ($this->newAttack === true) {
                        $this->notification = "The attack has been added";
                    }           
                    if ($this->newAttack === false) {
                        $this->errorMessage = "Unable to add the attack";
                    }
                }
                else {
                    $this->errorMessage = "Please, be aware to fill up all areas";
                }
        }
    }
        include (__DIR__ . './../view/view_addattack.php');
    }
    
}
?>