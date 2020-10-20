<?php
class Quest {

    private $title;
    private $modelDegats;
    private $model;
    private $advStat;
    private $errorMessage;
    private $notification;
    private $advAttack;
    private $youAttack;
    private $progressBar;
    private $pvBar;
    private $quest;
    private $modelPlayer;

    public function __construct() {
        $this->title = "Quest";
        $this->model = new Model();
        $this->modelDegats = new ModelDegats();
        $this->modelPlayer = new ModelPlayer();
    }

    public function manage(...$id) {
        
        $this->quest = $this->modelPlayer->getMyQuest($_GET["id"]);
        $this->youStat = $this->modelDegats->getPerso($_GET["perso"]);
        $this->display = "";
        if (!isset($_GET["attack"])) {
            $_SESSION["fight"]["pvYou"] = $this->youStat[0]["perso_pv"];
            $_SESSION["fight"]["pmYou"] = $this->youStat[0]["perso_pm"];
            $_SESSION["fight"]["atkYou"] = $this->youStat[0]["perso_atk"];
            $_SESSION["fight"]["defYou"] = $this->youStat[0]["perso_def"];
            $_SESSION["fight"]["vitYou"] = $this->youStat[0]["perso_vit"];
        }
        if ($_GET["id"] == 1) {
            $oppName = "Jin";
            $this->advStat = $this->modelDegats->getPerso($oppName);
            $this->lvlAdv = 1;
            $this->fullPv = 200;
            if (!isset($_GET["attack"])) {
            $_SESSION["fight"]["pvAdv"] = 200;
            $_SESSION["fight"]["atkAdv"] = 50;
            $_SESSION["fight"]["defAdv"] = 50;
            $_SESSION["fight"]["vitAdv"] = 50;
            $_SESSION["fight"]["xpAdv"] = 50;
            }
        }
        if ($_GET["id"] == 2) {
            $oppName = "Jin";
            $this->advStat = $this->modelDegats->getPerso($oppName);
            $this->lvlAdv = 3;
            $this->fullPv = 210;
            if (!isset($_GET["attack"])) {
            $_SESSION["fight"]["pvAdv"] = 210;
            $_SESSION["fight"]["atkAdv"] = 55;
            $_SESSION["fight"]["defAdv"] = 55;
            $_SESSION["fight"]["vitAdv"] = 55;
            $_SESSION["fight"]["xpAdv"] = 55;
            }
        }
        if ($_GET[$id] == 9) {
            $oppName = "Drakken Joe";
            $this->advStat = $this->modelDegats->getPerso($oppName);
            $this->lvlAdv = 10;
            $this->fullPv = 350;
            if (!isset($_GET["attack"])) {
            $_SESSION["fight"]["pvAdv"] = 350;
            $_SESSION["fight"]["atkAdv"] = 100;
            $_SESSION["fight"]["defAdv"] = 100;
            $_SESSION["fight"]["vitAdv"] = 100;
            $_SESSION["fight"]["xpAdv"] = 200;
            }
        }
        if ($_GET["id"] == 10) {
            $oppName = "Mother";
            $this->advStat = $this->modelDegats->getPerso($oppName);
            $this->lvlAdv = 90;
            $this->fullPv = 800;
            if (!isset($_GET["attack"])) {
            $_SESSION["fight"]["pvAdv"] = 800;
            $_SESSION["fight"]["atkAdv"] = 300;
            $_SESSION["fight"]["defAdv"] = 300;
            $_SESSION["fight"]["vitAdv"] = 300;
            $_SESSION["fight"]["xpAdv"] = 1000;
            }
        }
        if (isset($_GET["attack"])) {
            $alea = rand (0, count($this->advStat) - 1);
            $puiAdv = $this->advStat[$alea]["attack_pui"];
            $this->textAdv = $this->advStat[$alea]["attack_name"];
            $this->advAttack = $this->advStat[$alea]["attack_img"];
            for ($i = 0; $i < count($this->youStat); $i++) {
                if ($this->youStat[$i]["attack_id"] == $_GET["attack"]) {
                    $this->textYou = $this->youStat[$i]["attack_name"];
                    $this->youAttack = $this->youStat[$i]["attack_img"];
                }
            }
            if ($_GET["attack"] == "overdrive") {
                $this->textYou = $this->youStat[$i]["attack_name"];
                $this->youAttack = $this->youStat[$i]["attack_img"];
            }
            $this->degats = $this->modelDegats->calculDegat($_SESSION["fight"]["pvYou"], $_SESSION["fight"]["pmYou"],
                                                            $_SESSION["fight"]["atkYou"], $_SESSION["fight"]["defYou"],
                                                            $_SESSION["fight"]["vitYou"], $this->lvlAdv, $this->fullPv,
                                                            $_SESSION["fight"]["pvAdv"], $_SESSION["fight"]["atkAdv"],
                                                            $_SESSION["fight"]["defAdv"], $_SESSION["fight"]["vitAdv"],
                                                            $_SESSION["fight"]["xpAdv"], $_GET["attack"],
                                                            $puiAdv, $_GET["perso"], $oppName);
            if ($this->degats === 0) {
                $this->errorMessage = "YOU LOSE";
                $_SESSION["fight"]["pvYou"] = 0;
            }
            if ($this->degats === 1) {
                $this->notification = "YOU WIN";
                $_SESSION["fight"]["pvAdv"] = 0;
            }
            if ($this->degats !== 2) {
                $this->degats = $this->fullPv;
                $this->display = "disabled";
            }
        }
        if ($_SESSION["fight"]["pvYou"] * 100 / $this->youStat[0]["perso_pv"] < 0.5*$this->youStat[0]["perso_pv"]) {
            $this->overdrive = true;
        }
        else {
            $this->overdrive = false;
        }
        if ($_GET["attack"] == "overdrive") {
            $this->imgOverdrive = true;
            $_SESSION["fight"]["pvYou"] = $this->youStat[0]["perso_pv"];
            $_SESSION["fight"]["pmYou"] = $this->youStat[0]["perso_pm"];
        }
        else {
            $this->imgOverdrive = false;
        }
        $this->progressBar = $this->modelDegats->progressBar($this->youStat[0]["perso_pv"], $_SESSION["fight"]["pvYou"]); 
        $this->progressBarAdv = $this->modelDegats->progressBar($this->fullPv, $_SESSION["fight"]["pvAdv"]);
        $this->pvBar = $_SESSION["fight"]["pvYou"] * 100 / $this->youStat[0]["perso_pv"];
        $this->pmBar = $_SESSION["fight"]["pmYou"] * 100 / $this->youStat[0]["perso_pm"];
        $this->xpBar = $this->youStat[0]["perso_xp"] * 100 / 1000;
        $this->advBar = $_SESSION["fight"]["pvAdv"] * 100 /  $this->fullPv;
        include (__DIR__ . './../view/view_quest.php');
    }
    
}
?>