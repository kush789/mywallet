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
<!-- Latest compiled and minified CSS -->

<!-- Optional theme -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>

<link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet'>
    		<link href='./css/bootstrap.min.css' rel='stylesheet'>
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
            	  <li><a href='./debit.php'>Debit</a></li>
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

<div class='row'>
        <div class = 'col-md-3'></div>
        <div class='col-md-6 col-md-offset-0'>
            <div class='panel panel-default'>

                <div class='panel-body'>

                <div class = 'row'>
                <div class = 'col-md-2'>
                <a href = '#' data-toggle='modal' data-target='#add-modal' class = 'fa fa-plus fa-5x'></a>
                </div>
                <div class = 'col-md-2'>
                <a href = '#' data-toggle='modal' data-target='#withdraw-modal' class = 'fa fa-minus fa-5x'></a>
                </div>
                <div class = 'col-md-8' style = 'font-size:30px;'><br>
                Your current balance : Rs ".$_SESSION['balance'];

echo "

                </div>
                <div class = 'col-md-3'></div>
                <div class = 'col-md-6'>".$_SESSION['warning'];
                $_SESSION['warning'] = "";


echo "
                </div>
                </div>
              </div>
            </div>
          </div>

  </div>

</div>

<!-- add modal -->

    <div class='modal fade' id='add-modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>

          <div class='modal-header' style = 'background-color:#FFFFFF;'>
             <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>

             <div style = 'text-align:center; font-size:30px;'>&nbspAdd money to wallet</div>
            </div>

            <div class = 'modal-body'>

            <form method = 'POST' action = 'transactions.php'>
            <div class = 'row'>
              <div class = 'col-md-6'>
                <div class = 'form-group'>
                  <input type = 'number' name = 'add' placeholder = 'Enter amount' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
              </div>
              <div class = 'col-md-6'>
                <div class = 'form-group'>
                  <input type = 'text' name = 'add_comment' placeholder = 'Other Comments' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
              </div>
            </div>

            <div class = 'row'>
            <div class = 'col-md-3'></div>
            <div class = 'col-md-6'>
              <div class = 'form-group'>
                <input type = 'submit' name = 'add_submit' class = 'btn btn-lg btn-block' value = 'ADD'>
              </div>
            </div>
            </div>

            </form>

           
           </div>
          
        </div>
      </div>
    </div>
<!-- add modal ends -->
<!-- sub modal -->

    <div class='modal fade' id='withdraw-modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>

          <div class='modal-header' style = 'background-color:#FFFFFF;'>
             <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>

             <div style = 'text-align:center; font-size:30px;'>&nbspWithdraw money from wallet</div>
            </div>

            <div class = 'modal-body'>

            <form method = 'POST' action = 'transactions.php'>
            <div class = 'row'>
            <div class = 'col-md-6'>
              <div class = 'form-group'>
                  <input type = 'number' name = 'sub' placeholder = 'Enter amount' autocomplete = 'off' class='form-control input-lg'><br>
              </div>
            </div>
            <div class = 'col-md-6'>
              <div class = 'form-group'>
                <select name = 'sub_reason' class='form-control input-lg' placeholder = 'Reason'>
                  <option value = '0'>Food</option>
                  <option value = '1'>Clothes</option>
                  <option value = '2'>Entertainment</option>
                  <option value = '3'>Books</option>
                  <option value = '4'>Travel</option>
                  <option value = '5'>Bills</option>
                  <option value = '6'>Miscellaneous</option>
                </select>
              </div>
            </div>
            <div class = 'col-md-12'>
              <div class = 'form-group'>
                  <input type = 'text' name = 'sub_comment' placeholder = 'Other comments' autocomplete = 'off' class='form-control input-lg'><br>
              </div>
            </div>
            </div>
            <div class = 'row'>
            <div class = 'col-md-3'></div>
            <div class = 'col-md-6'>
              <div class = 'form-group'>
                <input type = 'submit' name = 'subtract_submit' class = 'btn btn-lg btn-block' value = 'ADD'>
              </div>
            </div>
            </div>

            </form>
 



           
           </div>
          
        </div>
      </div>
    </div>
<!-- sub modal ends -->

 
    <script src='./js/jquery-1.10.2.min.js'></script>
    <script src='./js/bootstrap.min.js'></script>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
  

</body>
</html>

		";
	}
?>