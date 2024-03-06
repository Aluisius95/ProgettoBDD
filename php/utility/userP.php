<?php
    require_once('conn.php');

    //generatore scheda laterale per utenti con maggior numero di post

    $usr = "SELECT username, imgprof, nome, cognome, biografia FROM utente WHERE username = '" . $_GET['username'] ."' LIMIT 10;";

    $res = $connessione->query($usr);
    if($connessione->query($usr) === false){
        echo "Errore durante prelievo dati: " . $connessione->error;
    }

    if(!empty($res)){
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
            echo '<div id="profilo" style="display:flex; margin-left: -2%">
                    <span id="img"><img style="width:250px; border-radius:45%" src="../img/'.$result['imgprof'].'" alt="Immagine Profilo" /></span>
                    <span id="info" style="margin-left: 9%; margin-top: 3%">
                        <div id="nomi"><b id="usrnm" style="font-size: large">'.$result['username'].'</b> <i id="nc" style="font-size: medium">("'.$result['nome'] . ' ' . $result['cognome'] .'")</i></div>
                        <div id="bio" style="margin-top:10%; width:400px; heigth: auto"> ' . $result['biografia'] . '</div>
                    </span>
                </div>';
        }
    } 

    $connessione->close();
?>
