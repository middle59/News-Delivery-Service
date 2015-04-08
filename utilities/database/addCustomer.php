<?php
        /*Adds a customer to the database
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');
	
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function addCustomer($Name, $Address, $Zip, $Phone, $dbh)
        {
                try
                {
                        $getMax = 'SELECT MAX(CustomerID) AS intMax FROM nds_customer';
                        $st = $dbh->prepare($getMax);
                        $st->execute();
                        $result = $st->fetch(PDO::FETCH_ASSOC);
                        $id = $result['intMax']+1;

                        if (empty($id)) 
                        {
                            $id = 0;
                        }

                        $query = "INSERT INTO nds_customer VALUES(:id, :Name, :Address, :Zip, :Phone, '', '', false)";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('Name', $Name, PDO::PARAM_STR);
                        $stmt->bindParam('Address', $Address, PDO::PARAM_STR);
                        $stmt->bindParam('Zip', $Zip);
                        $stmt->bindParam('Phone', $Phone, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Customer-Management/index.php?customerAdded='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Customer-Management/index.php?customerAdded='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        addCustomer($_POST['customerName'], $_POST['customerAddress'], $_POST['customerZip'], $_POST['customerPhone'], $dbh);

?>

