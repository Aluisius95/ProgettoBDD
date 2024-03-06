<?php
    require_once('conn.php');

    //Ricavo i dati dal form della login
    $username = $_POST['username'];
    $pasw = md5(md5($_POST['password']));
    
    //Ricerco nel DB le chiavi riguardanti il profilo, in base a username e password
    $dbsel = "SELECT id, username, email FROM utente WHERE username = '$username' AND password = '$pasw'";
    $res = $connessione->query($dbsel);

    //recupero i dati inserendoli in un array
    $result = $res->fetch_array(MYSQLI_NUM);

    //Inizializzo la sessione
    session_start();
    
    //Verifico se è stata restituita una riga dal DB ed eventualmente
    // inizializzo i dati di sessione, altrimenti rimando alla pagina del login
    if(empty($result)){
        echo 1;
    } else {
        //Conservo i dati acquisiti tramite query all'interno della sessione
        echo 2;
        $_SESSION["id"] = $result[0];
        $_SESSION["username"] = $result[1];
        $_SESSION["email"] = $result[2];
        //header("location: ../home.php");
    } 
?>