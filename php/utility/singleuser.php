<?php
    require_once('conn.php');
    session_start();

    //generatore della pagina profilo dell'utente in sessione

    $usr = "SELECT username, imgprof, nome, cognome, biografia, data_di_nascita, email FROM utente WHERE id = '" . $_SESSION['id'] . "' AND username = '" . $_SESSION['username']."'";

    $res = $connessione->query($usr);
    if($connessione->query($usr) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }
    if(!empty($res)){
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
            $timeS = strtotime($result['data_di_nascita']);
            $dateIT = date("d/m/Y", $timeS);
            echo '<div id="profilo" style="display:flex; margin-left: -2%">
                    <span id="img"><img style="width:250px; border-radius:45%" src="../img/'.$result['imgprof'].'" alt="Immagine Profilo" /></span>
                    <span id="info" style="margin-left: 9%; margin-top: 3%">
                        <div id="nomi"><b id="usrnm" style="font-size: large">'.$result['username'].'</b> <i id="nc" style="font-size: medium">("'.$result['nome'] . ' ' . $result['cognome'] .'")</i></div>
                        <div id="anag"><i style="font-size:small">Data di nascita: '.$dateIT.'<br>Email: '.$result['email'].'</i></div>
                        <div id="bio" style="margin-top:10%; width:400px; heigth: auto"> ' . $result['biografia'] . '</div>
                    </span>
                    <span id="tool" style="position:relative; right:-16%"><a href="../php/tools.php">&#9881 Impostazioni</a></span>
                </div><br>';
        }
    }

    $connessione->close();
?>
