<?php
        require_once("Connect.php");
        $dbh = ConnectDB();
	
        if (isset($_POST['email']))
        {
                try
                {
                        $query = "SELECT email, username, user_id, password " .
                                "FROM wk_users " .
                                "WHERE email= :email " .

			    "LIMIT 1";

                        $stmt = $dbh->prepare($query);

                        $email = $_POST['email'];
                        $stmt->bindParam('email', $email, PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                        $howmany = count($result);
			
			$username = $result[0]->username;
			$user_id = $result[0]->user_id;


                        if ($howmany != 1)
                        {
                                header("Location: ../login/home.php?failed=true");
			}
                        else
                        {
                                if (password_verify($_POST['password'], $result[0]->password))
                                {
					session_start();
					setcookie("username", $username, time() + 60 * 60 * 24, "/");
					setcookie("user_id", $user_id, time() + 60 * 60 * 24, "/");
                                        header("Location: ../Kingdom/Kingdom.php");
                                }
                                else
                                {
                                        header("Location: ../login/home.php?failed=true");
                                }
                        }
                }
                catch (PDOException $e)
                {
                        die ('PDO error' . $e->getMessage());
                }
        }
        else
        {
                echo "<p><i>(Error issue!)</i></p>\n";
        }
?>

