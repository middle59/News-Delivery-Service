<!doctype html>
<!-- Software Engineering Team 8 -->
<!-- Last Update: 2/18/15 -->
<!-- Agent Dashboard Page | Customer Management -->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agent | Customer Mangement</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	

    <!-- Custom styles for this template - Specific to the dashboard-->
    <link href="../../../css/Dashstyle.css" rel="stylesheet">

  </head>

  <body>
    <!-- Current reference links direct to '#' until a page is created for them. This is static and refers to the current page -->


    <!-- START NAVIGATION - HEADER -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">News Delivery System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Log Out</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
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
            <li><a href="">Delivery Account Management</a></li>
            <li class="active"><a href="#">Customer Management <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
	<!-- END NAVIGATION - SIDEBAR -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Customer Management</h1>
          
          <h2 class="sub-header">Add Customer</h2>
	         <!-- START FORUM - ADD CUSTOMER -->
           <form name="addCustomer" class="form-horizontal" method="post" action="../../../utilities/database/addCustomer.php">
                     
                    <!-- Name field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="customerName" id="customerName" placeholder="Full Name" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!-- Address field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="customerAddress" id="customerAddress" placeholder="Address" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!-- Zip Code field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="customerZip" id="customerZip" placeholder="Zip Code" maxlength="50" size="30" required>
                        </div>
                        <div class="col-md-2"><span id="nameValidArea"></span>
                        </div>
                      </div> 
                    </div>

                    <!-- Phone Number field -->
                    <div class="row">
                       <div class="form-group">
                        <div class="col-md-4">
                          <input  type="text" class="form-control " name ="customerPhone" id="customerPhone" placeholder="Phone Number" maxlength="50" size="30" required>
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

