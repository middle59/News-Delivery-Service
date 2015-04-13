<?php
        /*Adds a publication to a customer's PublicationIDList
        */
	
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function addSubscription($CustomerID, $PublicationID, $dbh)
        {
                try
                {
                        $firstEntry = false;
                        $alreadySubscribed = false;

                        //Before we add, we must see if there are any values already, if so we can add the delimiter
                        $query = "SELECT PublicationIDList FROM nds_customer WHERE CustomerID=:id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $CustomerID);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                        if ($result[0]->PublicationIDList == "") 
                        {
                            $firstEntry = true;
                        }
                        
                        if(!$firstEntry)
                        {
                            //Now we must check if the subscription is already in the string
                            $current = explode(",",$result[0]->PublicationIDList); //Split current list by delimiter
                            $index = count($current)-1;
                            while ($index >= 0 && $alreadySubscribed == false)
                            {
                                    if($current[$index] == $PublicationID)
                                    {
                                        $alreadySubscribed = true;
                                    }
                                    $index--;
                            }
                            $PublicationID = "," . $PublicationID; //Concat the delimiter
                        }

                        if(!$alreadySubscribed)
                        {
                            $query = "UPDATE nds_customer SET PublicationIDList=:publicationIDList WHERE CustomerID=:id";
                            $stmt = $dbh->prepare($query);
                            $stmt->bindParam('id', $CustomerID);
                            $updatedPublicationIDList = $result[0]->PublicationIDList . $PublicationID; //Concat old idList with the one to be added
                            $stmt->bindParam('publicationIDList', $updatedPublicationIDList, PDO::PARAM_STR);
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

        addSubscription($_GET['CustomerID'], $_GET['PublicationID'], $dbh);

?>

