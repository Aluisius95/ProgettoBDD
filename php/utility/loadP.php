<?php
    require_once('conn.php');
    $userPremium = require_once('checkpremium.php');
    //carica i post relativi al blog aperto con click

    $elem = "SELECT e.id, id_user, e.titolo as titolo, e.testo as testo, e.data_creazione as creazione, b.Titolo, premium FROM blog AS b, elementi AS e WHERE b.Titolo = '". $_GET['blog']."' AND b.id = e.id_blog;";
    $res = $connessione->query($elem);
    if($connessione->query($elem) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }

    $coAut = "SELECT id_utente, id_blog FROM co_autore, blog WHERE id_utente = " . $_SESSION['id'] . " AND blog.Titolo = '".$_GET['blog'] ."' AND blog.id = id_blog;";
    $coAut1 = $connessione->query($coAut);
    echo '<div class="tit_blog" style="font-size: large">'.$_GET['blog'].'</div>';
    if(!empty($coAut1)){
        $coAutR = $coAut1->fetch_array(MYSQLI_ASSOC);
        echo '<a onclick="window.location.href = \'../php/newpost.php?blogtitle=\' + \''. $_GET['blog'] .'\'">
            <div style="padding: 2%;width:800px;background-color: rgba(230, 228, 228, 0.766);border: 1px solid rgb(0, 0, 0);margin-bottom: 16px;border-radius: 3%;box-shadow: 12px 12px 5px rgb(123, 142, 145);">
                <div>
                    <span style="margin-bottom:20px;font-size: medium; font-weight: bold">Crea nuovo post!</span>
                </div><br>
            </div></a>';
    }

    if(!empty($res)){
      
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
            $timeS = strtotime($result['creazione']);
            $dateIT = date("D d M Y", $timeS);
            $preview = substr($result['testo'], 0, 150);
            if($result['premium'] == 1 && $userPremium == 0 && $result['id_user'] != $_SESSION['id']){
                echo '<div class="int" id="'. $result['id'].'" style="padding: 2%; width:800px; background-color: rgba(230, 228, 228, 0.766); border: 1px solid rgb(0, 0, 0); margin-bottom: 16px; border-radius: 3%; box-shadow: 12px 12px 5px rgb(123, 142, 145);">
                    <div>
                        <span style="margin-bottom:20px;font-size: medium; font-weight: bold">'.md5($result['titolo']).'</span>
                    </div><br>
                    <div><span class="txt_post">'.md5($preview).'...</span></div>
                    <br>
                    <div style="position: relative; right:0; text-align: right"><cite class="aut"style="test-align: right;font-size: small">'.$dateIT.'</cite></div>
                </div>';
                echo "<script>
                        $('#". $result['id']."').css({'-webkit-filter': 'blur(5px)', '-moz-filter': 'blur(5px)', '-o-filter': 'blur(5px)', '-ms-filter': 'blur(5px)'})
                </script>";
            } else {
                echo '<div class="int" style="padding: 2%; width:800px; background-color: rgba(230, 228, 228, 0.766); border: 1px solid rgb(0, 0, 0); margin-bottom: 16px; border-radius: 3%; box-shadow: 12px 12px 5px rgb(123, 142, 145);" onclick="window.location.href = \'../php/postV.php?id=\' + \''.$result['id'].'\'">
                    <div>
                        <span style="margin-bottom:20px;font-size: medium; font-weight: bold">'.$result['titolo'].'</span>
                    </div><br>
                    <div><span class="txt_post">'.$preview.'...</span></div>
                    <br>
                    <div style="position: relative; right:0; text-align: right"><cite class="aut"style="test-align: right;font-size: small">'.$dateIT.'</cite></div>
                </div>';
            }
        }
    }
    $connessione->close();
?>
