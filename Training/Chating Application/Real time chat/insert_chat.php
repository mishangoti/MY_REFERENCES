<?php

include 'database.php';

	session_start();


	// echo $_POST['to_user_id'];
	// echo $_POST['chat_message'];





	// $data = array(
	//  ':to_user_id'  => $_POST['to_user_id'],
	//  ':from_user_id'  => $_SESSION['user_id'],
	//  ':chat_message'  => $_POST['chat_message'],
	//  ':status'   => '1'
	// );
	// echo '<pre>';
	// print_r($data);
	if($_POST['chat_message'] != NULL){
		$query = "
		INSERT INTO chat_message 
		(to_user_id, from_user_id, chat_message, status) 
		VALUES ('".$_POST['to_user_id']."', '".$_SESSION['user_id']."', '".$_POST['chat_message']."', '1')
		";

		// $result = $conn->query($query);

		if($conn->query($query))
		{
			echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $conn);
		}
	}
		

?>
