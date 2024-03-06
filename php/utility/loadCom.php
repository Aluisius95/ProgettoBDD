<?php
    require_once('conn.php');
    session_start();

    $sql = "SELECT id_utente, c.id AS cid, e.id_user AS eid, username, c.testo, inserimento FROM utente AS u, elementi AS e, commento AS c WHERE id_post = e.id AND u.id = id_utente AND id_post = ".$_POST['idPost']." ORDER BY inserimento ASC;";
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }

    if(!empty($res)){
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
            $timeS = strtotime($result['inserimento']);
            $dateIT = date("d-m-Y H:i", $timeS);

            echo '<div class="scheda_post int" id="'.$result['cid'].'" style="padding: 2%; width:800px; background-color: rgba(230, 228, 228, 0.766); border: 1px solid rgb(0, 0, 0); margin-bottom: 16px; border-radius: 3%; box-shadow: 12px 12px 5px rgb(123, 142, 145);">
                <div>
                    <span class="tit_post" style="margin-bottom:20px;font-size: large; font-weight: bold">'.$result['username'].' <i style="font-weight: normal; font-size:x-small"> '.$dateIT.'</i></span>';
            if($result['id_utente'] == $_SESSION['id'] || $result['eid'] == $_SESSION['id']){
                echo '<span class="tit_blog" style="font-size: small" onclick="delC('.$result['cid'].')"> [Elimina commento]</span>';
            }
                echo '</div><br>
                    <span class="txt_post">'.$result['testo'].'</span></div>
                <br>
            </div>';
        }
    }

    $connessione->close();
?>