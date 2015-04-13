<?php
        /*
        *  Returns the Account level a user
        */
	
        function getUserAccountLevel($Username, $dbh)
        {
                try
                {
                        $accountLevel = -1; //-1 indicates a problem
                        $query = "SELECT * FROM nds_user WHERE Username= :Username LIMIT 1";
                        $stmt = $dbh->prepare($query);
                        $stmt->bindParam('Username', $Username, PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                        if(count($result) != 0)//There are results
                        {
                                $accountLevel = $result[0]->AccountLevel; //0 Is the index of the first entry
                        }
                        return $accountLevel;
                }
                catch (PDOException $e)
                {
                        die ('PDO error' . $e->getMessage()); //Query Error
                }

        }
?>

