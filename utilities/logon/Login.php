<?php
        require_once("./verifyLogin.php");
        require_once("./getUserAccountLevel.php");
        require_once("../database/Connect.php");
        $dbh = ConnectDB();
        
        if (verifyLogin($_POST['username'], md5($_POST['password']), $dbh) == true) //md5 the password here, we dont want to send over server the real password
        {
                //session_start();
                //setcookie("username", $username, time() + 60 * 60 * 24, "/");
                //setcookie("user_id", $user_id, time() + 60 * 60 * 24, "/");
                $accountLevel = getUserAccountLevel($_POST['username'], $dbh);
                if($accountLevel == 1)//Agent
                {
                        header("Location: ../../Home/Agent/"); //Change this later to direct user based on account level
                }
                elseif ($accountLevel == 2) 
                {
                        header("Location: ../../Home/Delivery/");
                }
                else
                {
                     header("Location: ../../index.php?failed=true"); //Could not determine proper account Level   
                }
        }
        else
        {
                header("Location: ../../index.php?failed=true");
        }
?>