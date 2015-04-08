<?php
        /*Adds a customer to the database
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');
	
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function updateCustomer($id, $Name, $Address, $Zip, $Phone, $dbh)
        {
                try
                {

                        $query = "UPDATE nds_customer SET Name= :Name, Address= :Address, Zip= :Zip, Phone= :Phone WHERE CustomerID= :id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('Name', $Name, PDO::PARAM_STR);
                        $stmt->bindParam('Address', $Address, PDO::PARAM_STR);
                        $stmt->bindParam('Zip', $Zip, PDO::PARAM_STR);
                        $stmt->bindParam('Phone', $Phone, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Customer-Management/index.php?customerUpdated='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Customer-Management/index.php?customerUpdated='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        updateCustomer($_POST['updateCustomerID'], $_POST['updateCustomerName'], $_POST['updateCustomerAddress'], $_POST['updateCustomerZip'], $_POST['updateCustomerPhone'], $dbh);

?>

