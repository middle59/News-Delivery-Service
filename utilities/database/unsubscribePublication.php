<?php
        /*Remove a PublicationID from a CustomerID's PublicationIDList
        * We will remove by getting the current list and creating a new list without the given PublicationID
        */
        require_once("./Connect.php");
        $dbh = ConnectDB();
        require_once("./getCustomerIDPublications.php");

        function unsubscribePublication($CustomerID, $PublicationID, $dbh)
        {
                try
                {
                        $result = getCustomerIDPublications($CustomerID, $dbh);
                        if($result != null) //Subscription list is empty so obviously we cant remove it..
                        {
                                $updatedPublicationIDList = "";
                                $index = count($result)-1;
                                while ($index >= 0)
                                {
                                        if($result[$index] != $PublicationID) //If the PublicationID isn't the one we are removing
                                        {
                                                if($updatedPublicationIDList != "") //If this isn't the first entry we need the delimiter
                                                {
                                                        $updatedPublicationIDList .= ",";
                                                }
                                                $updatedPublicationIDList .= $result[$index]; //Append the next publication ID
                                        }
                                        $index--;
                                }//Now we have are updated list so lets insert it

                                $query = "UPDATE nds_customer SET PublicationIDList=:publicationIDList WHERE CustomerID=:id";
                                $stmt = $dbh->prepare($query);
                                $stmt->bindParam('id', $CustomerID);
                                $stmt->bindParam('publicationIDList', $updatedPublicationIDList, PDO::PARAM_STR);
                                $stmt->execute();
                        }

                        header('Location: ' . $_SERVER['HTTP_REFERER']); //We should save previous page in a cookie and go back to there instead of using this

                }
                catch (PDOException $e)
                {
                        header('Location: ' . $_SERVER['HTTP_REFERER']); //Query Error
                }

        }
        unsubscribePublication($_GET['CustomerID'], $_GET['PublicationID'], $dbh);
?>

