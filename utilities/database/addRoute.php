<?php
        /*Adds a route to nds_route
        */
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function addRoute($Name, $dbh)
        {
                try
                {
                        $getMax = 'SELECT MAX(RouteID) AS intMax FROM nds_route';
                        $st = $dbh->prepare($getMax);
                        $st->execute();
                        $result = $st->fetch(PDO::FETCH_ASSOC);
                        $id = $result['intMax']+1;

                        if (empty($id)) 
                        {
                            $id = 0;
                        }

                        $query = 'INSERT INTO nds_route VALUES(:id, "", :Name)';
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('Name', $Name, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Route-Management/index.php?routeAdded='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Route-Management/index.php?routeAdded='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        addRoute($_POST['routeName'], $dbh);

?>

