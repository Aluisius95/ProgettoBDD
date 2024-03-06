<?php
    require_once('conn.php');
    $userPremium = require_once('checkpremium.php');
    //selezione di tutti i post da visualizzare nella homepage

    $post = "SELECT e.id, id_user, e.titolo as titolo, e.testo as testo, e.data_creazione as creazione, u.username as user, b.titolo as blog, e.premium FROM utente AS u, blog AS b, elementi AS e WHERE u.id = e.id_user AND b.id = e.id_blog ORDER BY creazione DESC";

    $res = $connessione->query($post);
    if($connessione->query($post) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }

    if(!empty($res)){
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
            $timeS = strtotime($result['creazione']);
            $dateIT = date("D d M Y", $timeS);
            $preview = substr($result['testo'], 0, 150);
            if($result['premium'] == 1 && $userPremium == 0 && $result['id_user'] != $_SESSION['id']){
            echo '<div class="scheda_post int" id="'.$result['id'].'" style="padding: 2%; width:800px; background-color: rgba(230, 228, 228, 0.766); border: 1px solid rgb(0, 0, 0); margin-bottom: 16px; border-radius: 3%; box-shadow: 12px 12px 5px rgb(123, 142, 145);">
                <div>
                    <span class="tit_post" style="margin-bottom:20px;font-size: large; font-weight: bold">'.md5($result['titolo']).'</span>
                    <span class="tit_blog" style="font-size: small">("'.md5($result['blog']).'")</span>
                </div><br>
                <div><span class="txt_post">'.md5($preview).'<br><br><i>Apri per continuare a leggere</i></span></div>
                <br>
                <div style="position: relative; right:0; text-align: right"><cite class="aut"style="cursor:pointer; test-align: right;font-size: small" >'.$dateIT.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.md5($result['user']).'</cite></div>
            </div>';
                echo "<script>
                        $('#".$result['id']."').css({'-webkit-filter': 'blur(5px)', '-moz-filter': 'blur(5px)', '-o-filter': 'blur(5px)', '-ms-filter': 'blur(5px)'})
                </script>";
            } else {
                echo '<div class="scheda_post int" id="'.$result['id'].'" style="padding: 2%; width:800px; background-color: rgba(230, 228, 228, 0.766); border: 1px solid rgb(0, 0, 0); margin-bottom: 16px; border-radius: 3%; box-shadow: 12px 12px 5px rgb(123, 142, 145);" onclick="window.location.href = \'../php/postV.php?id=\' + \''.$result['id'].'\'">
                <div>
                    <span class="tit_post" style="margin-bottom:20px;font-size: large; font-weight: bold">'.$result['titolo'].'</span>
                    <span class="tit_blog" style="font-size: small">("'.$result['blog'].'")</span>
                </div><br>
                <div><span class="txt_post">'.$preview.'<br><br><i>Apri per continuare a leggere</i></span></div>
                <br>
                <div style="position: relative; right:0; text-align: right"><cite class="aut"style="cursor:pointer; test-align: right;font-size: small">'.$dateIT.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$result['user'].'</cite></div>
            </div>';
            }
        }
    }

    $connessione->close();
?>