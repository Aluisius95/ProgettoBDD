<?php
require_once('conn.php');
$userPremium = require_once('checkpremium.php');
//apre la visualizzazione di un post cliccato dalla home o dal profilo utente

$sql = "SELECT DISTINCT e.titolo, username, data_creazione, e.id, u.id as usid, id_user, id_blog, testo, sottogenere, genere, img, e.premium FROM utente as u, blog as b, elementi as e, tema as t, sottotema as s WHERE e.id = '". $_GET['idP'] ."' AND u.id = id_user AND sottotema = s.id AND t.id = s.id_tema;";
$res = $connessione->query($sql);
if($connessione->query($sql) === false){
    echo "Errore nella query: " . $connessione->error;
}

$stile = "SELECT id_stile, tipo_font FROM blog, stile, elementi WHERE stile.id = id_stile AND id_blog = blog.id AND elementi.id =".$_GET['idP']. ";";
$resS = $connessione->query($stile);
$stileR = $resS->fetch_array(MYSQLI_ASSOC);

$result = $res->fetch_array(MYSQLI_ASSOC);
$timeS = strtotime($result['data_creazione']);
$dateIT = date("D d M Y", $timeS);
if($result['premium'] == 1 && $userPremium == 0 && $result['id_user'] != $_SESSION['id']){
    echo "<div id='". $result['id']."'>
        <div class='int' style='display: flex'>
            <div class='tit_p' style='font-size:large; font-weight:bold'>".md5($result['titolo'])."</div>
            <span class='dt' style='display:flex; position: absolute; right: 7%'><cite>".md5($dateIT)."</cite></span>
        </div>
        <div class='sub_t' style='font-size:small'>#".md5($result['genere'])." #".md5($result['sottogenere'])."</div><br><br>
        <div class='imgs' ><img src='../img/".md5($result['img'])."' alt='".md5($result['img'])."' width='50%'></div><br>
        <div class='txt'>".md5($result['testo'])."</div><br>
        <div class='aut' style='position: absolute; right: 7%'><cite>".md5($result['username'])."</cite></div><br>
    </div>";
    echo "<script>
                        $('#". $result['id']."').css({'-webkit-filter': 'blur(5px)', '-moz-filter': 'blur(5px)', '-o-filter': 'blur(5px)', '-ms-filter': 'blur(5px)'})
                </script>";
} else {
    echo "<div id='". $result['id']."' class='contenuto' style='font-family:\"". $stileR['tipo_font'] ."\"'>
            <div class='int' style='display: flex'>
                <div class='tit_p' style='font-size:large; font-weight:bold'>".$result  ['titolo']."</div>
               <span class='dt' style='display:flex; position: absolute; right: 25%'><cite>".$dateIT."</cite></span>
           </div>
          <div class='sub_t' style='font-size:small'>#".$result['genere']." #".$result['sottogenere']."</div><br><br>
          <div class='imgs' ><img src='../img/".$result['img']."' alt='".$result['img']."' width='50%'></div><br>
          <div class='txt'>".$result['testo']."</div><br>";
    if($_SESSION['id'] == $result['usid']){echo "<div class='act' onclick='delP(\"".$_GET['idP']."\")'>Elimina post</div><br>";}
    echo" <div class='aut' style='position: absolute; right: 49%' onclick='loadU(\"".$result['username']."\"); loadB(\"".$result['username']."\")'><cite>".$result['username']."</cite></div><br>
        </div>";
    echo '<div><form class="comm" method="POST">
        <textarea class="count" name="commento" id="commento" rows="7" cols="85" minlength="50" maxlength="250" placeholder="Inserisci qui il tuo commento:" required onkeyup="counter()"></textarea><span id="cd" class="cd" style="position:relative; bottom: 18px;left:-9%;font-size: small">250/250</span>
        <span><button type="button" onclick="addCom('.$_GET['idP'].')">Invia</button></span><br><br>
      </form></div>';
    echo '<div class="allComm">

     </div>';
}

$connessione->close();
?>