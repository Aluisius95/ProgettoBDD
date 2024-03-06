<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "progettoNoto";

$connessione = new mysqli($host, $user, $password, $db);

if($connessione->connect_error){
    die("Errore in fase di connessione: " . $connessione->connect_error);
}
?>
