<!doctype html>
<!-- Software Engineering Team 8 -->
<!-- Last Update: 2/18/15 -->
<!-- Agent Dashboard Page | Delivery-Account Management -->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agent | Delivery-Account Mangement</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	

    <!-- Custom styles for this template - Specific to the dashboard-->
    <link href="../../../css/Dashstyle.css" rel="stylesheet">

  </head>

  <body>
    <!-- Current reference links direct to '#' until a page is created for them. This is static and refers to the current page -->


    <!-- START NAVIGATION - HEADER -->
    <?php
        require_once("../static/navigation-header.php")
    ?>
    <!-- END NAVIGATION - HEADER -->

    <!-- Contains and organizes the remaining page -->
    <div class="container-fluid">
      <div class="row">
	<!-- START NAVIGATION - SIDEBAR -->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="../">Overview</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Delivery History</a></li>
            <li><a href="#">View Requests</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Route</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="../Route-Management/">Route Management</a></li>
            <li class="active"><a href="">Delivery Account Management <span class="sr-only">(current)</span></a></li>
            <li><a href="../Customer-Management/">Customer Management</a></li>
            <li><a href="../Publication-Management/">Publication Management</a></li>
          </ul>
        </div>
	<!-- END NAVIGATION - SIDEBAR -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Delivery-Account Management</h1>
          
          <h2 class="sub-header">Create a New Account for Deliverers</h2>
	         <!-- START FORUM - ADD CUSTOMER -->
           <form name="createDeliveryAccount" class="form-horizontal" method="post" action="../../../utilities/database/createDeliveryAccount.php">
                     
                    <!-- Username field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="accountName" id="accountName" placeholder="Username" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!-- Email field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="accountEmail" id="accountEmail" placeholder="Email" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!-- Password field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="password" class="form-control " name ="accountPassword" id="accountPassword" placeholder="Password" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!-- Verify Password field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="password" class="form-control " name ="verifyAccountPassword" id="verifyAccountPassword" placeholder="Verify Password" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <br>
                    <h3>Account User Info<h3>
                    <hr>
                    <br>

                    <!-- Deliverer's Name field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="delName" id="delName" placeholder="Full Name" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!--Triggers 'Post' action -->
                    <div class="col-md-4 text-center">
                      <input type="submit" class="btn btn-success" value="Create">
                    </div>
                </form>
                <!-- END FORUM - ADD CUSTOMER -->

                <h2 class="sub-header">Account List</h2>
                <!-- START TABLE - CUSTOMER LIST -->
                <?php
                      include('../../../utilities/ui/displayAllAccounts.php');
                ?>
                <!-- END TABLE - CUSTOMER LIST --> 
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Local files also load quicker -->
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

