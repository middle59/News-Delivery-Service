<?php
        /*Creates a Delivery User along with their account
        */
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function createDeliveryAccount($AccountName, $AccountEmail, $AccountPassword, $dbh)
        {
                try
                {
                        $getMax = 'SELECT MAX(AccountID) AS intMax FROM nds_user';
                        $st = $dbh->prepare($getMax);
                        $st->execute();
                        $result = $st->fetch(PDO::FETCH_ASSOC);
                        $id = $result['intMax']+1;

                        if (empty($id)) 
                        {
                            $id = 0;
                        }

                        $query = "INSERT INTO nds_user VALUES(:id, :AccountName, :AccountPassword, :AccountEmail, 2)"; //2 Indicates the account level to be Deliverer
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('AccountName', $AccountName, PDO::PARAM_STR);
                        $stmt->bindParam('AccountPassword', $AccountPassword, PDO::PARAM_STR);
                        $stmt->bindParam('AccountEmail', $AccountEmail, PDO::PARAM_STR);
                        $stmt->execute();

                        return $id; //return the account id so we can add it to the user's AccountID field
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Delivery-Account-Management/index.php?accountCreated='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        function createDeliveryUser($Name, $AccountID, $dbh)
        {
                try
                {
                        $getMax = 'SELECT MAX(DelID) AS intMax FROM nds_del_user';
                        $st = $dbh->prepare($getMax);
                        $st->execute();
                        $result = $st->fetch(PDO::FETCH_ASSOC);
                        $id = $result['intMax']+1;

                        if (empty($id)) 
                        {
                            $id = 0;
                        }

                        $query = 'INSERT INTO nds_del_user VALUES(:id, :Name, "", :AccountID)'; //Double qoutes is for an unassigned route
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('Name', $Name, PDO::PARAM_STR);
                        $stmt->bindParam('AccountID', $AccountID, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Delivery-Account-Management/index.php?successful='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Delivery-Account-Management/index.php?delUserCreated='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }


        if($_POST['accountPassword'] == $_POST['verifyAccountPassword']) //only if the passwords match will we create the account
        {
            $accountID = createDeliveryAccount($_POST['accountName'], $_POST['accountEmail'], md5($_POST['accountPassword']), $dbh);
            createDeliveryUser($_POST['delName'], $accountID, $dbh);
        }
        else
        {
            header("Location: ../../Home/Agent/Delivery-Account-Management/index.php?passwordsMatch='false'");
        }

?>

