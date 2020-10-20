<?php
class Attack {

    private $title;
    private $modelPlayer;
    

    public function __construct() {
        $this->title = "All Attack";
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage() {
        if (isset($_GET["id"])) {
            $this->deleteAttack = $this->modelPlayer->deleteAttack($_GET["id"]);
            }
        $this->listAttack = $this->modelPlayer->getMyAttack();
            if ($_SESSION["admin"] == 1) {
                $this->listAttack = $this->modelPlayer->getMyAttackAdmin();
            }
            if (count($this->listAttack) === 0) {
                $this->errorMessage = 'No attack yet';
            }
        include (__DIR__ . './../view/view_attack.php');
    }
    
}
?>