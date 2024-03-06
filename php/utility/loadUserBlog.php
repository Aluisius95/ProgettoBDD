<?php
require_once("conn.php");
session_start();

//carica i blog dell'utente in sessione nel suo profilo

$sql = "SELECT Titolo as title FROM blog WHERE id_autore = '" . $_SESSION['id']."';";
$res = $connessione->query($sql);

if($connessione->query($sql) === false){
    echo "Errore durante prelievo dei blog: " . $connessione->error;
}

echo "<div class='contenuto' style='margin-top:10%'>Ciao <b>" . $_SESSION['username'] . "</b>! Crea, apri o modifica i tuoi blog!</div> ";
echo '<div class="contenuto cblog">
    <div class="blogs">
        <a href="../php/newblog.php">Crea un nuovo blog!</a>
    </div>';
    if(!empty($res)){
        while ($result = $res->fetch_array(MYSQLI_ASSOC)){
        echo '<div class="blogs" onclick="loadPU(\''.$result['title'].'\')">
                <a onclick="loadPU(\''.$result['title'].'\')">' . $result['title'] . '</a>
             </div>';
        }
    } else {
    echo "<div class=\"blogs\"> Nessun blog ancora creato, iniziane facilmente uno! </div>";
    }
echo "</div>"
?>
