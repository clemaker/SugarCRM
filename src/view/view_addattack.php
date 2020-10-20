<?php 
include ('header.php');
?>
<div class="center"></br>
<?php
    echo "<h1>" . $this->titre . "</h1>";
    echo "<form class='form' href='?page=addattack&$this->id' method='post' enctype='multipart/form-data'></br>";
    echo '<div class="col">';
    echo    '<label for="name"> Attack Name </label></br>';
    echo    "<input type='text' name='name' value='" . $this->name . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo    '<label for="inputState"> For </label></br>';
    echo    "<select id='inputState' name='perso' value='" . $this->perso . "'>";
    echo        "<option selected>" . $this->perso . "</option>";
        for ($i = 0; $i < count($this->listPerso); $i++) { 
            echo '<option>' . $this->listPerso[$i]['perso_name'] . '</option>';
        }
?>
    </select>
    </div></br>
    <div class="col">
        <label for="name"> Attack Picture </label></br>
        <input type="file" name="file"></br>
<?php
    if (isset($_GET["id"])) {
    echo "</br><img src='src/public/images/Attacks/" . $this->pic . "' width='205px' height='275px'>&nbsp;";
    }
    echo '</div></br>';
    echo '<div class="col">';
    echo '<label for="name"> Puissance </label></br>';
    echo "<input type='text' name='pui' value='" . $this->pui . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo '<label for="name"> Cost </label></br>';
    echo "<input type='text' name='cost' value='" . $this->cost . "'>";
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
    echo "<button type='submit' class='btn btn-primary'><i class='material-icons'>whatshotadd</i></br> $this->add </button>";
?>
    </div>
</form>
</div>
<?php
include ('footer.php');
?>