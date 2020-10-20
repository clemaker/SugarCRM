<?php
class AddNewQuest {

    private $title;
    private $modelPlayer;
    private $listRank;
    private $modification;
    private $notification;
    private $editQuest;
    private $newQuest;
    

    public function __construct() {
        $this->title = "Adding Quest";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        $this->listRank = $this->modelPlayer->getAllRank();
        if ($this->listRank === false) {
            $this->errorMessage = "Sorry, unable to get the list of ranks";
        }
        if (isset($_GET["id"])) {
            if (isset($_POST["name"])) {
                if (!isset($_POST["dispo"])) {
                    $_POST["dispo"] = 0;
                }
                if ($_POST["name"] != "" AND $_POST["rank"] != "" AND $_FILES["file"] != "" AND $_POST["desc"] != "") {
                    $this->editedQuest = $this->modelPlayer->editedQuest($_POST["name"], $_POST["rank"], $_FILES["file"], $_POST["desc"], $_POST["dispo"], $_GET["id"]);
                    if ($this->editedQuest === true) {
                        $this->notification = "Your quest has been edited";
                    }           
                    if ($this->editedQuest === false) {
                        $this->errorMessage = "Unable to edit your quest";
                    }
                }
            }
            $this->editQuest = $this->modelPlayer->editQuest($_GET["id"]);
            $this->titre = "Edditing quest";
            $this->name = $this->editQuest[0]["quest_name"];
            $this->rank = $this->editQuest[0]["quest_rank"];
            $this->pic = $this->editQuest[0]["quest_pic"];
            $this->desc = $this->editQuest[0]["quest_desc"];
            $this->add = "Edit that quest";
            $this->id = $this->editQuest[0]["quest_id"];
            if ($this->editQuest[0]['quest_dispo'] == 1) {
                $this->checked = "checked";
            }
            else {
                $this->checked = "";
            }
            $this->editQuest = $this->modelPlayer->editQuest($_GET["id"]);
        }
        else {
            $this->titre = "Adding quest";
            $this->name = "";
            $this->rank = "";
            $this->pic = "";
            $this->desc = "";
            $this->add = "Add that quest";
            $this->id = "";
            $this->checked = "";
        if (isset($_POST["name"]) AND !isset($_GET["id"])) {
            if (!isset($_POST["dispo"])) {
                $_POST["dispo"] = 0;
            }
                if ($_POST["name"] != "" AND $_POST["rank"] != "" AND $_FILES["file"] != "" AND $_POST["desc"] != "") {
                    $this->newQuest = $this->modelPlayer->addNewQuest($_POST["name"], $_POST["rank"], $_FILES["file"], $_POST["desc"], $_POST["dispo"]);
                    if ($this->newQuest === true) {
                        $this->notification = "Your quest has been added";
                    }           
                    if ($this->newQuest === false) {
                        $this->errorMessage = "Unable to add your quest";
                    }
                }
                else {
                    $this->errorMessage = "Please, be aware to fill up all areas";
                }
        }
    }
        include (__DIR__ . './../view/view_addquest.php');
    }
    
}
?>