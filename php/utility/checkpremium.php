<?php
    require_once('conn.php');
    session_start();

    $sql = "SELECT premium FROM utente WHERE id = ".$_SESSION['id'];
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore nella query: " . $connessione->error;
    }
    $result = $res->fetch_array(MYSQLI_ASSOC);
    if(!$result['premium']){
        return 0;
    } else {return 1;}
?>