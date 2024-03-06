<?php
    require_once('conn.php');

    //selettore per lo stile del blog
    
    $sql = "SELECT id, nome_stile, tipo_font FROM stile;";
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore nella query: " . $connessione->error;
    }
    if(!empty($res)){
        while($result = $res->fetch_array(MYSQLI_ASSOC)){
            echo "<option value=" . $result['id'] .">".$result['nome_stile']."</option>";
        }
    }

    $connessione->close();
?>