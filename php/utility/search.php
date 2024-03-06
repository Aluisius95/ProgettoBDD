<?php
    require_once("conn.php");
    session_start();

    $search = strtolower($_GET['search']);
    $regex = "/\b\w*($search)\w*\b/";

    $u = 0;
    $p = 0;
    $b = 0;


    if($search != ''){
        echo "<div class='tit'>Utenti trovati:</div>";
        $usr = "SELECT id, username FROM utente";
        $res1 = $connessione->query($usr);
        if($connessione->query($usr) === false){
            echo "Errore durante prelievo dati".$connessione->error;
        }
        while($result1 = $res1->fetch_array(MYSQLI_ASSOC)){ 
            if(preg_match($regex, strtolower($result1['username']))){
                if($_SESSION['id'] == $result1['id']){
                    echo "<a onclick='window.location.href=\"../php/profile.php\"'> -".$result1['username']."</a><br>";
                    $u++;
                } else {
                    echo "<a onclick='loadU(\"".$result1['username']."\");loadB(\"".$result1['username']."\")'> -".$result1['username']."</a><br>";
                    $u++;
                }
            }
        }
        if(!$u){echo "<div class='res'>0 utenti trovati con la seguente ricerca: ".$_GET['search']."</div>";}

        echo "<br><br><div class='tit'>Post trovati:</div>";
        $post = "SELECT id, id_user, titolo FROM elementi";
        $res2 = $connessione->query($post);
        if($connessione->query($post) === false){
            echo "Errore durante prelievo dati".$connessione->error;
        }
        while($result2 = $res2->fetch_array(MYSQLI_ASSOC)){
            if(preg_match($regex, strtolower($result2['titolo']))){
                if($_SESSION['id'] == $result2['id_user']){
                    echo "<a onclick='openPU(\"".$result2['id']."\")'> -".$result2['titolo']."</a><br>";
                    $p++;
                } else {
                    echo "<a onclick='openP(\"".$result2['id']."\")'> -".$result2['titolo']."</a><br>";
                    $p++;
                }
            }
        }
        if(!$p){echo "<div class='res'>0 post trovati con la seguente ricerca: ".$search."</div>";}//openP openPU

        echo "<br><br><div class='tit'>Blog trovati:</div>";
        $blog = "SELECT id, id_autore, Titolo FROM blog";
        $res3 = $connessione->query($blog);
        if($connessione->query($blog) === false){
            echo "Errore durante prelievo dati".$connessione->error;
        }
        while($result3 = $res3->fetch_array(MYSQLI_ASSOC)){
            if(preg_match($regex, strtolower($result3['Titolo']))){
                if($_SESSION['id'] == $result3['id_autore']){
                    echo "<a onclick='loadPU(\"".$result3['Titolo']."\")'> -".$result3['Titolo']."</a><br>";
                    $b++;
                } else {
                    echo "<a onclick='loadP(\"".$result3['Titolo']."\")'> -".$result3['Titolo']."</a><br>";
                    $b++;
                }
            }
        }
        if(!$b){
            echo "<div class='res'>0 blog trovati con la seguente ricerca: ".$search."</div>";
        }//loadP loadPU
    } else {
        echo '';
    }




?>
