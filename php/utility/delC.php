<?php
//elimina commento
    require_once('conn.php');

    $sql = "DELETE FROM commento WHERE id = '" . $_GET['idC'] . "';";
    $connessione->query($sql);
    echo 1;

    $connessione->close();
?>