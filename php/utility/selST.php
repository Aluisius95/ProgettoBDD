<?php
    require_once('conn.php');

    //selettore per sottotemi in base al tema per i post

    $title = $_GET['title'];
    
    $sql = "SELECT sottotema.id, sottogenere FROM sottotema, blog WHERE blog.id_tema = sottotema.id_tema AND Titolo = '".$title."';";
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore nella query: " . $connessione->error;
    }
    if(!empty($res)){
        while($result = $res->fetch_array(MYSQLI_ASSOC)){
            echo "<option value=" . $result['id'] .">".$result['sottogenere']."</option>";
        }
    }

    $connessione->close();
?>