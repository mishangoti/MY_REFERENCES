<?php
 $conn = mysqli_connect("localhost","root","","realtimechat");

// Check connection
if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


function fetch_user_last_activity($user_id, $connect){
	$sql = "
		SELECT * FROM login WHERE id = $user_id ORDER BY status DESC LIMIT 1";

		// echo $sql; exit();
		
	$result = $connect->query($sql);
	foreach($result as $value) {
	return $value['status'];		
	}
}

function fetch_user_chat_history($from_user_id, $to_user_id, $conn){
	$query1 = "
	SELECT * FROM chat_message 
	WHERE (from_user_id = '".$from_user_id."' 
	AND to_user_id = '".$to_user_id."') 
	OR (from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."') 
	ORDER BY timestamp DESC
	";

	 // echo $queryy1;
	 // exit();
	$result = $conn->query($query1);

	// echo "<pre>";
	// print_r($result); exit();
	$output = '<ul class="list-unstyled">';
	foreach($result as $row)
	{
		$user_name = '';
		if($row["from_user_id"] == $from_user_id)
		{
			$user_name = '<b class="text-success">You</b>';
		}
		else
		{
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $conn).'</b>';
		}
		$output .= '
			<li style="border-bottom:1px dotted #ccc">
			<p>'.$user_name.' - '.$row["chat_message"].'
			<div align="right">
			 - <small><em>'.$row['timestamp'].'</em></small>
			</div>
			</p>
			</li>
		';
	}
	$output .= '</ul>';
	$query2 = "
	UPDATE chat_message 
	SET status = '0' 
	WHERE from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."' 
	AND status = '1'
	";
	$result1 = $conn->query($query2	);
	return $output;
}

function get_user_name($user_id, $connect)
{
	$query = "SELECT email FROM login WHERE id = '$user_id'";
	
	$result1 = $connect->query($query);
	foreach($result1 as $row1)
	{
		return $row1['email'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE from_user_id = '$from_user_id' 
 	AND to_user_id = '$to_user_id' 
 	AND status = '1'
	";

	// echo $query;
	// exit();
	$result = $connect->query($query);
	$count = mysqli_num_rows($result);
	// echo $count; exit();
	// echo '<pre>';
	// print_r($count);
	// exit();
	// $count = count($result);
	// echo $count(var)t;
	
	
	// exit();
	$output = '';
	if($count > 0)
	{
		$output = '<span class="label label-success">'.$count.'</span>';
	}
	return $output;
}

