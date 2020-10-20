<?php
class AddNewWorld {

    private $title;
    private $model;
    

    public function __construct() {
        $this->title = "World";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            if (isset($_POST["name"])) {
                if (!isset($_POST["dispo"])) {
                    $_POST["dispo"] = 0;
                }
                if ($_POST["name"] != "" AND $_FILES["file"] != "" AND $_POST["desc"] != "") {
                    $this->editedPlanet = $this->modelPlayer->editedPlanet($_POST["name"], $_FILES["file"], $_POST["desc"], $_POST["dispo"], $_GET["id"]);
                    if ($this->editedPlanet === true) {
                        $this->notification = "Your planet has been edited";
                    }           
                    if ($this->editedPlanet === false) {
                        $this->errorMessage = "Unable to edit your planet";
                    }
                }
            }
            $this->editPlanet = $this->modelPlayer->editPlanet($_GET["id"]);
            $this->titre = "Edditing planet";
            $this->name = $this->editPlanet[0]["world_name"];
            $this->pic = $this->editPlanet[0]["world_pic"];
            $this->desc = $this->editPlanet[0]["world_desc"];
            $this->add = "Edit that planet";
            $this->id = $this->editPlanet[0]["world_id"];
            if ($this->editPlanet[0]['world_dispo'] == 1) {
                $this->checked = "checked";
            }
            else {
                $this->checked = "";
            }
            $this->editPlanet = $this->modelPlayer->editPlanet($_GET["id"]);
        }
        else {
            $this->titre = "Adding planet";
            $this->name = "";
            $this->pic = "";
            $this->desc = "";
            $this->add = "Add that planet";
            $this->id = "";
            $this->checked = "";
        if (isset($_POST["name"]) AND !isset($_GET["id"])) {
            if (!isset($_POST["dispo"])) {
                $_POST["dispo"] = 0;
            }
                if ($_POST["name"] != "" AND $_FILES["file"] != "" AND $_POST["desc"] != "") {
                    $this->newPlanet = $this->modelPlayer->addNewPlanet($_POST["name"], $_FILES["file"], $_POST["desc"], $_POST["dispo"]);
                    if ($this->newPlanet === true) {
                        $this->notification = "Your planet has been added";
                    }           
                    if ($this->newPlanet === false) {
                        $this->errorMessage = "Unable to add your planet";
                    }
                }
                else {
                    $this->errorMessage = "Please, be aware to fill up all areas";
                }
        }
    }
        include (__DIR__ . './../view/view_addworld.php');
    }
    
}
?>