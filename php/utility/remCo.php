<?php
    require_once('conn.php');

    $idU = intval($_GET['idU']);
    $idB = intval($_GET['idB']);
    
    $rem = "DELETE FROM co_autore WHERE id_utente= ". $idU ." AND id_blog = ".$idB;

    

    //controllo che l'utente non sia già coautore del blog
    $sql = "SELECT * FROM co_autore WHERE id_blog = " .$idB . " AND id_utente =".$idU;
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "C'è stato un errore con la query: " . $connessione->error;
    }
    if(!empty($res)){
        $connessione->query($rem);
        echo "L'utente è stato rimosso dai co-autori. Puoi effettuare altre modifiche adesso!";
    } else {
        echo "L'utente non è co-autore di questo blog";
    }

$connessione->close();
?>