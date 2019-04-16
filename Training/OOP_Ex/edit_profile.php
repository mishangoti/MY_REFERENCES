<?php
	include 'Includes/Crud_Operation.php';
	include 'header.php';

	if(!isset($_SESSION['id'])){
		header('location: index.php');
	}
	// message variable
	$empty_message = 0;
	$flag = 0;


	$f_name_message = 0;
	$l_name_message = 0;
	$email_message = 0;
	$phone_message = 0;
	$address_message = 0;
	$image_message = 0;

	if(isset($_POST['update'])){

		/*if($_POST['f_name'] == ""){
			$f_name_message = 1;
			 // echo $f_name_message; exit();
		}else{
			$flag = $flag+1;
			$f_name = $crud_operation->Sanitize($_POST['f_name']);
		}

		if($_POST['l_name'] == ""){
			$l_name_message = 1;
		}else{
			$flag = $flag+1;
			$l_name = $crud_operation->Sanitize($_POST['l_name']);
		}

		if($_POST['email'] == ""){
			$email_message = 1;
		}else{
			$flag = $flag+1;
			$email = $crud_operation->Sanitize($_POST['email']);;
		}

		if($_POST['phone'] == ""){
			$phone_message = 1;
		}else{
			$flag = $flag+1;
			$phone = $_POST['phone'];
		}

		if($_POST['address'] == ""){
			$address_message = 1;
		}else{
			$flag = $flag+1;
			$address = $_POST['address'];
		}*/
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];

		if(isset($_FILES['image']['name'])){
			
		if($_FILES['image'] == ""){
			// $image_message = 0;
		}else{
			
			$file_name = time().$_FILES['image']['name'];
		    $file_size =$_FILES['image']['size'];
		    $file_tmp =$_FILES['image']['tmp_name'];
		    $file_type=$_FILES['image']['type'];

		    // echo $file_name; exit();
		     $expensions= array("jpeg","jpg","png");
		      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

			    if(file_exists("media/".$file_name)){
			      	$image_message = 1;
			        // echo "file is allready exist";
			    }
			    else{
			        if(in_array($file_ext,$expensions)=== false){
			            $image_message = 2;
			            // echo "Extention Not Supported, Please Insert png, jpg and jpeg";
			        }else{
				        if($file_size > 2097152){
				            $image_message = 3;
				            // echo "File Size Must Be Less Then 2 MB";
				        }else{
				           	$path = "media/".$file_name;
				           	$flag = $flag+1;
			        	}
			        }
			    }
			} 	
		}
		
		// echo $flag; exit();	 
			if($flag == 1){
				if($crud_operation->StoreUpdate($_SESSION['id'], $f_name, $l_name, $phone, $address, $path) == true){
					move_uploaded_file($file_tmp,"media/".$file_name);
					echo '<script>alert("Your Detail Is Updated");</script>';
				}else{
					echo '<script>alert("Try Again");</script>';
				}
			}
	}else{
		$empty_message = 1;
	}

?>

<body>
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-2"><a href="home.php" class="btn btn-info">HOME</a></div>
			<div class="col-md-8"><center><h1>Edit Your Profile</h1></center></div>
			<div class="col-md-2"></div>
		</div>
		<hr>

		<div class="col-md-4">

			<?php
		    	$Result_UserProfile = $crud_operation->ViewProfile($_SESSION['id']);
		    	// echo $Result_UserProfile; exit();


				if(!empty($Result_UserProfile)){
					foreach ($Result_UserProfile as $Value_UserProfile) {
					
					$f_name_local = $Value_UserProfile['f_name'];
					$l_name_local = $Value_UserProfile['l_name'];
					$phone_local = $Value_UserProfile['phone'];
					$address_local = $Value_UserProfile['adress'];
					 // $Value_UserProfile['image']
				?>	

				<img src="<?= $Value_UserProfile['image'] ?>" alt="User Image" class="img-rounded img-thumbnail" height="100px" width="200px">
				<h3><b>First Name    : </b><?= $Value_UserProfile['f_name'] ?></h3>
				<h3><b>Last Name    : </b><?= $Value_UserProfile['l_name'] ?></h3>
				<h3><b>Email   : </b><?= $Value_UserProfile['email'] ?></h3>
				<h3><b>Phone   : </b><?= $Value_UserProfile['phone'] ?></h3>
				<h3><b>Address : </b><?= $Value_UserProfile['adress'] ?></h3>
			<?php
					}
				}
		    ?>
		</div>
		<div class="col-md-8">
			<form class="form-horizontal" action="edit_profile.php" method="POST" name="myForm" enctype="multipart/form-data">
				<!-- onsubmit = "return(validation_signup());" -->
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">First Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" value="<?php if(isset($f_name)){echo $f_name;}else{echo $f_name_local;} ?>" name="f_name" placeholder="<?= $f_name_local ?>">
			      <!-- <p id="f_name_message" style="color: red"><?php if($f_name_message == 1){echo 'Enter First Name';} ?></p> -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Last Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" value="<?php if(isset($phone)){echo $phone;}else{echo $l_name_local;} ?>" name="l_name" placeholder="<?= $l_name_local ?>">
			      <!-- <p id="l_name_message" style="color: red"><?php if($l_name_message == 1){echo 'Enter Last Name';} ?></p> -->
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-2">Phone:</label>
			    <div class="col-sm-8">
			      <input type="number" id="phone" name="phone" class="form-control" value="<?php if(isset($phone)){echo $phone;} ?>" placeholder="<?= $phone_local ?>">
			      <!-- <p id="phone_message" style="color: red"><?php if($phone_message == 1){echo 'Enter Phone No';} ?></p> -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Address:</label>
			    <div class="col-sm-8">
			      <textarea type="text" class="form-control" id="email" name="address" value="" placeholder="<?= $address_local ?>"><?php if(isset($address_local)){echo $address_local;} ?></textarea>
			      <!-- <p id="address_message" style="color: red"><?php if($address_message == 1){echo 'Enter Address';} ?></p> -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="image">Your Pic:</label>
			    <div class="col-sm-8">
			      <input type="file" class="form-control" id="image" name="image" placeholder="Select Image">
			      <p id="image_message" style="color: red"><?php if($image_message == 1){echo 'File Already Exist';} if($image_message == 2){echo 'Extention Not Supported, Please Insert png, jpg and jpeg';} if($image_message == 3){echo 'File Size Must Be Less Then 2 MB';} ?></p>
			    </div>
			  </div>
			  <!-- <p id="empty_message" style="color: red"><?php if($empty_message == 1){echo 'Please fill the form';} ?></p>	 -->
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="update" value="update" class="btn btn-default">Update</button>
			    </div>
			  </div>  
			</form>	
		</div>
	</div>
</body>