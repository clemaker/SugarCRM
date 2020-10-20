<?php 
include ('header.php');
?>
<div class="center">
    </br><h1> All Chapters </h1></br>
</div>
<?php
    foreach ($this->listChapter as $chap) { 
        echo '<div class="photo">';
        echo "<h2> " . $chap['chapter_name'] . "</h2></br>";
        echo "<img src='src/public/images/Place/" . $chap['chapter_pic'] . "' width='220px' height='300px'></br>&nbsp;";
        echo "</br><textarea disabled class='desc' cols='80px' rows='6px'>" . $chap['chapter_desc'] . "</textarea></br>";
        echo "</br><div class='position'><a href='?page=chapter&id=" . $chap['chapter_id'] . "'><button class='btn btn-primary' type='submit'><i class='material-icons'>send</i></br> Start </button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        if ($_SESSION["admin"] == 1) {
        echo "<a href='?page=addchapter&id=" . $chap['chapter_id'] . "'><button class='btn btn-success' type='submit'><i class='material-icons'>edit</i></br> Edit </button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='?page=all&id=" . $chap['chapter_id'] . "'><button class='btn btn-danger' type='submit'><i class='material-icons'>delete</i></br> Delete </button></a></br></br></br>";
        }
        echo "</div>";
        echo "</div>";
    }
?>
<?php
include ('footer.php');
?>