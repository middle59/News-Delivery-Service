<?php
        require_once("./verifyLogin.php");
        require_once("../database/Connect.php"); //Are we already connected if we set this in another fi
        $dbh = ConnectDB();
        
        if (verifyLogin($_POST['username'], $_POST['password'], $dbh) == true)
        {
                //session_start();
                //setcookie("username", $username, time() + 60 * 60 * 24, "/");
                //setcookie("user_id", $user_id, time() + 60 * 60 * 24, "/");
                header("Location: ../../Home/Agent/"); //Change this later to direct user based on account level
        }
        else
        {
                header("Location: ../../index.php?failed=true");
        }
?>