<?php
    require_once('conn.php');

    //acquisizione dati per registrazione nuovo utente

    $firstname = $connessione->real_escape_string($_POST['first_name']);
    $lastname = $connessione->real_escape_string($_POST['last_name']);
    $username = $connessione->real_escape_string($_POST['username']);
    $password = md5(md5($connessione->real_escape_string($_POST['psw'])));
    $email = $connessione->real_escape_string($_POST['email']);
    $birth = $connessione->real_escape_string($_POST['birth']);
    $phone = $connessione->real_escape_string($_POST['phone']);
    $premium = 0;
    
    $ccnumber = NULL;
    $cvc = Null;   
    $exmonth =Null;
    $exyear = null;
    $ccname =null;
    if(isset($_POST['premium'])){
      $premium = 1;
      $ccnumber = $connessione->real_escape_string($_POST['credit_card']);
      $cvc = $connessione->real_escape_string($_POST['cvc']);
      $exmonth = $connessione->real_escape_string($_POST['month']);
      $exyear = $connessione->real_escape_string($_POST['year']);
      $ccname = $connessione->real_escape_string($_POST['titolare']);
    }


    $dbins = "INSERT INTO utente (username, nome, cognome, password, data_di_nascita, numero_di_telefono, email, premium, carta_di_credito, cvc, ccmonth, ccyear, ccname) VALUES ('$username', '$firstname', '$lastname', '$password', '$birth', '$phone', '$email', '$premium', '$ccnumber', '$cvc', '$exmonth', '$exyear', '$ccname')";
    if($connessione->query($dbins) === true){
        echo "Registrazione effettuata con successo, verrai reindirizzato tra 5 secondi alla pagina di login.<br>";
        header("refresh:5; url=../index.php");
        echo "Altrimenti clicca <a href=\"../index.php\">qui</a> per saltare l'attesa.";

    } else {
        echo "Errore durante registrazione " . $connessione->error;
    }
?>
