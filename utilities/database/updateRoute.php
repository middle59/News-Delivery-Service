<?php
        /*Updates the information on a route
        */
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function updateRoute($id, $Name, $dbh)
        {
                try
                {
                        $query = "UPDATE nds_route SET RouteName= :Name WHERE RouteID= :id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('Name', $Name, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Route-Management/index.php?routeUpdated='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Route-Management/index.php?routeUpdated='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        updateRoute($_POST['updateRouteID'], $_POST['updateRouteName'], $dbh);

?>

