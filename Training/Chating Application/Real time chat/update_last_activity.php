<?php

include 'database.php';
	session_start();
		$time = time();	
		$query = "UPDATE login SET last_activity = now() where id = '".$_SESSION['user_id']."'";
		// echo $query;exit(); 
		$result = $conn->query($query);


		if(isset($_SESSION['user_id'])){
			$sql1 = "UPDATE login SET status = '1' where id = '".$_SESSION['user_id']."'";
			// echo $query;exit(); 
			$result = $conn->query($sql1);
		}
		
		