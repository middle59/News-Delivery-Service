<?php
        //Creates HTML for each account found in our database
        //This code is formatted into a table so it may directly be included into the HTML file where it is to be displayed.

        //We have to use the absolute file path because this file will be used inside of other files which we dont know the path of.
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/Connect.php");

        $dbh = ConnectDB();

        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getAllAccounts.php");

        $result = getAllAccounts($dbh);
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
              <!-- Table header -->
              <thead>
                <tr>
                  <th>Account ID #</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Account Level</th>
                </tr>
              </thead>
        <?php

        if (count($result) != 0)
        {
                //Process results
                //For now we will start at the back and go down to 0 so most recent customer is on the top
                $index = count($result)-1;
                while ($index >= 0)
                {
                        $accountID = $result[$index]->AccountID;
                        $username = $result[$index]->Username;
                        $email = $result[$index]->Email;
                        $accountLevel = $result[$index]->AccountLevel;
                        
                        ?>
                        <tbody>
                        <tr>
                        <td><?php echo $accountID; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $accountLevel; ?></td>
                        </tr>

                        <?php

                        $index--;
                }
        }
        else
        {
                echo "<td>No accounts were found in the database.</td>";
        }
        ?>
                </tbody>
        </table>
</div>
