<?php
        include(verifyLogin.php);

        if (verifyLogin($_POST($username), $_POST($password)) == true)
        {
                //session_start();
                //setcookie("username", $username, time() + 60 * 60 * 24, "/");
                //setcookie("user_id", $user_id, time() + 60 * 60 * 24, "/");
                header("Location: ../../Home/Delivery/");
        }
        else
        {
                header("Location: ../../index.php?failed=true");
        }
?>