<?php
    require_once('conn.php');
    session_start();

     //carica i post dell'utente in sessione relativi al blog aperto con click

    $elem = "SELECT e.id, id_blog, e.titolo as titolo, id_autore, e.testo as testo, e.data_creazione as creazione, b.Titolo FROM blog AS b, elementi AS e WHERE b.Titolo = '". $_GET['blog']."' AND b.id = e.id_blog AND id_autore = '". $_SESSION['id'] ."';";

    $sql = "SELECT id FROM blog WHERE Titolo = '". $_GET['blog']."' AND id_autore = '". $_SESSION['id'] ."';";

    $res = $connessione->query($elem);
    if($connessione->query($elem) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }

    $res2 = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore durante prelievo dati".$connessione->error;
    }
    $result2 = $res2->fetch_array(MYSQLI_ASSOC);

 
    echo '<div class="head" style="display:flex">
            <div class="tit_blog" style="font-size: large; margin-bottom: 20px">' . $_GET['blog'] . '</div>
            <span style="position: absolute; right: 48%" class="act" onclick="toolsB(\''.$result2['id'].'\')">Modifica Blog</span>
            <span style="position: absolute; right: 5%" class="act" onclick="delB(\''.$result2['id'].'\')">Elimina Blog</span>
          </div><br>';
    echo '<a onclick="window.location.href = \'../php/newpost.php?blogtitle=\' + \''. $_GET['blog'] .'\'"><div style="
      padding: 2%; 
      width:800px;
      background-color: rgba(230, 228, 228, 0.766);
      border: 1px solid rgb(0, 0, 0);
      margin-bottom: 16px;
      border-radius: 3%;
      box-shadow: 12px 12px 5px rgb(123, 142, 145);">
      <div>
        <span style="margin-bottom:20px;font-size: medium; font-weight: bold">Crea nuovo post!
        </span>
      </div><br>
    </div></a>';

    if(!empty($res)){
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
            $timeS = strtotime($result['creazione']);
            $dateIT = date("D d M Y", $timeS);
            $preview = substr($result['testo'], 0, 150);
            echo '<div style="padding: 2%; width:800px; background-color: rgba(230, 228, 228, 0.766); border: 1px solid rgb(0, 0, 0); margin-bottom: 16px; border-radius: 3%; box-shadow: 12px 12px 5px rgb(123, 142, 145);" onclick="window.location.href = \'../php/post.php?id=\' + \''.$result['id'].'\'">
                <div>
                    <span style="margin-bottom:20px;font-size: medium; font-weight: bold">'.$result['titolo'].'</span>
                </div><br>
                <div><span class="txt_post">'.$preview.'...</span></div>
                <br>
                <div style="position: relative; right:0; text-align: right"><cite class="aut"style="test-align: right;font-size: small">'.$dateIT.'</cite></div>
            </div>';
        }
    } else {
        echo "Nessun post ancora creato!";
    }
    $connessione->close();
?>
