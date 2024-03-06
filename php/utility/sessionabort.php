<?php

    //chiusura della sessione in logout

    require_once("check_login.php");
    check_login();
    session_destroy();
    echo 1;
?>