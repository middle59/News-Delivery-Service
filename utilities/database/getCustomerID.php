<?php
        /*Returns a customer given its corresponding ID in the database
        */

        function getCustomerID($id, $dbh)
        {
                try
                {
                        $query = "SELECT * FROM nds_customer WHERE CustomerID=:id";
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

