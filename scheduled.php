<?php
	session_start();

	include 'dbconf.php';

	$useremail = $_POST['useremail'];
	$password = $_POST['password'];

	//to prevent mysql injection
	$useremail = stripcslashes($useremail);
	$password = stripcslashes($password);

	//connect to server and select DB
	$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $db_name);

	if ($mysqli->connect_errno) {
	    echo "Error connecting to MySQL: " . $mysqli->connect_error;
	}

	$query = "select * from users where email = '$useremail' and password = '$password'";
	//query the database for the user

	$qr_firstname="";
	$qr_lastname="";
	$qr_email="";
	$qr_password="";

	if ($result = $mysqli->query($query)) {

		while ($row = $result->fetch_row()) {
				$qr_email=$row[4];
				$qr_password=$row[3];
				$qr_firstname=$row[1];
				$qr_lastname=$row[2];
		    }
	    $result->close();
	}
	
	if($qr_email===$useremail && $qr_password===$password){
		$_SESSION["useremail"] = $qr_email;
		$_SESSION["userfirstname"] = $qr_firstname;
		$_SESSION["userlastname"] = $qr_lastname;
#		echo "Login Successful! Welcome ".$qr_firstname;
		header("Location:dashboard.php");
		exit;
	} else {
		echo "Failed to Login";
	}

	$mysqli->close();

?>

