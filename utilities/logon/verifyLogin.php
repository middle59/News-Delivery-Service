<?php
        /*Verifies a user's login by taking in variables for thier username
        *And password.
        *Returns a boolean of the success.
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');

        require_once("../database/Connect.php");
        $dbh = ConnectDB();
	
        function verifyLogin($username, $hashPass)
        {
                try
                {
                        $query = "SELECT * " . "FROM nds_users " . "WHERE Username= :username " . "LIMIT 1";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('username', $username, PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                        if (count($result) != 1) //Username was not found in database, if found there should only be one instance
                        {
                                return false;
                        }

                        if (password_verify($hashPass, $result[0]->password))
                        {
                                return true;
                        }
                        else
                        {
                                return false; //Password didnt match
                        }
                }
                catch (PDOException $e)
                {
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }
?>

