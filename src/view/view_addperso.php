<?php 
include ('header.php');
?>
<div class="center"></br>
<?php
    echo "<h1>" . $this->titre . "</h1>";
    echo "<form class='form' href='?page=addperso&$this->id' method='post' enctype='multipart/form-data'></br>";
    echo '<div class="col">';
    echo    '<label for="name"> Character Name </label></br>';
    echo    "<input type='text' name='name' value='" . $this->name . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label> Character Type </label></br>';
    echo    "<select name='type' value='" . $this->type . "'>";
    echo        "<option selected>" . $this->type . "</option>";
        for ($i = 0; $i < count($this->listType); $i++) { 
            echo '<option>' . $this->listType[$i]['type_name'] . '</option>';
        }
    echo '</select>';
    echo '</div></br>';
    echo '<div class="col">';
    echo '<label for="name"> Character Picture </label></br>';
    echo '<input type="file" name="file"></br>';
    if (isset($_GET["id"])) {
    echo "</br><img src='src/public/images/Characters/" . $this->pic . "' width='205px' height='275px'>&nbsp;";
    }
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="name"> Character LEVEL </label></br>';
    echo    "<input type='text' name='lvl' value='" . $this->lvl . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="name"> Character PV </label></br>';
    echo    "<input type='text' name='pv' value='" . $this->pv . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="name"> Character PM </label></br>';
    echo    "<input type='text' name='pm' value='" . $this->pm . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="name"> Character ATK </label></br>';
    echo    "<input type='text' name='atk' value='" . $this->atk. "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="name"> Character DEF </label></br>';
    echo    "<input type='text' name='def' value='" . $this->def . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="name"> Character VIT </label></br>';
    echo    "<input type='text' name='vit' value='" . $this->vit . "'>";
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
    echo "<button class='btn btn-primary' type='submit'><i class='material-icons'>person_add</i></br> $this->add </button>";
?>
    </div>
</form>
</div>
<?php
include ('footer.php');
?>