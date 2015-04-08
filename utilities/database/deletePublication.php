<?php
        /*Delete a publication from the database given their ID
        */
        require_once("./Connect.php");
        $dbh = ConnectDB();

        function deleteCustomer($id, $dbh)
        {
                try
                {
                        $query = "DELETE FROM nds_publication WHERE PublicationID=:id";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('id', $id);
                        $stmt->execute();

                        header("Location: ../../Home/Agent/Publication-Management/index.php?publicationDeleted='true'");

                }
                catch (PDOException $e)
                {
                        header("Location: ../../Home/Agent/Publication-Management/index.php?publicationDeleted='false'"); //Query Error
                }

        }
        deleteCustomer($_GET['id'], $dbh);
?>

