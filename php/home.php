<?php
  require_once("utility/check_login.php");
  check_login();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../img/tit.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Benvenuto su OpenBlogs</title>
  </head>
  <body onload="users(); userposts()">
    <nav>
      <ul class="navbar comportamento"> 
        <li id="ho">
            <a href="../php/home.php" id="homebtn">Home</a>
        </li>
        <li>
          <form class="ricerca" role="search" onSubmit="return false">
            <input type="search" id="search" name="search" placeholder="&#128269; Inserisci elemento da cercare..." size="35" maxlength="50" aria-label="Search">
            <button id="searchbtn" type="button" onclick="searchAny()">Cerca</button>
          </form>
        </li>
        <li id="pr">
          <a href="../php/profile.php" id="profilebtn">Profilo</a>
        </li>
        <li id="lo">
          <a id="logoutbtn" onclick="logout()">Log out</a>
        </li>
      </ul>
    </nav>

    <div class="grid-container log-g">
      <div id="home" class="grid-item sx grid-log">
      </div>
      <div id="users" class="grid-item grid-log">
      </div>
    </div> 

  </body>
</html>
