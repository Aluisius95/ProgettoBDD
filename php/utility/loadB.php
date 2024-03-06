<?php
require_once("conn.php");
//carica i blog degli utenti durante la visualizzazione dei loro profili

$sql = "SELECT Titolo as title, username, u.id, id_autore FROM blog as b, utente as u WHERE username = '". $_GET['username'] . "' AND id_autore = u.id;";
$res = $connessione->query($sql);
if($connessione->query($sql) === false){
    echo "Errore durante prelievo dei blog: " . $connessione->error;
}

echo "<div class='contenuto' style='margin-top:10%'>Qui puoi aprire i blog creati da <b>" . $_GET['username'] . "</b>! Buona lettura. </div> ";
echo '<div class="contenuto cblog">';
if(!empty($res)){
      while ($result = $res->fetch_array(MYSQLI_ASSOC)){
      echo '<div class="blogs" onclick="loadP(\''.$result['title'].'\')">
              <a onclick="loadP(\''.$result['title'].'\')">' . $result['title'] . '</a>
           </div>';
  }
} else {
  echo "<div class=\"blogs\"> Nessun blog ancora creato da questo utente! </div>";
}
echo "</div>";

$connessione->close();

?>
