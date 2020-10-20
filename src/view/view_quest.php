<?php 
include ('header.php');
if (isset($this->advAttack) OR isset($this->youAttack)) {
    echo '<div class ="myatk">';
    echo "<img src='src/public/images/Attacks/" . $this->youAttack . "' width='300px' height='300px' style='border: solid " . $this->youStat[0]['perso_color'] . " 5px;'></div>";
    echo '<div class ="advatk">';
    echo "<img src='src/public/images/Attacks/" . $this->advAttack . "' width='300px' height='300px' style='border: solid " . $this->advStat[0]['perso_color'] . " 5px;'></div></br></br>";
    echo '<div class="text">';
    echo $this->youStat[0]['perso_name'] . " uses : " . $this->textYou . "</br></br>";
    echo $this->advStat[0]['perso_name'] . " uses : " . $this->textAdv . "<div>";
}
?>
<div class="you">
<?php
    echo "</br><div> " . $this->youStat[0]['perso_name'] . "&nbsp;&nbsp;&nbsp; LEVEL " . $this->youStat[0]['perso_lvl'] . "</br></br>";
    echo $_SESSION["fight"]["pvYou"] . " / " . $this->youStat[0]['perso_pv'] . "</div>";
    echo '<div class="progress progressp">';
    echo "<div class='progress-bar bg-$this->progressBar' role='progressbar' style='width:" . $this->pvBar . "%;' aria-valuenow='" . $_SESSION["fight"]["pvYou"] . "' aria-valuemin='0' aria-valuemax='" . $this->youStat[0]['perso_pv'] . "'></div>";
    echo "</div></br>";
    echo $_SESSION["fight"]["pmYou"] . " / " . $this->youStat[0]['perso_pm'] . "</br>";
    echo '<div class="progress progressp">';
    echo "<div class='progress-bar bg-primary' role='progressbar' style='width:" . $this->pmBar . "%;' aria-valuenow='" . $_SESSION["fight"]["pmYou"] . "' aria-valuemin='0' aria-valuemax='" . $this->youStat[0]['perso_pm'] . "'></div>";
    echo "</div></br>";
    echo '<div class="progress progressxp">';
    echo "<div class='progress-bar bg-light' role='progressbar' style='width:" . $this->xpBar . "%;' aria-valuenow='" . $this->youStat[0]['perso_xp'] . "' aria-valuemin='0' aria-valuemax='1000'></div>";
    echo "</div></br>";
    if ($this->imgOverdrive == true AND $this->youStat[0]['perso_overdrivedispo'] == 1) {
        echo "<img src='src/public/images/Characters/" . $this->youStat[0]['perso_overdrive'] . "' width='180px' height='180px' style='border: solid " . $this->youStat[0]['perso_color'] . " 5px;'></br></br>";
    }
    else {
        echo "<img src='src/public/images/Characters/" . $this->youStat[0]['perso_pic'] . "' width='180px' height='180px' style='border: solid " . $this->youStat[0]['perso_color'] . " 5px;'></br></br>";
    }
    for ($i = 0; $i < count($this->youStat); $i++) {
        if ($this->youStat[$i]["attack_dispo"] == 1) {
            echo "<a href ='?page=quest&id=" . $this->quest[0]['quest_id'] . "&attack=" . $this->youStat[$i]["attack_id"] . "&perso=" . $this->youStat[0]['perso_name'] . "&cost=" . $this->youStat[$i]['attack_use'] . "'><button $this->display class='btn btn-primary' type='submit'>" . $this->youStat[$i]["attack_name"] . "</button></a></br></br>";
        }
    }
    if ($this->overdrive == true AND $this->youStat[0]['perso_overdrivedispo'] == 1) {
        echo "<a href ='?page=quest&id=" . $this->quest[0]['quest_id'] . "&attack=overdrive&perso=" . $this->youStat[0]['perso_name'] . "'><button class='btn btn-danger' type='submit'>Overdrive</button></a></br></br>";
    }    
?>
</div>
<div class="adv">
<?php
    echo "</br><div> " . $this->advStat[0]['perso_name'] . "&nbsp;&nbsp;&nbsp; LEVEL " . $this->lvlAdv . "</br></br>";
    echo $_SESSION["fight"]["pvAdv"] . " / " . $this->fullPv . "</div>";
    echo '<div class="progress progressp">';
    echo "<div class='progress-bar bg-$this->progressBarAdv' role='progressbar' style='width:" . $this->advBar . "%;' aria-valuenow='" . $_SESSION["fight"]["pvAdv"] . "' aria-valuemin='0' aria-valuemax='" . $this->fullPv . "'></div>";
    echo "</div></br>";
    echo "<img src='src/public/images/Characters/" . $this->advStat[0]['perso_pic'] . "' width='180px' height='180px' style='border: solid " . $this->advStat[0]['perso_color'] . " 5px;'></br></br>";
?>
</div>
<?php
include ('footer.php');
?>