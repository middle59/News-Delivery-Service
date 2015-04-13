<?php
        /*Returns PublicationIDList from a given customer's ID
        * This is a string which will be handled into an array of Publication ID numbers
        * It can then be looped and given to getPublicationID and displayed
        */

        function getCustomerIDPublications($id, $dbh)
        {
                try
                {
                        $query = "SELECT PublicationIDList FROM nds_customer WHERE CustomerID=:id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                        
                        $return = null; //id was not in database or no publications added yet
                        if ($result[0]->PublicationIDList != "")
                        {
                                $return = explode(",",$result[0]->PublicationIDList); //there should only be one result, the customer we are identifying
                        }

                        return $return;

                }
                catch (PDOException $e)
                {
                        return null; //Query Error
                }

        }

?>

