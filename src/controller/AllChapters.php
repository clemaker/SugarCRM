<?php
class AllChapters {

    private $title;
    private $modelPlayer;
    private $listChapter;
    private $deleteChapter;
    
    public function __construct() {
        $this->title = "All Chapters";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        if (isset($_GET["id"])) {
        $this->deleteChapter = $this->modelPlayer->deleteChapter($_GET["id"]);
        }
        $this->listChapter = $this->modelPlayer->getMyChapters();
            if ($_SESSION["admin"] == 1) {
                $this->listChapter = $this->modelPlayer->getMyChaptersAdmin();
            }
            if (count($this->listChapter) === 0) {
                $this->errorMessage = 'No chapter yet';
            }
        include (__DIR__ . './../view/view_allChapters.php');
    }
    
}
?>