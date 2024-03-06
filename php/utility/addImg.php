<?php
session_start();
require_once("conn.php");


if(!empty($_FILES['carica']["name"])){
    $dir = '\xampp\htdocs\progettoNoto\img\\';
    $img = $dir . $_FILES['carica']["name"];
    $uploadOK = 1;
    $imageFileType = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    // Verifico dim. dell'immagine
    if ($_FILES["carica"]["size"] > 1000000) {
        echo "Ci dispiace, ma il file supera il limite di 1MB.";
        $uploadOk = 0;
    }
    
    // Verifico i formati dell'immagine
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Ci dispiace, ma sono consentiti solo i formati JPG, JPEG, PNG e GIF.";
        $uploadOk = 0;
    }
    
    // Se c'è stato qualche errore l'immagine non viene caricata
    if ($uploadOK == 0) {
        echo "Ci dispiace, il tuo file non è stato caricato.";
        // altrimenti verrà caricata
    } else {
        if($_FILES['carica']['name'] != ''){
            move_uploaded_file($_FILES["carica"]["tmp_name"], $img);
            echo "Il file " . basename($_FILES["carica"]["name"]) . " è stato caricato.";
            $sql = "UPDATE `elementi` SET `img` = '". basename($_FILES['carica']['name']) ."' WHERE `elementi`.`id` = " . $_GET['idP'];
            $connessione->query($sql);
            header("location: ../post.php?id=".$_GET['idP']."");
        } else {
            echo "<br>Ci dispiace, c'è stato un errore di caricamento del file.";
        }
    } 
}
 $connessione->close();
?>