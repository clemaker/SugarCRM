<?php 
include ('header.php');
?>
<div class="center">
    </br><h1> All Characters </h1></br>
    <div>
        <a href="?page=stats&all"><button class="btn btn-success" type="submit"> All Characters </button></a>&nbsp;&nbsp;
        <a href="?page=stats&lvl"><button class="btn btn-primary" type="submit"> Highest Level </button></a>&nbsp;&nbsp;
        <a href="?page=stats&pv"><button class="btn btn-danger" type="submit"> Highest PV </button></a>&nbsp;&nbsp;
        <a href="?page=stats&pm"><button class="btn btn-secondary" type="submit"> Highest PM </button></a>&nbsp;&nbsp;
        <a href="?page=stats&atk"><button class="btn btn-info" type="submit"> ATK </button></a>&nbsp;&nbsp;
        <a href="?page=stats&def"><button class="btn btn-info" type="submit"> DEF </button></a>&nbsp;&nbsp;
        <a href="?page=stats&vit"><button class="btn btn-info" type="submit"> VIT </button></a></br></br>
    </div>
</div>
<?php
    foreach ($this->listCharacters as $perso) { 
        echo '<div class="photo">';
        echo "<h2> " . $perso['perso_name'] . "&nbsp;&nbsp;<img src='src/public/images/" . $perso['perso_typepic'] . "' width='60px' height='60px'></h2>";
        echo "<img src='src/public/images/Characters/" . $perso['perso_pic'] . "' width='230px' height='305px' style='border: solid " . $perso['perso_color'] . " 5px;'>";
        echo "<div class='descPerso' style='border: solid " . $perso['perso_color'] . " 5px;'>";
        ?>
        <div itemscope itemtype="http://schema.org/VideoGame">
            <div itemprop="characterAttribute">
        <?php
        echo "<h5> LEVEL " . $perso['perso_lvl'] . "</h5>";
        echo "<h6> PV : " . $perso['perso_pv'] . "</h6>";
        echo "<h6> MP : " . $perso['perso_pm'] . "</h6>";
        echo "<h6> ATK : " . $perso['perso_atk'] . "</h6>";
        echo "<h6> DEF : " . $perso['perso_def'] . "</h6>";
        echo "<h6> VIT : " . $perso['perso_vit'] . "</h6>";
        echo "<h6> NEXT LEVEL : " . $perso['perso_xp'] . " / 1000 </h6>";
        echo '</div>';
        ?>
            </div>
        </div>
        <?php
        echo '<div class="positionPerso">';
        if ($_SESSION["admin"] == 1) {
            echo "<a href='?page=addperso&id=" . $perso['perso_id'] . "'><button class='btn btn-success' type='submit'><i class='material-icons'>edit</i></br> Edit </button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href='?page=stats&id=" . $perso['perso_id'] . "'><button class='btn btn-danger' type='submit'><i class='material-icons'>delete</i></br> Delete </button></a>";
            }
        echo '</div>';
        echo '</div></br>';
    }
?>
<?php
include ('footer.php');
?>