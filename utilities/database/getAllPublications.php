<?php
        /*Returns all customers found in nds_customer
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');

        function getAllPublications($dbh)
        {
                try
                {
                        $query = "SELECT * FROM nds_publication";
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

