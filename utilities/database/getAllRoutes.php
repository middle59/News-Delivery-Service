<?php
        /*Returns all routes found in nds_route
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');

        function getAllPublications($dbh)
        {
                try
                {
                        $query = "SELECT * FROM nds_route";
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

