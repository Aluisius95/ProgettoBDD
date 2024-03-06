<?php
require_once('conn.php');
session_start();

//apre la visualizzazione di un post cliccato dalla home o dal profilo utente in sessione

$sql = "SELECT DISTINCT e.titolo, img, username, data_creazione, e.id, u.id, id_user, id_blog, testo, sottogenere, genere FROM utente as u, blog as b, elementi as e, tema as t, sottotema as s WHERE e.id = '". $_GET['idP'] ."' AND id_user = '".$_SESSION['id']."' AND sottotema = s.id AND t.id = s.id_tema;";
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
echo "<div class='contenuto' style='font-family:\"". $stileR['tipo_font'] ."\"'>
        <div class='int' style='display: flex'>
            <div class='tit_p' style='font-size:large; font-weight:bold'>".$result['titolo']."</div>
            <span class='dt' style='display:flex; position: absolute; right: 25%'><cite>".$dateIT."</cite></span>
        </div>
        <div class='sub_t' style='font-size:small'>#".$result['genere']." #".$result['sottogenere']."</div><br><br>
        <div class='imgs' ><img src='../img/".$result['img']."' alt='".$result['img']."' width='50%'></div><br>
        <div class='txt' style='font-family:\"". $stileR['tipo_font'] ."\"'>".$result['testo']."</div><br>
        <div class='aut' style='position: absolute; right: 49%' onclick='loadU(\"".$result['username']."\"); loadB(\"".$result['username']."\")'><cite>".$_SESSION['username']."</cite></div>
        <div class='act' onclick='delP(\"".$_GET['idP']."\")'>Elimina post</div><br>
        <form id='pst' method='POST' action='../php/utility/addImg.php?idP=". $_GET['idP'] ."' enctype='multipart/form-data'>
            <span id='container'>
                <span id='btn-cont'>
                    <label for='carica' class='button'>Scegli foto da caricare</label>
                    <input type='file' name='carica' id='carica' style='display:none'>
                </span>
            </span>
            <input type='submit' id='invio'>
            <span id='errL' class='erro' style='font-size: small'></span><br>
            <div style='font-size:small; margin-top:3%'>ATTENZIONE: l'immagine deve essere in formato .jpg, .gif, .png o .jpeg e non deve superare 1MB!</div>
        </form>
    </div>";
echo '<form class="comm" method="POST">
        <div>
        <textarea class="count" name="commento" id="commento" rows="7" cols="85" minlength="30" maxlength="250" placeholder="Inserisci qui il tuo commento:" required onkeyup="counter()"></textarea><span id="cd" class="cd" style="position:relative; bottom: 18px;left:-9%;font-size: small">250/250</span>
        <span><button type="button" onclick="addCom('.$_GET['idP'].')">Invia</button></span><br><br></div>
      </form>';
echo '<div class="allComm">

     </div>';

    $connessione->close();
?>