<?php
    //Questa funzione serve a verificare che il log-in
    //sia ancora attivo, in maniera da permettere la navigazione
    //o l'eventuale reindirizzamento all'index.php
    function check_login() {
        require_once('check_session.php');
        require_once('conn.php');
        //utilizzo una semplice funzione di verifica per vedere se la sessione è settata, altrimenti torno indietro
        if (!check_session()){
            header("location: ../index.php");
        }

        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];

        $dbsel = "SELECT username, email, id FROM utente WHERE username = '$username' AND email = '$email' AND id = '$id'";
        $res = $connessione->query($dbsel);
        if(is_null($res) || !$res){
            header("location: ../php/index.php");
        }
        $result = $res->fetch_array(MYSQLI_NUM);

        if(!$result || !count($result)){
            header("location: ../php/index.php");
        }
    }
?>
