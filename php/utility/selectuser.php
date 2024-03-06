<?php
    require_once("conn.php");
    
    //verifica di username e email non utilizzate da altri utenti

    $username = $_POST['username'];
    $userF = false;
    $email= $_POST['email'];
    $mailF = false;

    $user = "SELECT username FROM `utente` WHERE username = '$username';";
    $res1 = $connessione->query($user);
    if($connessione->query($user) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }
    $result1 = $res1->fetch_array(MYSQLI_ASSOC);
    if(!empty($result1) && $result1['username'] == $username){
        $userF = true;
    }

    $mail = "SELECT email FROM `utente` WHERE email = '$email';";
    $res2 = $connessione->query($mail);
    if($connessione->query($mail) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }
    $result2 = $res2->fetch_array(MYSQLI_ASSOC);
    if(!empty($result2) && $result2['email'] == $email){
        $mailF = true;
    }

    if($userF){
        echo 1;}
    if($mailF){
        echo 2;}
?>