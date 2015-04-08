<?php
        /*Updates subscriptions to a Customer ID
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');
	
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function updateCustomer($id, $subscriptions, $dbh)
        {
                try
                {

                        $query = "UPDATE nds_customer SET PublicationIDList= :subscriptions WHERE CustomerID= :id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('subscriptions', $subscriptions, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Customer-Management/index.php?subscriptionsUpdated='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Customer-Management/index.php?subscriptionsUpdated='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        updateCustomer($_POST['updateCustomerID'], $_POST['updateSubscriptions'], $dbh);

?>

