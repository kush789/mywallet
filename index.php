<?php 
  session_start();
  if ($_SESSION['state']== 'valid')
  {
    $_SESSION['message'] = "";
  }

  if( !isset($_SESSION['user_email']) || !isset($_SESSION['user_name']) )
  {

    if(!mysql_select_db("mywallet",$con))
    {
      $con = mysql_connect("127.0.0.1","root","kush@1996");
      $q = 'CREATE DATABASE mywallet';
      mysql_query($q,$con);
      mysql_select_db('mywallet',$con);
    }

      $query = "CREATE TABLE IF NOT EXISTS `user_info` (
          `id` int(11) unsigned NOT NULL auto_increment PRIMARY KEY,
          `fname` varchar(40) NOT NULL,
          `lname` varchar(40) NOT NULL,
          `dob` date NOT NULL,
          `mobile` int(12) NOT NULL,
          `email` varchar(40) NOT NULL,
          `balance` int(12) NOT NULL,
          `pass` varchar(40) NOT NULL)";

      mysql_query($query,$con);

      $query = "CREATE TABLE IF NOT EXISTS `balance_log` (
          `id` int(11) unsigned NOT NULL auto_increment PRIMARY KEY,
          `uid` int(11) NOT NULL,
          `amount` integer(40) NOT NULL,
          `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
          `comment` varchar(200) NOT NULL,
          `reason` integer(1) NOT NULL)";

      mysql_query($query,$con);


echo "

<html >
	<head>
		<title>Login</title>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/styles.css' rel='stylesheet'>
    <link href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet'>

	</head>
  <body style='background-image:url(./images/moneybg.jpg); background-size: cover;'>

<div class='row'>
        <div class = 'col-md-2'></div>
        <div class='col-md-5 col-md-offset-0' style = 'margin-top:20px;'>
            <div class='panel panel-default'>
                <div class='panel-heading' style = 'text-align:center;font-size:23px;'><strong>Sign Up</strong>

                </div>
                <div class='panel-body'>



          <form method='POST' action = './redirecting.php'>
              <div class = 'row'>
                <div class = 'form-group'>
                <div class = 'col-md-6'>                  
                  <input type = 'text' name = 'signin_email' placeholder = 'Email' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                 <div class = 'form-group'>
                <div class = 'col-md-6'>                  
                  <input type = 'password' name = 'signin_pass' placeholder = 'Password' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
              </div>
              </div>
                           <div id='test'>
                <h3 style = 'text-align:center'><span STYLE='font-family: Bodoni MT Ultra Bold;'>".$_SESSION['message']."</span></h3>";
                $_SESSION['state'] = 'valid';
                echo "
 
                <div class = 'row'>
                  <div class = 'col-md-3'></div>
                  <div class = 'col-md-6'>
                    <button type = 'submit' name = 'signin' class = 'btn btn-success btn-lg btn-block '>Sign Up
                    </button>
                    <br>
                  </div>
                  <div class = 'col-md-3'></div>

                </div>

            </form>
                </div>
              </div>
            </div>
          </div>

  </div>

</div>
<div class='row'>
        <div class = 'col-md-2'></div>
        <div class='col-md-5 col-md-offset-0' style = 'margin-top:0px;'>
            <div class='panel panel-default'>
                <div class='panel-heading' style = 'text-align:center;font-size:23px;'><strong>Sign Up</strong>

                </div>
                <div class='panel-body'>



          <form method='POST' action = './redirecting.php'>
              <div class = 'row'>
                <div class = 'form-group'>
                <div class = 'col-md-6'>                  
                  <input type = 'text' name = 'fname' placeholder = 'First Name' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                <div class = 'col-md-6'>                  
                  <input type = 'text' name = 'lname' placeholder = 'Last Name' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                </div>
              </div>
              <div class = 'row'>
                <div class = 'form-group'>
                <div class = 'col-md-12'>                  
                  <input type = 'text' pattern='[^ @]*@[^ @]*' name = 'email' placeholder = 'Email' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                </div>
              </div>
              <div class = 'row'>
                <div class = 'form-group'>
                <div class = 'col-md-6'>                  
                  <input type = 'text' name = 'number' placeholder = 'Mobile Number' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                <div class = 'col-md-6'>                  
                  <input type = 'date' name = 'dob' placeholder = 'Date of Birth' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                </div>
              </div>

              <div class = 'row'>
                <div class = 'form-group'>
                <div class = 'col-md-6'>                  
                  <input type = 'password' name = 'pass' placeholder = 'Password' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                <div class = 'col-md-6'>                  
                  <input type = 'password' name = 'passcheck' placeholder = 'Retype Password' autocomplete = 'off' class='form-control input-lg'><br>
                </div>
                </div>
              </div>
              </div>

                <div class = 'row'>
                  <div class = 'col-md-3'></div>
                  <div class = 'col-md-6'>
                    <button type = 'submit' name = 'signup' class = 'btn btn-success btn-lg btn-block '>Sign Up
                    </button>
                    <br>
                  </div>
                  <div class = 'col-md-3'></div>

                </div>

            </form>
                </div>
              </div>
            </div>
          </div>

  </div>

</div>

	<!-- script references -->

  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script> 
  <script src='js/jquery.min.js'></script>
  <script src='js/bootstrap.min.js'></script>


</body>
</html>
";
}
else
{
  header("Location: home.php");
}

?>