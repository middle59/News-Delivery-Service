<?php
        /*Returns a publication given its corresponding ID in the database
        */

        function getPublicationID($id, $dbh)
        {
                try
                {
                        $query = "SELECT * FROM nds_publication WHERE PublicationID=:id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
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

