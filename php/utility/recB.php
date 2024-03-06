<?php
    require_once('conn.php');
    session_start();

    //registra il nuovo blog controllando che non ne esista un omonimo per l'utente in sessione
    
    $prepSt = $connessione->prepare("INSERT INTO blog(Titolo, id_autore, id_tema, id_stile) VALUES (?,?,?,?)");
    $prepSt->bind_param("siii", $title, $_SESSION['id'], $theme, $style);

    $sql = "SELECT Titolo FROM blog WHERE id_autore =".$_SESSION['id'];
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore nella query: " . $connessione->error;
    }

    $title = $_POST['title'];
    $theme = intval($_POST['theme']);
    $style = intval($_POST['style']);
    $ok = true;

    if($title == ''){
        $ok = false;
        echo '<div>Completa il titolo prima di continuare!</div>';
    }

    if(!empty($res)){
        while($result = $res->fetch_array(MYSQLI_ASSOC)){
            if($title == $result['Titolo']){
                echo 2;
                $ok = false;
                break;
            }
        }
    }
    if($ok){
        $prepSt->execute();
        echo 1;
    }
    
    $connessione->close();
?>