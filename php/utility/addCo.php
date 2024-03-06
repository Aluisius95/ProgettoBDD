<?php
    require_once('conn.php');

    $prepSt = $connessione->prepare("INSERT INTO `co_autore` (`id_utente`, `id_blog`) VALUES (?,?);");
    $prepSt->bind_param("ii", $idU, $idB);

    $idU = intval($_GET['idU']);
    $idB = intval($_GET['idB']);

    //controllo che l'utente non sia già coautore del blog
    $sql = "SELECT id_utente FROM co_autore WHERE id_blog = " .$idB;
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "C'è stato un errore con la query: " . $connessione->error;
    }
    
    $ok = true;
    if(!empty($res)){
        while($result = $res->fetch_array(MYSQLI_ASSOC)){
            if($result['id_utente'] == $idU){
                echo "L'utente è già co-autore di questo blog, per favore scegli un altro utente!";
                $ok = false;
                break;
            }
        }
    }
    if($ok){
        $prepSt->execute();
        echo "Adesso puoi aggiungere un altro co-autore, rimuoverne uno o cambiare pagina!";
    }
$connessione->close();
?>