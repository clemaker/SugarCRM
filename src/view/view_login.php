<?php 
include ('header.php');
?>
<div class="center">
</br><h1> Connection </h1></br>
<form class="form" href="" method="post"></br>
    <div class="col">
        <label for="name"> Pseudo </label></br>
        <input type="text" name="pseudo" placeholder="Pseudo">
    </div></br>
    <div class="col">
        <label for="name"> Password </label></br>
        <input type="password" name="password" placeholder="Password">
    </div></br>
    <div class="col">
    <?php
        echo "<button class='btn btn-primary' type='submit'> $this->message </button>";
    ?>
    </div>
</form>
</div>
<?php
include ('footer.php');
?>