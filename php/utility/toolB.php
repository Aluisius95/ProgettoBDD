<?php
    require_once('conn.php');
    session_start();

    $sql = "SELECT id, username FROM utente";
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore con la query: " . $connessione->error;
    }

    if(!empty($res)){
        echo "<label for='coaut'>Seleziona un coautore per questo blog:</label>
            <select name='coaut' id='coaut'>";
        while($result = $res->fetch_array(MYSQLI_ASSOC)){
                if($result['id'] != $_SESSION['id']){
                    echo "<option value='".$result['id']."'>".$result['username']."</option>";
                }
        }
            echo "</select>";
    }

    echo "<button type='button' id='add' onclick='coAut(".$_POST['idB'].")'>Aggiungi Co-Autore</button>  <button type='button' id='rem' onclick='coAut(".$_POST['idB'].")'>Rimuovi Co-Autore</button><br>
    <div id='msgB'></div>";

    $connessione->close();
?>