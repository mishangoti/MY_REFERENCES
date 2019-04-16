<?php
	// echo $_
	if(isset($_FILES['file'])){

		
		
			
			$file_name = time().$_FILES['file']['name'];
		    $file_size =$_FILES['file']['size'];
		    $file_tmp =$_FILES['file']['tmp_name'];
		    $file_type=$_FILES['file']['type'];

		    $path = "images/".$file_name;
			

			// echo $path; exit();

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "task_5";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			move_uploaded_file($file_tmp,"images/".$file_name);
			$sql = "INSERT INTO product (image) VALUES ('$path')";

			if ($conn->query($sql) === TRUE) {
			    return true;
			} else {
			    return false;
			}

			$conn->close();

		}
?>