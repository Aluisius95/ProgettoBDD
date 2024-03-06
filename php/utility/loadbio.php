<?php
require_once("conn.php");
session_start();

//carica biografia per modificare la bio del profilo già salvata

$bio = "SELECT biografia FROM utente WHERE id = " . $_SESSION['id'];

$res = $connessione->query($bio);
if($connessione->query($bio) === false){
    echo "Errore durante prelievo biografia: ".$connessione->error;
}
if(!empty($res)){
    $result = $res->fetch_array(MYSQLI_ASSOC);
    echo $result['biografia'];
}

?>