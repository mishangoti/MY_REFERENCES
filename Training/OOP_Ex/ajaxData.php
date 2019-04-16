<?php
	include_once 'Includes/Database.php';

		$conn = new Database;
		// $id = 1;
		// $UserSqlAuth = "SELECT * FROM business where category_id value IN (SELECT * FROM category_business where id = '$id')";

		

	if(isset($_POST['category_id'])){
		$id = $_POST['category_id'];
		$sql_category_id = "SELECT cb.id,cb.business_id,cb.category_id,business.name as business_name FROM `category_business` as cb LEFT JOIN business ON 		business.`id` = cb.`business_id` where category_id = '$id'	";
		// SELECT mb.id,mb.business_id,mb.business_id,business.name as business_name FROM `category_business` as mb LEFT JOIN business ON business.`id` = mb.`business_id` where category_id = '1'

		// echo $UserSqlAuth; exit();

		$Res = mysqli_query($conn->Connect_db(), $sql_category_id);


		if(!$Res){
			$error = "Error description: " . mysqli_error($this->Connect_db());
			throw new Exception($error);
		}
		echo '<option value="">Select Business</option>';
		while($Row = mysqli_fetch_assoc($Res)){
		    echo '<option value="'.$Row['business_id'].'">'.$Row['business_name'].'</option>';
		}
	}
?>