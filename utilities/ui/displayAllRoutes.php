<?php
        //Creates HTML for each customer found in our database
        //This code is formatted into a table so it may directly be included into the HTML file where it is to be displayed.

        //We have to use the absolute file path because this file will be used inside of other files which we dont know the path of.
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/Connect.php");

        $dbh = ConnectDB();

        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getAllRoutes.php");

        $result = getAllPublications($dbh);
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
              <!-- Table header -->
              <thead>
                <tr>
                  <th>Route ID #</th>
                  <th>Name</th>
                  <th>Customer List</th>
                  <th>Modify</th>
                </tr>
              </thead>
        <?php

        if (count($result) != 0)
        {
                //Process results
                //For now we will start at the back and go down to 0 so most recent route is on the top
                $index = count($result)-1;
                while ($index >= 0)
                {
                        $routeID = $result[$index]->RouteID;
                        $title = $result[$index]->RouteName;
                        
                        ?>
                        <tbody>
                        <tr>
                        <td><?php echo $routeID; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo '<a href="./Customers?routeID=' . $routeID . '&routeName=' . $title . '">
                            <span title="Manage Customers" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>'; ?></td>
                        <td><?php echo '<a href="" data-toggle="modal" data-target="#modifyRouteID-' . $routeID . '">
                            <span title="Edit" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'?></td>
                        </tr>

                        <?php echo '<div class="modal fade" id="modifyRouteID-' . $routeID . '" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">';
                        ?>
                            <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Edit Route - <?php echo $title; ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                    <form action="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/updateRoute.php" method="POST" class="navbar-form navbar-left" role="form">
                                                            <?php echo '<input type="text" class="form-control" name="updateRouteID" id="updateRouteID" value="' . 
                                                                $routeID . '" required placeholder="Customer ID" readonly="readonly">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updateRouteName" id="updateRouteName" value="' . 
                                                                $title . '" required placeholder="Title/Name">'; ?>
                                                            <br>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-default">Update</button>
                                                            </div>
                                                    </form>
                                                    <br>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                    </div>
                            </div>
                        </div>

                        <?php

                        $index--;
                }
        }
        else
        {
                echo "<td>No routes were found in the database.</td>";
        }
        ?>
                </tbody>
        </table>
</div>
