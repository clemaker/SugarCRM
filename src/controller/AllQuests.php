<?php
class AllQuests {

    private $title;
    private $modelPlayer;
    private $listQuests;
    private $deleteQuest;

    public function __construct() {
        $this->title = "All Quests";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            $this->deleteQuest = $this->modelPlayer->deleteQuest($_GET["id"]);
            }
        $this->listQuests = $this->modelPlayer->getMyQuests();
            if ($_SESSION["admin"] == 1) {
                $this->listQuests = $this->modelPlayer->getMyQuestsAdmin();
            }
            if (count($this->listQuests) === 0) {
                $this->errorMessage = 'No quests yet';
            }
        include (__DIR__ . './../view/view_allQuests.php');
    }
    
}
?>