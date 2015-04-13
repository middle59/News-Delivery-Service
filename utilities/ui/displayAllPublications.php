<?php
        //Creates HTML for each customer found in our database
        //This code is formatted into a table so it may directly be included into the HTML file where it is to be displayed.

        //We have to use the absolute file path because this file will be used inside of other files which we dont know the path of.
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/Connect.php");

        $dbh = ConnectDB();

        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getAllPublications.php");

        $result = getAllPublications($dbh);
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
              <!-- Table header -->
              <thead>
                <tr>
                  <th>Publication ID #</th>
                  <th>Title</th>
                  <th>Cost</th>
                  <th>Schedule</th>
                  <th>Modify</th>
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
                        <td><?php echo $schedule; ?></td>
                        <td><?php echo '<a href="" data-toggle="modal" data-target="#modifyPublicationID-' . $publicationID . '">
                            <span title="Edit" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/deletePublication.php?id=' . $publicationID . '">
                            <span title="Delete" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span></a>'?></td>
                        </tr>

                        <?php echo '<div class="modal fade" id="modifyPublicationID-' . $publicationID . '" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">';
                        ?>
                            <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Edit Publication - <?php echo $title; ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                    <form action="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/updatePublication.php" method="POST" class="navbar-form navbar-left" role="form">
                                                            <?php echo '<input type="text" class="form-control" name="updatePublicationID" id="updateCustomerID" value="' . 
                                                                $publicationID . '" required placeholder="Customer ID" readonly="readonly">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updatePublicationTitle" id="updatePublicationTitle" value="' . 
                                                                $title . '" required placeholder="Full Name">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updatePublicationCost" id="updatePublicationCost" value="' . 
                                                                $cost . '" required placeholder="Address">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updatePublicationSchedule" id="updatePublicationSchedule" value="' . 
                                                                $schedule . '" required placeholder="Zip">'; ?>
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
                echo "<td>No publications were found in the database.</td>";
        }
        ?>
                </tbody>
        </table>
</div>
