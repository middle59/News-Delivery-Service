<?php
        /*Delete a customer from the database given their ID
        */
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function deleteCustomer($id, $dbh)
        {
                try
                {
                        $query = "DELETE FROM nds_customer WHERE CustomerID=:id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Customer-Management/index.php?customerDeleted='true'");

                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Customer-Management/index.php?customerDeleted='false'"); //Query Error
                }

        }
        deleteCustomer($_GET['id'], $dbh);
?>

