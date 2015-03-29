<!doctype html>
<!-- Software Engineering Team 8 -->
<!-- Last Update: 2/18/15 -->
<!-- Log In Page -->
<html>
<head>
    <meta name="description" content="The offiical News Delivery Software System" />
    <meta name="keywords" content="Rowan University, Rowan, Software Engineering, Delivery System" />
    <meta name="author" content="Mike Middleton" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   

    <title>News Delivery Systems - Log In</title>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!--Local fonts from bootstrap.com - Includes glyphicons -->
    <link rel="stylesheet" href="./font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    
    <!-- Additional CSS formatting extra colors and alignment -->
    <link rel="stylesheet" href="./css/Styles.css">

	<!-- Custom Alignment for just this page -->

	<style>

		h1 {
			text-align: center;
		}

		h2 {
			text-align: center;
		}

		footer {
                        position:absolute;
                        bottom:0;
                        width: 100%;
                        background: #ccc;
                }

	</style>
	
</head>

<body class="Contact">
    <div class="container">
	    <div class="row">
	    	<div class="well col-md-5 col-md-offset-3" style="margin-top:20%">
	    		<h1>News Delivery Systems</h1>
			<h2>Log In</h2>
	    		<div class="container">
		    		<div class="row">
		    			<div class="col-md-3">
		    				<div class="container">
								<!-- 'Post' Action: perform actions from 'utilities/logon/Login.php' to check if entered user information is valid on submit--> 
								<form name="adminlogin" class="form-horizontal" method="post" action="utilities/logon/Login.php">
										 
										<!-- Username field -->
										<div class="row">
											 <div class="form-group">
												<div class="col-md-4">
													<input  type="text" class="form-control " name ="username" id="username" placeholder="Username" maxlength="50" size="30" required>
												</div>
												<div class="col-md-2"><span id="nameValidArea"></span>
												</div>
											</div> 
										</div>

										<!-- Password field -->
										<div class="row">
											<div class="form-group">
												<div class="col-md-4">				
											  		<input  type="password" class="form-control" name ="password" id="password" placeholder="Password" maxlength="80" size="30" required>
												</div>
												<div class="col-md-2"><span id="password"></span>
												</div>
											</div>
										</div>
										<!--Triggers 'Post' action -->
										<div class="col-md-4 text-center">
											<input type="submit" class="btn btn-success" value="Submit">
										</div>
								</form>
							</div>	
						</div>
					</div>
				</div>	
			</div>	 
		</div>
	</div>
</body>

<!-- Footer to include extra links to register and copyright info -->

<footer class="clearfix">
            <div class="ink-grid">
                <ul class="unstyled inline half-vertical-space">
                    <p><a href="About/">About</a> | 
                    <a href="Register/">Register</a> | 
                    &copy 2015 Mike Middleton</p>
        	</ul>    
	</div>
</footer>
 
</html>

