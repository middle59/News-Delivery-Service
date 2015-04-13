<?php
        //The purpose of this file is to display a list of a route's current current customer list along with available customers
        //This will allow adding and deleting customers from the list
        //We should at this point have a route's ID through a $_GET['routeID'] on whatever page calls this function
        //We have to use the absolute file path because this file will be used inside of other files which we dont know the path of.
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/Connect.php");

        $dbh = ConnectDB();

        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getRouteIDCustomers.php");
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getCustomerID.php");
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getAllCustomers.php");


        //Display Publications for which the customer is currently subscribed to

        ?>
            <h2 class="sub-header">Current Customers On This Route</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                  <!-- Table header -->
                  <thead>
                    <tr>
                      <th>Customer ID #</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Zip</th>
                      <th>Phone</th>
                    </tr>
                  </thead>
        <?php

        $customerList = getRouteIDCustomers($_GET['routeID'], $dbh);
        if($customerList != null)
        {
                $index = count($customerList)-1;
                while ($index >= 0)
                {
                        $result = getCustomerID($customerList[$index], $dbh);

                        //We use 0 for each of these because the $publication only ever contains 1 result which is found in index 0
                        $customerID = $result[0]->CustomerID;
                        $name = $result[0]->Name;
                        $address = $result[0]->Address;
                        $zip = $result[0]->Zip;
                        $phone = $result[0]->Phone;
                        
                        ?>
                        <tbody>
                        <tr>
                        <td><?php echo $customerID; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $zip; ?></td>
                        <td><?php echo $phone . '<a href="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/removeCustomerFromRoute.php?RouteID=' . $_GET['routeID'] . 
                            '&CustomerID=' . $customerID . '">
                            <span title="Remove from Route" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span></a>'; ?></td>
                        </tr>

                        <?php

                        $index--;
                }
        }
        else
        {
            echo "<td>No customers are currently on this route.</td>";
        }
        ?>
                    </tbody>
                </table>
            </div>

        <?php
        //Just display all available customers we can add to a route
        $result = getAllCustomers($dbh);
        ?>
            <h2 class="sub-header">Available Customers</h2>
            <div class="table-responsive">
            <table class="table table-striped">
              <!-- Table header -->
              <thead>
                <tr>
                  <th>Customer ID #</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Zip</th>
                  <th>Phone</th>
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
                        $customerID = $result[$index]->CustomerID;
                        $name = $result[$index]->Name;
                        $address = $result[$index]->Address;
                        $zip = $result[$index]->Zip;
                        $phone = $result[$index]->Phone;
                        
                        ?>
                        <tbody>
                        <tr>
                        <td><?php echo $customerID; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $zip; ?></td>
                        <td><?php echo $phone . '<a href="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/addCustomerToRoute.php?RouteID=' . $_GET['routeID'] . 
                            '&CustomerID=' . $customerID . '">
                            <span title="Add to Route" class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span></a>'; ?></td>
                        </tr>

                        <?php

                        $index--;
                }
        }
        else
        {
                echo "<td>No customers were found in the database.</td>";
        }
        ?>
            </tbody>
        </table>
    </div>

