<?php
    require_once('conn.php');

    //generatore pagina profilo utente sulla visita dell'utente in sessione

    $usr = "SELECT username, imgprof, COUNT(e.id_user) AS n_post FROM utente AS u, elementi AS e WHERE u.id = e.id_user GROUP BY e.id_user ORDER BY `n_post` DESC;";
    $res = $connessione->query($usr);
    if($connessione->query($usr) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }
    if(!empty($res)){
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
            echo '<div style="display: flex;padding: 2% 5%; margin-bottom:5px; width:300px; background-color: rgba(230, 228, 228, 0.766); align-items: center;border: 1px solid rgb(0, 0, 0); border-radius: 3%; box-shadow: 12px 12px 5px rgb(123, 142, 145);">
              <span><img src="../img/' . $result['imgprof'] . '" style="border-radius: 60%"alt="Immagine Utente" width="50px" height="auto" margin-right:10px;></img></span>
              <span style="text-align:left;font-size: medium; margin-left:10px">
                <b>Utente: </b><a onclick="loadU(\''. $result['username'] .'\'); loadB(\''. $result['username'].'\')">' . $result['username'] .'</a><br>
                <span><b>Numero di post: </b>' . $result['n_post'] . '</span>
              </span>
            </div>';
        }
    }

    $connessione->close();
?>
