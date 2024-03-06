<?php
    require_once('conn.php');
    session_start();

    $prepSt = $connessione->prepare("INSERT INTO commento(id_utente, id_post, testo, inserimento) VALUES (?,?,?,?)");
    $prepSt->bind_param("iiss", $idU, $idP, $testo, $time);

    $idP = $_POST['idPost'];
    $idU = $_SESSION['id'];
    $timestamp = strtotime("now");
    $time = date('Y/m/d H:i:s', $timestamp);
    $testo = $_POST['commento'];
    $ok = true;
    if(strlen($testo) < 30){
        $ok = false;
        echo 1;
    } else {
        $ok = true;
        $prepSt->execute();
    }

    $connessione->close();
?>