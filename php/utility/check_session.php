<?php
    function check_session(){
        session_start();
        if(isset($_SESSION)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
?>