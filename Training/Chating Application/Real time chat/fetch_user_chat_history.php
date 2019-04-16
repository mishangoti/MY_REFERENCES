<?php



include 'database.php';

session_start();
// echo 'sadasd'; 
// exit();
echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $conn);

?>
