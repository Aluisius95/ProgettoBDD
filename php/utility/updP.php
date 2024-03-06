<?php
    require_once("conn.php");
    session_start();

    $premium = 1;
    $uID = $_SESSION['id'];
    $ccnumber = $connessione->real_escape_string($_POST['credit_card']);
    $cvc = $connessione->real_escape_string($_POST['cvc']);
    $exmonth = $connessione->real_escape_string($_POST['month']);
    $exyear = $connessione->real_escape_string($_POST['year']);
    $ccname = $connessione->real_escape_string($_POST['titolare']);
    
    $sql = "UPDATE utente SET premium='$premium', carta_di_credito='$ccnumber', cvc='$cvc', ccmonth='$exmonth', ccyear='$exyear', ccname='$ccname' WHERE utente.id = $uID";

    

    if($ccnumber != '' && $cvc != '' && $exmonth != '' && $exyear != '' && $ccname != ''){
        if ($connessione->query($sql) !== true) {
            echo "Errore durante registrazione " . $connessione->error;
        } else {
            echo 1;
        }
    } else {
        echo 2;
    }
?>

