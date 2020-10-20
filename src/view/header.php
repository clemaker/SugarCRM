<!DOCTYPE html>
<html lang="en">
<div itemscope itemtype="http://schema.org/VideoGame"></div>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $this->title ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="src/public/css/style.css" />
  <link rel="icon" type="image/png" href="src/public/images/logo.jpg">
</head>

<body class="p-3 mb-2 bg-dark text-white">
  <header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/edenszero/home"><img src="src/public/images/logo.jpg" width="40" height="40"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/edenszero/home" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;home</i><br>Home</a></br>
          </li>
          <?php
  if (isset($_SESSION["pseudo"])) {
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/chapters" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;folder</i><br>All Chapters</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/quests" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;list</i><br>All Quests</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/stats" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;group</i><br>All Characters</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/attack" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;whatshot</i><br>All Attacks</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/world" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;public</i><br>All Worlds</a></br>';
        echo  '</li>';
  }
  if (isset($_SESSION["admin"])) {
    if ($_SESSION["admin"] == 1) {
      echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/addchapter" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;create_new_folder</i><br>Add new Chapters</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/addquest" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;playlist_add</i><br>Add new Quests</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/addperso" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;person_add</i><br>Add new Characters</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/addattack" rel="nofollow"><i class="tiny material-icons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;whatshotadd</i><br>Add new Attack</a></br>';
        echo  '</li>';
        echo  '<li class="nav-item">';
        echo    '<a class="nav-link" href="/edenszero/addworld" rel="nofollow"><i class="material-icons">&nbsp;&nbsp;&nbsp;publicadd</i><br>Add World</a></br>';
        echo  '</li>';
    }
  }
?>
        </ul>
      </div>
    </nav>
  </header></br></br></br>
  <?php
if (!empty($this->errorMessage)) { 
  echo '<div class="alert alert-danger" role="alert">';
  echo $this->errorMessage;
  echo "</div>";
}
if (!empty($this->notification)) { 
  echo '<div class="alert alert-info" role="alert">';
  echo $this->notification;
  echo "</div>";
}
if (!isset($this->youStat)) {
  $_SESSION["fight"] = array();
}
if (isset($this->youStat)) {
  if (!empty($this->notification)) { 
    echo "<div class='lose'><img src='src/public/images/cross.png' width='80px' height='80px'></div>";
    echo "<div class='win'><img src='src/public/images/victory.png' width='80px' height='80px'></div>";
    echo "<a class='retry' href ='?page=quest&id=" . $this->quest[0]['quest_id'] . "&perso=" . $this->youStat[0]['perso_name'] . "'><button class='btn btn-danger'><i class='material-icons'>refresh</i></br> Retry ? </button type='submit'></a>&nbsp";
    echo "<a class='next' href ='?page=quests'><button class='btn btn-success'><i class='material-icons'>check</i></br> Next </button type='submit'></a>&nbsp";
  }
  if (!empty($this->errorMessage)) { 
    echo "<div class='win'><img src='src/public/images/cross.png' width='80px' height='80px'></div>";
    echo "<div class='lose'><img src='src/public/images/victory.png' width='80px' height='80px'></div>";
    echo "<a class='retry' href ='?page=quest&id=" . $this->quest[0]['quest_id'] . "&perso=" . $this->youStat[0]['perso_name'] . "'><button class='btn btn-danger'><i class='material-icons'>refresh</i></br> Retry ? </button type='submit'></a></br></br>";
    echo "<a class='next' href ='?page=quests'><button class='btn btn-primary'><i class='material-icons'>chevron_right</i></br> Go back to quests </button type='submit'></a>&nbsp";
  }
}
?>