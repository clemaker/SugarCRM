<?php
class AddNewPerso {

    private $title;
    private $modelPlayer;
    private $modification;
    private $notification;
    private $editPerso;
    private $editedPerso;
    private $newPerso;
    private $errorMessage;

    public function __construct() {
        $this->title = "Adding Character";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        $this->listType = $this->modelPlayer->getAllType();
        if ($this->listType === false) {
            $this->errorMessage = "Sorry, unable to get the list of ranks";
        }
        if (isset($_GET["id"])) {
            if (isset($_POST["name"])) {
                if (!isset($_POST["dispo"])) {
                    $_POST["dispo"] = 0;
                }
                if ($_POST["name"] != "" AND $_POST["type"] != "" AND $_FILES["file"] != "" AND $_POST["lvl"] != "" AND $_POST["pv"] != "" AND $_POST["pm"] != "" AND $_POST["atk"] != "" AND $_POST["def"] != "" AND $_POST["vit"] != "") {
                    $this->editedPerso = $this->modelPlayer->editedPerso($_POST["name"], $_POST["type"], $_FILES["file"], $_POST["lvl"], $_POST["pv"], $_POST["pm"], $_POST["atk"], $_POST["def"], $_POST["vit"], $_POST["dispo"], $_GET["id"]);
                    if ($this->editedPerso === true) {
                        $this->notification = "Your character has been edited";
                    }           
                    if ($this->editedPerso === false) {
                        $this->errorMessage = "Unable to edit your character";
                    }
                }
            }
            $this->editPerso = $this->modelPlayer->editPerso($_GET["id"]);
            $this->titre = "Edditing character";
            $this->name = $this->editPerso[0]["perso_name"];
            $this->type = $this->editPerso[0]["perso_type"];
            $this->pic = $this->editPerso[0]["perso_pic"];
            $this->lvl = $this->editPerso[0]["perso_lvl"];
            $this->pv = $this->editPerso[0]["perso_pv"];
            $this->pm = $this->editPerso[0]["perso_pm"];
            $this->atk = $this->editPerso[0]["perso_atk"];
            $this->def = $this->editPerso[0]["perso_def"];
            $this->vit = $this->editPerso[0]["perso_vit"];
            $this->add = "Edit that character";
            $this->id = $this->editPerso[0]["perso_id"];
            if ($this->editPerso[0]['perso_play'] == 1) {
                $this->checked = "checked";
            }
            else {
                $this->checked = "";
            }
            $this->editPerso = $this->modelPlayer->editPerso($_GET["id"]);
        }
        else {
            $this->titre = "Adding character";
            $this->name = "";
            $this->type = "";
            $this->pic = "";
            $this->lvl = "1";
            $this->pv = "100";
            $this->pm = "100";
            $this->atk = "";
            $this->def = "";
            $this->vit = "";
            $this->add = "Add that character";
            $this->id = "";
            $this->checked = "";
        if (isset($_POST["name"]) AND !isset($_GET["id"])) {
            if (!isset($_POST["dispo"])) {
                $_POST["dispo"] = 0;
            }
                if ($_POST["name"] != "" AND $_POST["type"] != "" AND $_FILES["file"] != "" AND $_POST["lvl"] != "" AND $_POST["pv"] != "" AND $_POST["pm"] != "" AND $_POST["atk"] != "" AND $_POST["def"] != "" AND $_POST["vit"] != "") {
                    $this->newPerso = $this->modelPlayer->addNewPerso($_POST["name"], $_POST["type"], $_FILES["file"], $_POST["lvl"], $_POST["pv"], $_POST["pm"], $_POST["atk"], $_POST["def"], $_POST["vit"], $_POST["dispo"]);
                    if ($this->newPerso === true) {
                        $this->notification = "Your character has been added";
                    }           
                    if ($this->newPerso === false) {
                        $this->errorMessage = "Unable to add your character";
                    }
                }
                else {
                    $this->errorMessage = "Please, be aware to fill up all areas";
                }
        }
    }
        include (__DIR__ . './../view/view_addperso.php');
    }
    
}
?>