<?php
	include 'Includes/Crud_Operation.php';
	include 'header.php';

	if(!isset($_SESSION['id'])){
		header('location: index.php');
	}
	if(isset($_GET['bus_id']) && isset($_GET['user_id'])){
		$Result_UserBusImage = $crud_operation->ViewUserBusImages($_GET['bus_id'], $_GET['user_id']);
	}
	
	
	?>
<body>
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-2"><a href="home.php" class="btn btn-info">HOME</a></div>
			<div class="col-md-8"><center><h1>Images Of Your Selected Business</h1></center></div>
			<div class="col-md-2"></div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?php
			    	// echo $Result_UserBusImage; exit();
					if(!empty($Result_UserBusImage)){
						foreach ($Result_UserBusImage as $Value_UserBusProfile) {
						 // $Result_UserBusImage['image']
					?>
					<img src="<?= $Value_UserBusProfile['image'] ?>" alt="User Image" class="img-rounded img-thumbnail" height="100px" width="200px">
					<!-- <a href="#" class="btn btn-danger">DELETE</a> -->
				<?php
						}
					}else{
						echo "This Business Does Not Have Images. You Can Add From HOME PAGE";
					}
			    ?>
			</div>
		</div>
	</div>
</body>