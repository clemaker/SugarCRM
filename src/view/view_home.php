<?php 
include ('header.php');
?>
<div class="center">
  </br><h1> Sugar CRM </h1></br>
  <div class="col">
    <form class="form" href="" method="post"></br>
      <div class="col">
        <label for="name"> Pseudo : melissa </label></br>
        <input type="text" name="pseudo" placeholder="Pseudo">
    </div></br>
    <div class="col">
        <label for="name"> Password : qVKbo6obKxDVbVvVfJ5EN5i529Lfkmf7W7MA</label></br>
        <input type="password" name="password" placeholder="Password">
    </div></br>
    <div class="col">
      <?php
        if (false === $this->connected) {
        echo "<button class='btn btn-primary' type='submit'> Login </button>";
        }
      ?>
    </div>
</form>
   </div>
<?php
  if (true === $this->connected) {
?>
  <form class="form" href="" method="post"></br>
    <div class="col">
        <input type="hidden" name="getList">
    </div></br>
    <div class="col">
        <button class='btn btn-primary' type='submit'> Get contact list that contains a as fristname or b as lastname </button>
    </div>
  </form>
  <form class="form" href="" method="post"></br>
    <div class="col">
        <input type="hidden" name="getTickets">
    </div></br>
    <div class="col">
        <button class='btn btn-primary' type='submit'> Get all open tickets for the first contact of the list </button>
    </div>
  </form>
  <form class="form" href="" method="post"></br>
    <div class="col">
        <input type="hidden" name="addTicket">
    </div></br>
    <div class="col">
        <button class='btn btn-primary' type='submit'> Add a ticket to this contact </button>
    </div>
 </form>
<?php
}
include ('footer.php');
?>