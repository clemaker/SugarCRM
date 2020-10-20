<?php 
include ('header.php');
?>
<div class="center">
    </br><h1> The Sakura Cosmos </h1></br>
</div>
<?php
    foreach ($this->listWorld as $world) { 
        echo '<div class="photo">';
        echo "<h2> " . $world['world_name'] . "</h2></br>";
        echo "<img src='src/public/images/Worlds/" . $world['world_pic'] . "' width='220px' height='300px'></br>&nbsp;";
        echo "</br><textarea disabled class='desc' cols='80px' rows='6px'>" . $world['world_desc'] . "</textarea></br>";
        echo "</br><div class='position'><a href='?page=world&id=" . $world['world_id'] . "'><button class='btn btn-primary' type='submit'><i class='material-icons'>send</i></br> Visit </button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        if ($_SESSION["admin"] == 1) {
        echo "<a href='?page=addworld&id=" . $world['world_id'] . "'><button class='btn btn-success' type='submit'><i class='material-icons'>edit</i></br> Edit </button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='?page=world&id=" . $world['world_id'] . "'><button class='btn btn-danger' type='submit'><i class='material-icons'>delete</i></br> Delete </button></a></br></br></br>";
        }
        echo "</div>";
        echo "</div>";
    }
?>
<?php
include ('footer.php');
?>
