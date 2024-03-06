<?php
  session_start();
  if(isset($_SESSION['id'])){
    header("location: home.php");
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../img/tit.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <title>Accedi o iscriviti</title>
  </head>

  <body>
    <div class="grid-container">
      <div id="sign" class="grid-item">
        <div id="logo"><img src="../img/logo.png" alt="bloglogo"></div>
        <h1>Non sei iscritto? <br><a href="sign.php">Clicca qui</a> per registrarti e scrivere i tuoi blog!</h1>
      </div>
      <div id="log" class="grid-item">
        <h1>Altrimenti effettua il login</h1>
        <form class="login" id="login" method="post">
            <input type="text" name="username" id="username" placeholder="Username: "> <br>
            <input type="password" name="password" id="password" placeholder="Password: "> <br>
            <span class="error" id="logerr"></span>
            <button type="button" id="sub" name="sub" value="Accedi" onclick="checklog()" style="margin-left: 38.5%; margin-top: 5%; padding:2%; font-size:large">Accedi</button><br>
        </form>
      </div>
    </div>

    <div class="gallery">

    </div>
   
  </body>
</html>
