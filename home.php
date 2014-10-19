<?php

	session_start();

	if( !isset($_SESSION['user_email']) || !isset($_SESSION['user_name']) )
	{
    $_SESSION['message'] = "You must log in first";
    $_SESSION['state'] = "invalid";
		header("Location: index.php");
	}
	else
	{
		echo"
		<html>
		
			<head>
    		<title>Home</title>
    		<link href='./css/bootstrap.min.css' rel='stylesheet'>
			  <link href='./css/home-specific.css' rel='stylesheet'>
    		<link href='./css/siimple.css' rel='stylesheet'>
 			</head>

			<body style='background-image:url(./images/homebg.jpg); background-size: cover;'>

      		<!-- Static navbar -->
      		<div class='navbar navbar-default' role='navigation'>
        		<div class='container-fluid'>
        			<div class='navbar-header'>
            			<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.navbar-collapse'>
              			<span class='sr-only'>Toggle navigation</span>
              			<span class='icon-bar'></span>
              			<span class='icon-bar'></span>
              			<span class='icon-bar'></span>
            			</button>
            			<a class='navbar-brand' href='#' style = 'margin-left:40px;font-size:25px'><span style='color: #000;'>my Wallet</span></a>
          			</div>
          		<div class='navbar-collapse collapse'>

    	        <ul class='nav navbar-nav navbar-right'>
        	      <li class='active'><a href='./'>Home</a></li>
            	  <li><a href='./anotherpage.php'>Another page</a></li>
            	  <li><a href='logout.php'>Logout</a></li>
            	  <li class='dropdown'>
            	    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dropdown Menu<span class='caret'></span></a>
                	<ul class='dropdown-menu' role='menu'>
                  		<li><a href='./settings.php'>Settings</a></li>
                  		<li><a href='#'>Another action</a></li>
                  		<li><a href='#'>Something else here</a></li>
                  		<li class='divider'></li>
                  		<li class='dropdown-header'>Nav header</li>
                  		<li><a href='#'>Separated link</a></li>
                  		<li><a href='#'>One more separated link</a></li>
                	</ul>
              	  </li>
            	</ul>
          		</div><!--/.nav-collapse -->
        	</div><!--/.container-fluid -->
      </div>
   <div id='wrapper'>

	<div id='header'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-6'>
					<h1>WELCOME ";

	echo "&nbsp&nbsp".$_SESSION['user_name'];

	echo "</h1>
					<h2 class='subtitle'>This is your home page</h2>				
				</div>
			</div>
		</div>
	</div>

    <script src='./js/jquery-1.10.2.min.js'></script>
    <script src='./js/bootstrap.min.js'></script>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
  

</body>
</html>

		";
	}
?>