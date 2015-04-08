<?php
        //Creates HTML for each customer found in our database
        //This code is formatted into a table so it may directly be included into the HTML file where it is to be displayed.

        //We have to use the absolute file path because this file will be used inside of other files which we dont know the path of.
        require_once("/home/middle59/public_html/websites/NDS/utilities/database/Connect.php");

        $dbh = ConnectDB();

        require_once("/home/middle59/public_html/websites/NDS/utilities/database/getAllCustomers.php");

        $result = getAllCustomers($dbh);
        ?>
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
                        <td><?php echo $phone; ?></td>
                        <td><?php echo '<a href="" data-toggle="modal" data-target="#modifyCustomerID-' . $customerID . '">
                            <span title="Edit" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/deleteCustomer.php?id=' . $customerID . '">
                            <span title="Delete" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span></a>'?></td>
                        </tr>

                        <?php echo '<div class="modal fade" id="modifyCustomerID-' . $customerID . '" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">';
                        ?>
                            <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Edit Customer - <?php echo $name; ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                    <form action="http://elvis.rowan.edu/~middle59/websites/NDS/utilities/database/updateCustomer.php" method="POST" class="navbar-form navbar-left" role="form">
                                                            <?php echo '<input type="text" class="form-control" name="updateCustomerID" id="updateCustomerID" value="' . 
                                                                $customerID . '" required placeholder="Customer ID" readonly="readonly">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updateCustomerName" id="updateCustomerName" value="' . 
                                                                $name . '" required placeholder="Full Name">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updateCustomerAddress" id="updateCustomerAddress" value="' . 
                                                                $address . '" required placeholder="Address">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updateCustomerZip" id="updateCustomerZip" value="' . 
                                                                $zip . '" required placeholder="Zip">'; ?>
                                                            <?php echo '<input type="text" class="form-control" name="updateCustomerPhone" id="updateCustomerPhone" value="' . 
                                                                $phone . '" required placeholder="Phone">'; ?>
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
                echo "<p>No customers were found in the database.<p>";
        }
        ?>
                </tbody>
        </table>
</div>
