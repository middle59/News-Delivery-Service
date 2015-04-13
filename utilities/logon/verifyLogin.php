<?php
        /*Verifies a user's login by taking in variables for thier username
        *And password.
        *Returns a boolean of the success.
        */
	
        function verifyLogin($Username, $HashPass, $dbh)
        {
                try
                {
                        $query = "SELECT * " . "FROM nds_user " . "WHERE Username= :Username " . "LIMIT 1";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('Username', $Username, PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                        if (count($result) != 1) //Username was not found in database, if found there should only be one instance
                        {
                                return false;
                        }

                        if ($HashPass == $result[0]->HashPass)
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

