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
    <script>
      function cheP(){
          if($('#y').is(':checked')){
              $('#y').attr('value','on');
          } else {
              $('#y').attr('value','off');
          }
      }
    </script>
  </head>
  <body onload="users(); subThe('<?php echo $_GET['blogtitle'] ?>')">
    <nav>
      <ul class="navbar comportamento"> 
        <li id="ho">
            <a href="home.php" id="homebtn">Home</a>
        </li>
        <li>
          <form class="ricerca" role="search" onSubmit="return false">
            <input type="search" id="search" name="search" placeholder="&#128269; Inserisci elemento da cercare..." size="35" aria-label="Search">
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

    <div class="grid-container">
      <div id="newpost" class="grid-item sx">
      <form class="np" method="post">
          <input type="text" name="TitP" id="TitP" minlength="4" maxlength="30" placeholder="Titolo del post" size="45" required><br>
          <textarea name="testo" id="testo" rows="10" cols="90" minlength="50" placeholder="Inserisci qui il testo del tuo post!" required></textarea><br>
          <label for="subth">Seleziona un sottotema: 
            <select class="subth" name="subth" id="subth">

            </select>
          </label>
          <div class="prem" id="prem">
            Vuoi che sia un contenuto solo per gli utenti premium? Clicca qui: 
            <input type="checkbox" name="y" id="y" value="off" onclick="cheP()">
          </div>
          <div>Nel caso tu voglia aggiungere un'immagine al post, puoi farlo comodamente dopo!</div>
          <button type="button" id="recP" onclick="registerP('<?php echo $_GET['blogtitle'] ?>')">Pubblica il post!</button>
        </form>
        <div id="errNP"></div>
      </div>
      <div id="users" class="grid-item">
      </div>
    </div> 

  </body>
</html>
