<?php
//elimina profilo e tutto ciò che è collegato per FK in DB
require_once("conn.php");
session_start();
$sql = "DELETE FROM `utente` WHERE `utente`.`id` =" . $_SESSION['id'];
$connessione->query($sql);
echo 1;
session_destroy();
?>
