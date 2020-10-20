<?php 
include ('header.php');
?>
<div class="center">
    </br><h1> Select your Characters </h1></br>
</div>
<?php
foreach ($this->listCharacters as $perso) { 
    echo "<h2> " . $perso['perso_name'] . "&nbsp;&nbsp;<img src='src/public/images/" . $perso['perso_typepic'] . "' width='60px' height='60px' ></h2>";
    echo "<a href='edenszero/quests/" . $this->quest[0]['quest_id'] . "/" . $perso['perso_name'] . "/quest' class='posselect'><img src='src/public/images/Characters/" . $perso['perso_pic'] . "' width='230px' height='305px' style='margin: 10px; border: solid " . $perso['perso_color'] . " 5px;'></a>";
}
?>
<?php
include ('footer.php');
?>