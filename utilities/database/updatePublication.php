<?php
        /*Updates the information on a publication
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');
	
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function updateCustomer($id, $Title, $Cost, $Schedule, $dbh)
        {
                try
                {

                        $query = "UPDATE nds_publication SET Title= :Title, Cost= :Cost, Schedule= :Schedule WHERE PublicationID= :id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('Title', $Title, PDO::PARAM_STR);
                        $stmt->bindParam('Cost', $Cost);
                        $stmt->bindParam('Schedule', $Schedule, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Publication-Management/index.php?publicationUpdated='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Publication-Management/index.php?publicationUpdated='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        updateCustomer($_POST['updatePublicationID'], $_POST['updatePublicationTitle'], $_POST['updatePublicationCost'], $_POST['updatePublicationSchedule'], $dbh);

?>

