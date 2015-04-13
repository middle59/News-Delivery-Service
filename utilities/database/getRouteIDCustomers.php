<?php
        /*Returns CustomerIDList from a given route's ID
        * This is a string which will be handled into an array of Customer ID numbers
        * It can then be looped and given to getCustomerID and displayed
        */

        function getRouteIDCustomers($id, $dbh)
        {
                try
                {
                        $query = "SELECT CustomerIDList FROM nds_route WHERE RouteID=:id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                        
                        $return = null; //id was not in database or no publications added yet
                        if ($result[0]->CustomerIDList != "")
                        {
                                $return = explode(",",$result[0]->CustomerIDList); //there should only be one result, the customer we are identifying
                        }

                        return $return;

                }
                catch (PDOException $e)
                {
                        return null; //Query Error
                }

        }

?>

