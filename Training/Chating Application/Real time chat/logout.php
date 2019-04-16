<?php
include 'database.php';

	session_start();

	// echo $_SESSION['user_id']; 
	// exit();

		$sql1 = "UPDATE login SET status = '0' where id = '".$_SESSION['user_id']."'";
		// echo $sql1;exit(); 
		$result = $conn->query($sql1);


	unset($_SESSION['user_id']);
	unset($_SESSION['user_email']);
	unset($_SESSION['login_details_id']);
	session_destroy();
	// echo $_SESSION['user_id']; 
	// exit();
		

	header('location:index.php');