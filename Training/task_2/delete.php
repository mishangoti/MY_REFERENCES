<?php
	include 'dbconfig.php';

	if($_SERVER["REQUEST_METHOD"] == "GET"){

		$id = $_GET['id'];
		$sql2 = "DELETE FROM employee WHERE id = '$id'";

		if($conn->query($sql2) === TRUE){
			header('Location: index.php');

		}else{
			echo '<script language="javascript">';
			echo 'alert(Try Again)';
			echo '</script>';
		}
	}

/*

	$no_of_records_per_page = 10;
        				$offset = ($pageno-1) * $no_of_records_per_page;
        				$count_sql = "SELECT COUNT(*) FROM employee";
        				$result = $conn->query($count_sql);
        				$total_rows = mysqli_fetch_array($result)[0];
        				$total_pages = ceil($total_rows / $no_of_records_per_page);
        					

	                    // Attempt select query execution
	                    $sql = "SELECT * FROM employee LIMIT $offset, $no_of_records_per_page";
	                    echo 
						$result = $conn->query($sql);*/