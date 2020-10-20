<?php 
include ('header.php');
?>
 <div itemscope itemtype="http://schema.org/VideoGame">
    <div itemprop="quest">
        <div class="center">
            </br><h1> All Quests </h1></br>
        </div>
<?php
    foreach ($this->listQuests as $quests) { 
        echo '<div class="photo">';
        echo "<h2 class='rang badge badge-warning'> " . $quests['quest_rank'] . "</h2></br>";
        echo "<h2> " . $quests['quest_name'] . "</h2></br>";
        echo "<img src='src/public/images/Place/" . $quests['quest_pic'] . "' width='220px' height='300px'></br>&nbsp;";
        echo "</br><textarea disabled class='desc' cols='80px' rows='6px'>" . $quests['quest_desc'] . "</textarea></br>";
        echo "</br><div class='position'><a href='/edenszero/quests/" . $quests['quest_id'] . "/" ."select'><button class='btn btn-primary' type='submit'><i class='material-icons'>send</i></br> Start </button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        if ($_SESSION["admin"] == 1) {
        echo "<a href='?page=addquest&id=" . $quests['quest_id'] . "'><button class='btn btn-success' type='submit'><i class='material-icons'>create</i></br>Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='?page=quests&id=" . $quests['quest_id'] . "'><button class='btn btn-danger' type='submit'><i class='material-icons'>delete</i></br> Delete </button></a></br></br>";
        }
        echo "</div>";
        echo "</div>";
    }
?>
</div>
    </div>
</div>
<?php
include ('footer.php');
?>