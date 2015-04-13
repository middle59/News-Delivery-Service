<?php
        //The purpose of this file is to display a list of a customer's current publications along with available publications
        //This will allow adding and deleting publications from a customer's subscription
        //We should at this point have a customer's ID through a $_GET['customerID'] on whatever page calls this function
        //We have to use the absolute file path because this file will be used inside of other files which we dont know the path of.
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/Connect.php");

        $dbh = ConnectDB();

        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getCustomerIDPublications.php");
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getPublicationID.php");
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getAllPublications.php");



        //Display Publications for which the customer is currently subscribed to

        ?>
            <h2 class="sub-header">Currently Subscribed Publications</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                  <!-- Table header -->
                  <thead>
                    <tr>
                      <th>Publication ID #</th>
                      <th>Title</th>
                      <th>Cost</th>
                      <th>Schedule</th>
                    </tr>
                  </thead>
        <?php

        $subscriptionList = getCustomerIDPublications($_GET['customerID'], $dbh);
        if($subscriptionList != null)
        {
                $index = count($subscriptionList)-1;
                while ($index >= 0)
                {
                        $publication = getPublicationID($subscriptionList[$index], $dbh);

                        //We use 0 for each of these because the $publication only ever contains 1 result which is found in index 0
                        $publicationID = $publication[0]->PublicationID;
                        $title = $publication[0]->Title;
                        $cost = $publication[0]->Cost;
                        $schedule = $publication[0]->Schedule;
                        
                        ?>
                        <tbody>
                        <tr>
                        <td><?php echo $publicationID; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $cost; ?></td>
                        <td><?php echo $schedule . '<a href="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/unsubscribePublication.php?CustomerID=' . $_GET['customerID'] . 
                            '&PublicationID=' . $publicationID . '">
                            <span title="Unsubscribe" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span></a>'; ?></td>
                        </tr>

                        <?php

                        $index--;
                }
        }
        else
        {
            echo "<td>This customer has no subscriptions.</td>";
        }
        ?>
                    </tbody>
                </table>
            </div>

        <?php
        //Just display all available Publications we can add to a customer
        $result = getAllPublications($dbh);
        ?>
            <h2 class="sub-header">Available Publications</h2>
            <div class="table-responsive">
            <table class="table table-striped">
              <!-- Table header -->
              <thead>
                <tr>
                  <th>Publication ID #</th>
                  <th>Title</th>
                  <th>Cost</th>
                  <th>Schedule</th>
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
                        $publicationID = $result[$index]->PublicationID;
                        $title = $result[$index]->Title;
                        $cost = $result[$index]->Cost;
                        $schedule = $result[$index]->Schedule;
                        
                        ?>
                        <tbody>
                        <tr>
                        <td><?php echo $publicationID; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $cost; ?></td>
                        <td><?php echo $schedule . '<a href="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/addSubscription.php?CustomerID=' . $_GET['customerID'] . 
                            '&PublicationID=' . $publicationID . '">
                            <span title="Subscribe" class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span></a>'; ?></td>
                        </tr>

                        <?php

                        $index--;
                }
        }
        else
        {
                echo "<td>No publications were found in the database.</td>";
        }
        ?>
            </tbody>
        </table>
    </div>

