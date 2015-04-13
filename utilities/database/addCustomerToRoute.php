<?php
        /*Adds a customer to a route's CustomerIDList
        */
	
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function addCustomerToRoute($RouteID, $CustomerID, $dbh)
        {
                try
                {
                        $firstEntry = false;
                        $alreadyAdded = false;

                        //Before we add, we must see if there are any values already, if so we can add the delimiter
                        $query = "SELECT CustomerIDList FROM nds_route WHERE RouteID=:id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $RouteID);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                        if ($result[0]->CustomerIDList == "") 
                        {
                            $firstEntry = true;
                        }
                        
                        if(!$firstEntry)
                        {
                            //Now we must check if the customer is already in the string
                            $current = explode(",",$result[0]->CustomerIDList); //Split current list by delimiter
                            $index = count($current)-1;
                            while ($index >= 0 && $alreadyAdded == false)
                            {
                                    if($current[$index] == $CustomerID)
                                    {
                                        $alreadyAdded = true;
                                    }
                                    $index--;
                            }
                            $CustomerID = "," . $CustomerID; //Concat the delimiter
                        }

                        if(!$alreadyAdded)
                        {
                            $query = "UPDATE nds_route SET CustomerIDList=:customerIDList WHERE RouteID=:id";
                            $stmt = $dbh->prepare($query);
                            $stmt->bindParam('id', $RouteID);
                            $updatedCustomerIDList = $result[0]->CustomerIDList . $CustomerID; //Concat old idList with the one to be added
                            $stmt->bindParam('customerIDList', $updatedCustomerIDList, PDO::PARAM_STR);
                            $stmt->execute();

                            header('Location: ' . $_SERVER['HTTP_REFERER']); //We should save previous page in a cookie and go back to there instead of using this
                        }
                        else
                        {
                            header('Location: ' . $_SERVER['HTTP_REFERER']); //Should be different from the one above, append that customer is already subscribed to PublicationID
                        }
                }
                catch (PDOException $e)
                {
                        header('Location: ' . $_SERVER['HTTP_REFERER']); //For now just send user back, later append an error
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        addCustomerToRoute($_GET['RouteID'], $_GET['CustomerID'], $dbh);

?>

