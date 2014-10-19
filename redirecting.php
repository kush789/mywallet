<?php
	
	ob_start();
	session_start();

	if (isset($_POST['signin']))
	{			
		$found = 0;

		$con = mysql_connect("127.0.0.1","root","kush@1996");
		mysql_select_db("mywallet",$con);
		$q1 = "SELECT * FROM user_info WHERE email LIKE '$_POST[signin_email]' ";
		if($data = mysql_query($q1,$con))
		{
			echo "dine";
		}
		else
		{
			echo mysql_error();
		}


		while( $row = mysql_fetch_array($data))
		{
			if ($row['pass'] == $_POST['signin_pass'])
			{
				session_regenerate_id();
				$_SESSION['user_email'] = $row['email'];
				$_SESSION['user_name'] = $row['fname'];
				$_SESSION['message'] = "";
				session_write_close();
				$found=1;
				$_SESSION['stata'] = 'valid';
				header("Location: home.php");
			}
		}

		if (!$found)
		{

			$_SESSION['message'] = "Wrong user Name or Password";
			$_SESSION['state'] = 'invalid';

			header("Location: index.php");
		}


	}

	else if (isset($_POST['signup']))
	{
		if ($_POST['pass']==$_POST['passcheck'])
		{
			$con = mysql_connect("127.0.0.1", "root","kush@1996");
			mysql_select_db("mywallet",$con);
			$q1 = "INSERT INTO user_info (fname,lname,email,dob,mobile,pass) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[dob]','$_POST[number]','$_POST[pass]')";		
			mysql_query($q1,$con);
			$_SESSION['state'] = 'invalid';
			$_SESSION['message'] = "successfully registered";
			header("Location: index.php");
		}
		else
		{
			$_SESSION['state'] = 'invalid';
			$_SESSION['message'] = "Passwords don't match";
			header("Location: index.php");
		}

 	}

 	else
 	{
		header("Location: index1.php");
 	}

?>




