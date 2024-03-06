<?php
//elimina post e tutto ciò che è collegato per FK in DB
    require_once('conn.php');

    $sql = "DELETE FROM elementi WHERE id = '" . $_GET['idP'] . "';";
    $connessione->query($sql);
    echo 1;

    $connessione->close();
?>