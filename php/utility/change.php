<?php

require_once('conn.php');
session_start();
$username = $_POST['usr'];
$pasw = $_POST['psw'];
$newP = $_POST['pswN'];
$newPC = $_POST['pswNC'];

$old = "SELECT password FROM utente WHERE id = " . $_SESSION['id'];
$res = $connessione->query($old);
$result = $res->fetch_array(MYSQLI_ASSOC);

$che = [false, false];
$reUser = "/^\w*[<>]+\w*[<>]+$/";
$rePsw = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&\.])[A-Za-z\d$@$!%*#?&\.]{8,16}$/";

if($result['password'] === md5(md5($pasw))){
    if(!empty($username) || (!empty($newP) && !empty($newPC))){
        if(!empty($username)){
            $user = "SELECT username FROM utente WHERE username = '$username' ";
            $res1 = $connessione->query($user);
            if($connessione->query($user) === false){
                echo "Errore durante prelievo dati".$connessione->error;
            }
            $result1 = $res1->fetch_array(MYSQLI_ASSOC);
            if(!empty($result1) && in_array($username, $result1)){
                echo "Username già in uso!";
            } else if(preg_match($reUser, $username) == 1){
                echo "Caratteri non validi nello username!";
            } else if (strlen($username) < 5 || strlen($username) > 18){
                echo "Lo username deve essere tra 5 e 18 caratteri!";
            } else {
                $uusr = "UPDATE `utente` SET `username` = '" . $username . "' WHERE `utente`.`id` =" . $_SESSION['id'];
                $connessione->query($uusr);
                $che[0] = true;
            }
        }
        if(!empty($newP) && !empty($newPC)){
            $user = "SELECT username FROM utente WHERE id = ". $_SESSION['id'];
            $res = $connessione->query($user);
            if($connessione->query($user) === false){
                echo "Errore durante prelievo dati".$connessione->error;
            }
            $result = $res->fetch_array(MYSQLI_ASSOC);

            if ($newP == $pasw) {
                echo "Vecchia e nuova password coincidono!";
            } else if ($newP != $newPC){
                echo "Le nuove password non coincidono!";
            } else if ($newP == $username || $newP == $result['username']){
                echo "La nuova password non può essere uguale allo username!";
            } else if (preg_match($rePsw, $newP) == 0){
                echo "La password deve contenere una maiuscola, minuscola, un numero e un simbolo ed essere compresa tra 8 e 16 caratteri!";
            } else {
                $upsw = "UPDATE `utente` SET `password` = '" . md5(md5($newP)) . "' WHERE `utente`.`id` =" . $_SESSION['id'];
                $connessione->query($upsw);
                $che[1] = true;
            }
        }

    }
}

if($che[0] && $che[1]){
    echo 3;
} else if ($che[0] && !$che[1]){
    echo 1;
} else if (!$che[0] && $che[1]){
    echo 2;
}
$connessione->close();
?>