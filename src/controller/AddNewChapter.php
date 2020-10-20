<?php
class AddNewChapter {

    private $title;
    private $modelPlayer;
    private $modification;
    private $notification;
    private $editChapter;
    private $editedChapter;
    private $newChapter;
    private $errorMessage;

    public function __construct() {
        $this->title = "Adding Chapter";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            if (isset($_POST["name"])) {
                if (!isset($_POST["dispo"])) {
                    $_POST["dispo"] = 0;
                }
                if ($_POST["name"] != "" AND $_FILES["file"] != "" AND $_POST["desc"] != "") {
                    $this->editedChapter = $this->modelPlayer->editedChapter($_POST["name"], $_FILES["file"], $_POST["desc"], $_POST["dispo"], $_GET["id"]);
                    if ($this->editedChapter === true) {
                        $this->notification = "Your chapter has been edited";
                    }           
                    if ($this->editedChapter === false) {
                        $this->errorMessage = "Unable to edit your chapter";
                    }
                }
            }
            $this->editChapter = $this->modelPlayer->editChapter($_GET["id"]);
            $this->titre = "Edditing chapter";
            $this->name = $this->editChapter[0]["chapter_name"];
            $this->pic = $this->editChapter[0]["chapter_pic"];
            $this->desc = $this->editChapter[0]["chapter_desc"];
            $this->add = "Edit that chapter";
            $this->id = $this->editChapter[0]["chapter_id"];
            if ($this->editChapter[0]['chapter_dispo'] == 1) {
                $this->checked = "checked";
            }
            else {
                $this->checked = "";
            }
            $this->editChapter = $this->modelPlayer->editChapter($_GET["id"]);
        }
        else {
            $this->titre = "Adding chapter";
            $this->name = "";
            $this->pic = "";
            $this->desc = "";
            $this->add = "Add that chapter";
            $this->id = "";
            $this->checked = "";
        if (isset($_POST["name"]) AND !isset($_GET["id"])) {
            if (!isset($_POST["dispo"])) {
                $_POST["dispo"] = 0;
            }
                if ($_POST["name"] != "" AND $_FILES["file"] != "" AND $_POST["desc"] != "") {
                    $this->newChapter = $this->modelPlayer->addNewChapter($_POST["name"], $_FILES["file"], $_POST["desc"], $_POST["dispo"]);
                    if ($this->newChapter === true) {
                        $this->notification = "Your chapter has been added";
                    }           
                    if ($this->newChapter === false) {
                        $this->errorMessage = "Unable to add your chapter";
                    }
                }
                else {
                    $this->errorMessage = "Please, be aware to fill up all areas";
                }
        }
    }
        include (__DIR__ . './../view/view_addchapter.php');
    }
    
}
?>