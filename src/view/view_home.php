<?php 
include ('header.php');
?>
<div class="center">
</br><h1> EDENS ZERO - BETA - </h1></br>
    <div class="col">
<?php
if (!empty($this->messageLogout)) { 
    echo "<a href='?page=home&logout'><button class='btn btn-primary' type='submit'><i class='material-icons'>power_settings_new</i></br> $this->messageLogout </button></a>";
  }
if (!empty($this->messageLogin) AND !empty($this->messageCreate)) { 
    echo "<a href='/edenszero/login/log'><button class='btn btn-primary' type='submit'><i class='material-icons'>account_circle</i></br> $this->messageLogin </button></a>&nbsp;&nbsp;";
    echo "<a href='/edenszero/login/add'><button class='btn btn-primary' type='submit'><i class='material-icons'>add_circle</i></br> $this->messageCreate </button></a>";
  }
?>
   </div>
<?php
include ('footer.php');
?>