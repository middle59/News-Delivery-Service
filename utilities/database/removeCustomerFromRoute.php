<?php
        /*Remove a Customer from a RouteID's CustomerIDList
        * We will remove by getting the current list and creating a new list without the given CustomerID
        */
        require_once("./Connect.php");
        $dbh = ConnectDB();
        require_once("./getRouteIDCustomers.php");

        function unsubscribePublication($RouteID, $CustomerID, $dbh)
        {
                try
                {
                        $result = getRouteIDCustomers($RouteID, $dbh);
                        if($result != null) //Subscription list is empty so obviously we cant remove it..
                        {
                                $updatedCustomerIDList = "";
                                $index = count($result)-1;
                                while ($index >= 0)
                                {
                                        if($result[$index] != $CustomerID) //If the CustomerID isn't the one we are removing
                                        {
                                                if($updatedCustomerIDList != "") //If this isn't the first entry we need the delimiter
                                                {
                                                        $updatedCustomerIDList .= ",";
                                                }
                                                $updatedCustomerIDList .= $result[$index]; //Append the next customer ID
                                        }
                                        $index--;
                                }//Now we have are updated list so lets insert it

                                $query = "UPDATE nds_route SET CustomerIDList=:customerIDList WHERE RouteID=:id";
                                $stmt = $dbh->prepare($query);
                                $stmt->bindParam('id', $RouteID);
                                $stmt->bindParam('customerIDList', $updatedCustomerIDList, PDO::PARAM_STR);
                                $stmt->execute();
                        }

                        header('Location: ' . $_SERVER['HTTP_REFERER']); //We should save previous page in a cookie and go back to there instead of using this

                }
                catch (PDOException $e)
                {
                        header('Location: ' . $_SERVER['HTTP_REFERER']); //Query Error
                }

        }
        unsubscribePublication($_GET['RouteID'], $_GET['CustomerID'], $dbh);
?>

