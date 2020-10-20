<?php 
include ('header.php');
?>
<div class="center"></br>
<?php
    echo "<h1>" . $this->titre . "</h1>";
    echo "<form class='form' href='?page=addquest&$this->id' method='post' enctype='multipart/form-data'></br>";
    echo '<div class="col">';
    echo    '<label for="name"> Chapter Name </label></br>';
    echo    "<input type='text' name='name' value='" . $this->name . "'>";
    echo '</div></br>';
    echo '<div class="col">';
    echo '<label for="name"> Chapter Picture </label></br>';
    echo '<input type="file" name="file"></br>';
    if (isset($_GET["id"])) {
    echo "</br><img src='src/public/images/Place/" . $this->pic . "' width='205px' height='275px'>&nbsp;";
    }
    echo '</div></br>';
    echo '<div class="col">';
    echo '<label for="name"> Description </label></br>';
    echo "<textarea name='desc' cols='100px' rows='5px'>" . $this->desc . "</textarea>";
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
    echo "<button class='btn btn-primary' type='submit'><i class='material-icons'>create_new_folder</i></br> $this->add </button>";
?>
    </div>
</form>
</div>
<?php
include ('footer.php');
?>