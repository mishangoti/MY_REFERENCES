<?php

include 'database.php';
	session_start();

		if(isset($_SESSION['user_id'])){
			$sql1 = "UPDATE login SET status = '1' where id = '".$_SESSION['user_id']."'";
			// echo $query;exit(); 
			$result = $conn->query($sql1);
		}else if(!isset($_SESSION['user_id'])){
			$sql2 = "UPDATE login SET status = '0' where id = '".$_SESSION['user_id']."'";
			// echo $query;exit(); 
			$result = $conn->query($sql2);
		}
