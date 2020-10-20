<?php 
include ('header.php');
?>
<div class="center"></br>
<?php
    echo "<h1>" . $this->titre . "</h1>";
    echo "<form class='form' href='?page=addquest&$this->id' method='post' enctype='multipart/form-data'></br>";
    echo '<div class="col">';
    echo    '<label for="name"> Quest Name </label></br>';
    echo    "<input type='text' name='name' value='" . $this->name . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label> Quest Rank </label></br>';
    echo    "<select name='rank' value='" . $this->rank . "'>";
    echo        "<option selected>" . $this->rank . "</option>";
        for ($i = 0; $i < count($this->listRank); $i++) { 
            echo '<option>' . $this->listRank[$i]['rank_statut'] . '</option>';
        }
?>
    </select>
    </div></br>
    <div class="col">
        <label for="name"> Quest Picture </label></br>
        <input type="file" name="file"></br>
<?php
    if (isset($_GET["id"])) {
    echo "</br><img src='src/public/images/Place/" . $this->pic . "' width='205px' height='275px'>&nbsp;";
    }
    echo '</div></br>';
    echo '<div class="col">';
    echo '<label for="name"> Description </label></br>';
    echo "<input type='text' name='desc' value='" . $this->desc . "' style='width: 1000px;''>";
    echo '</div></br>';
    echo '<div class="col">';
    echo '<div class="form-check">';
    echo "<input " . $this->checked . " class='form-check-input' type='checkbox' name='dispo' value='1' id='gridCheck'>";
?>
            <label class="form-check-label" for="gridCheck">Available</label>
        </div>
    </div></br>
<?php
    echo '<div class="col">';
    echo "<button type='submit' class='btn btn-primary'><i class='material-icons'>playlist_add</i></br> $this->add </button>";
?>
    </div>
</form>
</div>
<?php
include ('footer.php');
?>