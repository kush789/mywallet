<?php

	session_start();


	if( !isset($_SESSION['user_email']) || !isset($_SESSION['user_name']) )
	{
		$_SESSION['message'] = "You must log in first";
		$_SESSION['state'] = "invalid";
		header("Location: index.php");
	}

	else if (isset($_POST['add_submit']))
	{

	$con = mysql_connect("127.0.0.1","root","kush@1996");
	mysql_select_db("mywallet",$con);	

		$currbal = (int) $_SESSION['balance'];
		$addbal = (int) $_POST['add'];
		$currbal = $currbal + $addbal;
		$_SESSION['balance'] = $currbal;

		$query = "UPDATE user_info SET balance = '$_SESSION[balance]' WHERE id = '$_SESSION[uid]'";
		mysql_query($query,$con);

		$query = "INSERT INTO balance_log (uid,type,amount,comment,reason) VALUES ('$_SESSION[uid]','1','$addbal','$_POST[add_comment]','-1') ";		
		mysql_query($query,$con);


		header("Location: index.php");
	}

	else if (isset($_POST['subtract_submit']))
	{

	$con = mysql_connect("127.0.0.1","root","kush@1996");
	mysql_select_db("mywallet",$con);	

		$currbal = (int) $_SESSION['balance'];
		$subbal = (int) $_POST['sub'];
		$currbal = $currbal - $subbal;
		if ($currbal>-1)
		{
			$_SESSION['balance'] = $currbal;
			$query = "UPDATE user_info SET balance = '$_SESSION[balance]' WHERE id = '$_SESSION[id]'";
			mysql_query($query,$con);

			$query = "INSERT INTO balance_log (uid,type,amount,comment,reason) VALUES ('$_SESSION[uid]','0','$subbal','$_POST[sub_comment]','$_POST[sub_reason]') ";		
			mysql_query($query,$con);

		}
		else
		{
			$_SESSION['warning'] = "Amount selected greater than balance.";
		}

		header("Location: home.php");

	}

	else
	{
		header("Location: index.php");
	}


?>