<?php
    session_start();
    require_once("conn.php");

    $sql = "UPDATE utente SET imgprof = 'default.png' WHERE utente.id = " . $_SESSION['id'];
    if ($connessione->query($sql) !== true) {
        echo "Errore durante registrazione " . $connessione->error;
    } else {
        echo "Immagine rimossa con successo!";
    }

$connessione->close();
?>