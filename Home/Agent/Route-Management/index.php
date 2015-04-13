<!doctype html>
<!-- Software Engineering Team 8 -->
<!-- Last Update: 3/32/15 -->
<!-- Agent Dashboard Page | Route Management -->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agent | Route Mangement</title>

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
            <li class="active"><a href="#">Route Management<span class="sr-only">(current)</span></a></li>
            <li><a href="../Delivery-Account-Management/">Delivery Account Management</a></li>
            <li><a href="../Customer-Management/">Customer Management</a></li>
            <li><a href="../Publication-Management/">Publication Management</a></li>
          </ul>
        </div>
	<!-- END NAVIGATION - SIDEBAR -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Route Management</h1>
          
          <h2 class="sub-header">Add New Route</h2>
	         <!-- START FORUM - ADD CUSTOMER -->
           <form name="addRoute" class="form-horizontal" method="post" action="../../../utilities/database/addRoute.php">
                     
                    <!-- Title field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="routeName" id="routeName" placeholder="Name/Title" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!--Triggers 'Post' action -->
                    <div class="col-md-4 text-center">
                      <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
                <!-- END FORUM - ADD CUSTOMER -->

                <h2 class="sub-header">Route List</h2>
                <!-- START TABLE - CUSTOMER LIST -->
                <?php
                      include('../../../utilities/ui/displayAllRoutes.php');
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

