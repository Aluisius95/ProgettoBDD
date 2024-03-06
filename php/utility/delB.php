<?php
//elimina blog e tutto ciò che è collegato per FK in DB
    require_once('conn.php');

    $sql = "DELETE FROM blog WHERE id = '" . $_GET['idB'] . "';";
    $connessione->query($sql);
    echo 1;

    $connessione->close();
?>