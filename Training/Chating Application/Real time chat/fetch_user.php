<?php

include 'database.php';
	session_start();
		// echo = time();exit();
		$query = "SELECT * FROM login where id != '".$_SESSION['user_id']."'";
		// echo $query;exit(); 
		$result = $conn->query($query);

		foreach ($result as $row) {
			$status = '';
			// $current_timestamp = strtotime(date('Y-m-d H:i:s'));
			// // $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
			// $use_last_activity = strtotime(fetch_user_last_activity($row['id'], $conn));
			// echo $use_last_activity.'<br>';
			// echo $current_timestamp;

			// $op = fetch_user_last_activity($row['id'], $conn);
			// echo $op;
			// exit();
			if(fetch_user_last_activity($row['id'], $conn) == 1){
				$status = "<span class='btn btn-success btn-xs'>ONLINE</span>";
			}else if(fetch_user_last_activity($row['id'], $conn) == 0){
				$status = "<span class='btn btn-danger btn-xs'>OFFLINE</span>";
			}
			$output = '
				<tr>
				  <td>'.$row['email'].' '.count_unseen_message($row['id'], $_SESSION['user_id'], $conn).'</td>
				  <td>'.$status.'</td>
				  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-touseremail="'.$row['email'].'">Start Chat</button></td>
				 </tr>
			';
			  // <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['email'].'">Start Chat</button></td>

			echo $output;
		}
		  
