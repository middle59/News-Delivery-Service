<?php
        /*Returns all accounts in nds_user
        */

        function getAllAccounts($dbh)
        {
                try
                {
                        $query = "SELECT * FROM nds_user";
                        $stmt = $dbh->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                        return $result;

                }
                catch (PDOException $e)
                {
                        return null; //Query Error
                }

        }
?>

