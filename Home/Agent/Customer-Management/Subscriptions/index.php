<!doctype html>
<!-- Software Engineering Team 8 -->
<!-- Last Update: 3/32/15 -->
<!-- Agent Dashboard Page | Publication Management -->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agent | Subscriptions</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	

    <!-- Custom styles for this template - Specific to the dashboard-->
    <link href="../../../../css/Dashstyle.css" rel="stylesheet">

  </head>

  <body>
    <!-- Current reference links direct to '#' until a page is created for them. This is static and refers to the current page -->


    <!-- START NAVIGATION - HEADER -->
    <?php
        require_once("../../static/navigation-header.php")
    ?>
    <!-- END NAVIGATION - HEADER -->

    <!-- Contains and organizes the remaining page -->
    <div class="container-fluid">
      <div class="row">
	      <!-- START NAVIGATION - SIDEBAR -->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="../../">Overview</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Delivery History</a></li>
            <li><a href="#">View Requests</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Route</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="../../Route-Management/">Route Management</a></li>
            <li><a href="../../Delivery-Account-Management/">Delivery Account Management</a></li>
            <li class="active"><a href="../">Customer Management<span class="sr-only">(current)</span></a></li>
            <li ><a href="../../Publication-Management/">Publication Management</a></li>
          </ul>
        </div>
	      <!-- END NAVIGATION - SIDEBAR -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Subscription Management For <?php echo $_GET['customerName']?></h1>
        <!-- START MANAGE SUBSCRIPTIONS FOR CUSTOMER $_GET['customerID']-->   
        <?php
          include("../../../../utilities/ui/managePublications.php");
        ?>
        <!-- END MANAGE SUBSCRIPTIONS FOR CUSTOMER $_GET['customerID']-->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Local files also load quicker -->
    <script src="../../../../js/bootstrap.min.js"></script>
  </body>
</html>

