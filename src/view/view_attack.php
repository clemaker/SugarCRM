<?php 
include ('header.php');
?>
<div class="center">
    </br><h1> All Attacks </h1></br>
</div>
<?php
    foreach ($this->listAttack as $attack) { 
        echo '<div class="photo">';
        echo "<h2> " . $attack['attack_name'] . "</h2></br>";
        echo "<img src='src/public/images/Attacks/" . $attack['attack_img'] . "' width='300px' height='300px' style='border: solid " . $attack['perso_color'] . " 5px;'></br></br>";
        echo "<p> User : " . $attack['perso_name'] . "</p>";
        echo "<p> Damage : " . $attack['attack_pui'] . "</p>";
        echo "<p> Cost : " . $attack['attack_use'] . "</p>";
        if ($_SESSION["admin"] == 1) {
        echo "<a href='?page=addattack&id=" . $attack['attack_id'] . "'><button class='btn btn-success' type='submit'><i class='material-icons'>edit</i></br> Edit </button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='?page=attack&id=" . $attack['attack_id'] . "'><button class='btn btn-danger' type='submit'><i class='material-icons'>delete</i></br> Delete </button></a></br></br>";
        }
        echo "</div>";
        echo "</div>";
    }
?>
</div>
<?php
include ('footer.php');
?>
