<?php
session_start();
require_once("conn.php");

$che = [false, false, false];

if(!empty($_FILES['carica']["name"])){
    $che[0]=false;
    $dir = "\\xampp\htdocs\progettoNoto\img\\";
    $img = $dir . basename($_FILES['carica']["name"]);
    global $uploadOK;
    $uploadOK = 1;
    $imageFileType = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["carica"]["tmp_name"]);
        if ($check !== false) {
            echo "Il file è una immagine - " . $check["mime"] . ".";
            echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
            header("refresh:5; url=../tools.php");
            echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
            $uploadOk = 1;
            $che[0]=true;
        } else {
            echo "Il file non è una immagine.";
            echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
            header("refresh:5; url=../tools.php");
            echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
            $uploadOk = 0;
            $che[0]=false;
        }
    }
    
    // Verifico dim. dell'immagine
    if ($_FILES["carica"]["size"] > 1000000) {
        echo "Ci dispiace, ma il file supera il limite di 1MB.";
        echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
        header("refresh:5; url=../tools.php");
        echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
        $uploadOk = 0;
        $che[0]=false;
    }
    
    // Verifico i formati dell'immagine
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Ci dispiace, ma sono consentiti solo i formati JPG, JPEG, PNG e GIF.";
        echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
        header("refresh:5; url=../tools.php");
        echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
        $uploadOk = 0;
        $che[0]=false;
    }
    
    // Se c'è stato qualche errore l'immagine non viene caricata
    
    if ($uploadOK == 0) {
        echo "Ci dispiace, il tuo file non è stato caricato.";
        echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
        header("refresh:5; url=../tools.php");
        echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
        $che[0]=false;
        // altrimenti verrà caricata
    } else {
        $uploadOk = 1;
        $che[0]=true;
        if (move_uploaded_file($_FILES["carica"]["tmp_name"], $img)) {
            echo "Il file " . htmlspecialchars(basename($_FILES["carica"]["name"])) . " è stato caricato.";
            echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
            header("refresh:5; url=../tools.php");
            echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
        } else {
            echo "Ci dispiace, c'è stato un errore di caricamento del file.";
            echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
            header("refresh:5; url=../tools.php");
            echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
        }
    }
    
}
if (!empty($_POST['biog'])){
    $che[1] = true;
}
else {
    $sql = "UPDATE `utente` SET `biografia` = NULL WHERE `utente`.`id` =" . $_SESSION['id'];
    if ($connessione->query($sql) !== true) {
        echo "Errore durante registrazione " . $connessione->error;
        echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
        header("refresh:5; url=../tools.php");
        echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
    }
    $che[2] = true;
}


if ($che[0] == true || $che[1] == true || $che[2] == true) {
    if ($che[0] == true) {
        $sql = "UPDATE `utente` SET `imgprof` = '" . $_FILES['carica']["name"] . "' WHERE `utente`.`id` =" . $_SESSION['id'];
        if ($connessione->query($sql) !== true) {
            echo "Errore durante registrazione " . $connessione->error;
            echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
            header("refresh:5; url=../tools.php");
            echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
        }
    }
    if ($che[1] == true) {
        $sql = "UPDATE `utente` SET `biografia` = '" . $_POST['biog'] . "' WHERE `utente`.`id` =" . $_SESSION['id'];
        if ($connessione->query($sql) !== true) {
            echo "Errore durante registrazione " . $connessione->error;
            echo "Verrai reindirizzato alla pagina delle impostazioni tra 5 secondi.";
            header("refresh:5; url=../tools.php");
            echo "Altrimenti clicca <a href=\"../tools.php\">qui</a> per saltare l'attesa.";
        }
    }
    header("location: ../profile.php");
}
$connessione->close();
?>