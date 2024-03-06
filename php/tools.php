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
  <body onload="users(); bioC(); upP()">
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
      <div id="tools" class="grid-item sx">
        Inserisci i dati personali che vuoi modificare:
        <form id="change">
          <input type="text" size="40" id="usrn" maxlength="18" placeholder=" Nuovo username:"><br>
          <input type="password" size="40" id="old" maxlength="16" placeholder=" Password attuale:"><br>
          <input type="password" size="40" id="new" maxlength="16" placeholder=" Nuova password:"><br>
          <input type="password" size="40" id="newc" maxlength="16" placeholder=" Conferma nuova password"><br>
          <button type="button" onclick="change()" id="cambia">Cambia</button><span class="erro" id="errC" style="font-size: small"></span>
        </form>

        Qui puoi inserire o modificare la tua biografia,<br> caricare una tua immagine del profilo o rimuoverla:
        <form id="biogr" method="POST" action="../php/utility/biogr.php" enctype="multipart/form-data">
          <textarea name="biog" class="count" id="biog" cols="30" rows="9" maxlength="250" onkeyup="counter()" placeholder="Scrivi qualcosa su di te:"></textarea><span class="cd" id="cd" style="font-size: small">250/250</span><br>
          <input type="submit" id="invio">
          <span id="container">
            <span id="btn-cont">
              <label for="carica" class="button">Scegli foto da caricare</label>
              <input type="file" name="carica" id="carica" style="display:none">
            </span>
          </span>
          <button type="button" id="rimuovi" onclick="def()">Elimina la tua immagine profilo</button><span id="errL" class="erro" style="font-size: small"></span><br>
          <div style="font-size:small">ATTENZIONE: la foto profilo deve essere in formato .jpg, .gif, .png o .jpeg e non deve superare 1MB!</div>
        </form>
        
        <form class="premium" method="POST">
          <p style="font-size:large">Vuoi essere un utente premium? Spunta qui e aggiungi la tua carta di credito.<input type="checkbox" name="premium" id="premium"><br></p>         
          <input type="text" class="pcard" name="credit_card" id="credit_card" placeholder=" Carta di credito: (16 cifre)" maxlength="16"size="25">
          <input type="text" class="pcard" name="cvc" id="cvc" placeholder="CVC: (3 cifre)" maxlength="3"size="10"><br>
          <label for="expire" class="pcard">Data di scadenza: </label>
          <select class="pcard" name="month" id="month" style="font-family:'Unbounded', cursive; margin: 10px 0px; padding: 8px 0px; border-radius: 10%;">
            <option value="january">Gen</option>
            <option value="february">Feb</option>
            <option value="march">Mar</option>
            <option value="april">Apr</option>
            <option value="may">Mag</option>
            <option value="june">Giu</option>
            <option value="july">Lug</option>
            <option value="august">Ago</option>
            <option value="september">Set</option>
            <option value="october">Ott</option>
            <option value="november">Nov</option>
            <option value="december">Dic</option>
          </select>
          <select class="pcard" name="year" id="year" style="font-family:'Unbounded', cursive; margin: 10px 0px; padding: 8px 0px; border-radius: 10%;">
            <option value="2023">23</option>
            <option value="2024">24</option>
            <option value="2025">25</option>
            <option value="2026">26</option>
            <option value="2027">27</option>
            <option value="2028">28</option>
            <option value="2029">29</option>
            <option value="2030">30</option>
            <option value="2031">31</option>
            <option value="2032">32</option>
            <option value="2033">33</option>
            <option value="2034">34</option>
          </select>
          <input type="text" class="pcard" name="titolare" placeholder="Titolare della carta" id="titolare" maxlength = "40"><br>
          <span class="error" id="ccdata" name="ccdata"></span><br>
          <button class="pcard" type="button" id="submit" onclick="updP()">Aggiorna</button>
        </form> 
        
        Se vuoi eliminare il tuo account, inserisci la password attuale:<br>(Questa azione sarà irreversibile!)
        <form id="elim-prof">
          <input type="password" size="40" name="pswE" id="pswE" maxlength="16" placeholder=" Password attuale:"><br>
          <button type="button" onclick="del()" id="conf">Conferma</button><span class="erro" id="errP" style="font-size: small">
        </form>
      </div>
      <div id="users" class="grid-item">
      </div>
    </div> 
    
  </body>
</html>
