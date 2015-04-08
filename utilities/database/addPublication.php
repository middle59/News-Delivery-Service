<?php
        /*Adds a publication to nds_publication
        */
        error_reporting(E_All);
        ini_set('display_errors', '1');
	
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function addCustomer($Title, $Cost, $Schedule, $dbh)
        {
                try
                {
                        $getMax = 'SELECT MAX(PublicationID) AS intMax FROM nds_publication';
                        $st = $dbh->prepare($getMax);
                        $st->execute();
                        $result = $st->fetch(PDO::FETCH_ASSOC);
                        $id = $result['intMax']+1;

                        if (empty($id)) 
                        {
                            $id = 0;
                        }

                        $query = "INSERT INTO nds_publication VALUES(:id, :Title, :Cost, :Schedule)";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->bindParam('Title', $Title, PDO::PARAM_STR);
                        $stmt->bindParam('Cost', $Cost);
                        $stmt->bindParam('Schedule', $Schedule, PDO::PARAM_STR);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Publication-Management/index.php?publicationAdded='true'");
                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Publication-Management/index.php?publicationAdded='false'");
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }

        addCustomer($_POST['publicationTitle'], $_POST['publicationCost'], $_POST['publicationSchedule'], $dbh);

?>

