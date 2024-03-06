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
    <script src="../js/checksign.js"></script>
    <title>Accedi o iscriviti</title>
  </head>

  <body>
    <div class="grid-container grid-sign">
      <div class="grid-item">
        <form id="rec" class="sign form-sign" action="../php/utility/register.php" method="POST">
          <input type="text" name="first_name" id="first_name" placeholder=" Nome: [es: Mario]" maxlength="20" required> * <span class="error" name="invname" id="invname"></span><br>
          <input type="text" name="last_name" id="last_name" placeholder=" Cognome: [es: Rossi]" maxlength="20" required> *<span class="error" name="invlast" id="invlast"></span><br>
          <input type="text" name="username" id="username" maxlength="18" placeholder=" Username: [es: MRossi1]" onchange="check()" required> * <span class="error" name="userexist" id="userexist"></span> <br>
          <input type="password" name="psw" id="psw" maxlength="16" placeholder=" Password: " required> * <span class="error" name="lowpsw" id="lowpsw"></span> <br>
          <input type="password" name="conf_psw" id="conf_psw" placeholder=" Conferma password: " maxlength="16" required> * <span class="error" name="nomatch" id="nomatch"></span> <br>
          <input type="email" name="email" id="email" onchange="check()" placeholder=" E-mail: " maxlength="50"required> * <span class="error" name="invem" id="invem"></span><br>
          <input type="date" name="birth" id="birth" required> * <span class="error" name="invdate" id="invdate"></span> <br>
          <input type="text" name="phone" maxlength="10"id="phone" placeholder=" Telefono mobile: " required> * <span class="error" name="invph" id="invph"></span> <br><br>
          <p style="font-size:large">Vuoi essere un utente premium? Spunta qui e aggiungi la tua carta di credito.<input type="checkbox" name="premium" id="premium"><br><i style="font-size:small">Oppure puoi decidere se diventarlo successivamente!</i></p>

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
          <input type="submit" name="signin" id="signin" value="Registrati" style="margin-left: 38.5%; margin-top: 5%; padding:2%; font-size:large">
        </form>
      </div>
      <div class="info-sign grid-item">
        <div id="logo"><img src="../img/logo.png" alt="bloglogo"></div>
        <p>Compila il seguente form per poterti registrare.</p>
        <p>ATTENZIONE: tutti i campi con l'asterisco sono obbligatori!</p>
      </div>
    </div>
  </body>
</html>
