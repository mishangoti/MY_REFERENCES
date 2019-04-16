<?php
	 // echo 'hi';
	 // $_POST['offer_name'];
	if(isset($_POST['offer_name'])){
		

		// print_r($_POST['data']);

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

		$offer_name = $_POST['offer_name'];
		$original_price = $_POST['original_price'];
		$available_stock = $_POST['available_stock'];
		$offer_price = $_POST['offer_price'];
		$offer_stock = $_POST['offer_stock'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];

		// echo $offer_stock;
		$sql = "INSERT INTO product (name, price, stock, offer_price, offer_stock, offer_starting_date, offer_ending_date) VALUES ('$offer_name','$original_price','$available_stock','$offer_price','$offer_stock','$startdate','$enddate')";
		// echo $sql; exit();
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}

?>
<script type="text/javascript">	</script>