<?php
    require_once('conn.php');
    session_start();

    //registra il nuovo post controllando che non ne esista un omonimo per l'utente in sessione
    
    $prepSt = $connessione->prepare("INSERT INTO elementi(id_user, id_blog, titolo, testo, sottotema, premium, data_creazione) VALUES (?,?,?,?,?,?,?)");
    $prepSt->bind_param("iissiis", $_SESSION['id'], $blogid, $title, $testo, $subtheme, $premium, $time);

    $id = "SELECT id FROM blog WHERE Titolo = '" . $_POST['blog']. "';";
    $resID = $connessione->query($id);
    if($connessione->query($id) === false){
        echo "Errore nella query: " . $connessione->error;
    }
    $resl = $resID -> fetch_array(MYSQLI_ASSOC);
    
    $blogid = $resl['id'];
    $title = $_POST['title'];
    $subtheme = intval($_POST['subth']);
    $testo = $_POST['text'];
    $timestamp = strtotime("now");
    $time = date('Y/m/d H:i:s', $timestamp);
    $premium = 0;
    if($_POST['premium'] == 'on'){
      $premium = 1;
    }

    $sql = "SELECT titolo FROM elementi WHERE id_user =".$_SESSION['id'];
    $res = $connessione->query($sql);
    if($connessione->query($sql) === false){
        echo "Errore nella query: " . $connessione->error;
    }

    $ok = true;
    if($title == '' || $testo == ''){
        $ok=false;
        echo '<div>Completa i campi titolo o testo!</div>';
    }

    if(!empty($res)){
        while($result = $res->fetch_array(MYSQLI_ASSOC)){
            if($title == $result['titolo']){
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