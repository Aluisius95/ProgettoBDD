<?php
    require_once('conn.php');

    //selettore del tema per blog

    $sql = "SELECT * FROM tema;";
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore nella query: " . $connessione->error;
    }
    if(!empty($res)){
        while($result = $res->fetch_array(MYSQLI_ASSOC)){
            echo "<option value=" . $result['id'] .">".$result['genere']."</option>";
        }
    }

    $connessione->close();
?>