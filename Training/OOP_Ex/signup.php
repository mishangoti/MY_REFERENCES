<?php
	include 'Includes/Crud_Operation.php';

	// message variable
	$empty_message = 0;
	$flag = 0;
	$flag_password = 0;
	$invalid_password = 0;

	$f_name_message = 0;
	$l_name_message = 0;
	$email_message = 0;
	$password_message = 0;
	$phone_message = 0;
	$address_message = 0;

	if(isset($_POST['signup'])){

		if($_POST['f_name'] == ""){
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

			if($_POST['password'] == ""){
				$password_message = 1;
			}else{
				$password = $_POST['password'];
				$password_md5 = md5($password);
				$flag = $flag+1;
			}

			/*if($_POST['re_password'] == ""){
				$re_password_message = 1;
			}else{
				// $flag = $flag+1;
				$flag_password = $flag_password + 1;;
				$re_password = $_POST['re_password'];
			}*/
			/*if($flag_password == 2){
				if(preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $password)) {
					$password_md5 = md5($password);
			   		$flag = $flag+1;
				}else{
					$invalid_password = 1;
				}	
			}	
*/
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
		}
		// echo $flag; exit();
			if($flag == 6){
				if($crud_operation->Store($f_name, $l_name, $email, $password_md5, $phone, $address) == true){
					header('location: index.php?sussess=1');
				}else{
					echo '<script>alert("Try Again");</script>';
				}
			}
	}else{
		$empty_message = 1;
	}

	include 'header.php';
?>

<body>

	<div><center><h1>Login</h1></center></div>

	<div class="container">
		<hr>
		<form class="form-horizontal" action="signup.php" method="POST" name="myForm">
			<!-- onsubmit = "return(validation_signup());" -->
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">First Name:</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" value="<?php if(isset($f_name)){echo $f_name;} ?>" name="f_name" placeholder="Enter First Name">
		      <p id="f_name_message" style="color: red"><?php if($f_name_message == 1){echo 'Enter First Name';} ?></p>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Last Name:</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" value="<?php if(isset($l_name)){echo $l_name;} ?>" name="l_name" placeholder="Enter Last Name">
		      <p id="l_name_message" style="color: red"><?php if($l_name_message == 1){echo 'Enter Last Name';} ?></p>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-8">
		      <input type="email" class="form-control" value="<?php if(isset($email)){echo $email;} ?>" name="email" placeholder="Enter email">
		      <p id="email_message" style="color: red"><?php if($email_message == 1){echo 'Enter Email';} ?></p>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Password:</label>
		    <div class="col-sm-8"> 
		      <input type="password" class="form-control" id="pwd" value="<?php if($invalid_password == 1){echo 'Password Should Be Strong';} if(isset($password)){echo $password;} ?>" name="password" placeholder="Enter password">
		      <p id="password_message" style="color: red"><?php if($password_message == 1){echo 'Enter password';} ?></p>
		    </div>
		  </div>
		 <!--  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Re-Password:</label>
		    <div class="col-sm-8"> 
		      <input type="password" class="form-control" id="pwd" value="<?php if(isset($re_password)){echo $re_password;} ?>" name="re_password" placeholder="Enter password Again">
		      <p id="re_password_message" style="color: red"><?php if($re_password_message == 1){echo 'Enter Password Again';} if($invalid_password == 1){echo 'Password Is Not Matching';} if($invalid_password == 2){echo 'Password Should Strong Enough';} ?></p>
		    </div>
		  </div> -->
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Phone:</label>
		    <div class="col-sm-8">
		      <input type="number" id="phone" name="phone" class="form-control" value="<?php if(isset($phone)){echo $phone;} ?>" placeholder="Enter Last Name">
		      <p id="phone_message" style="color: red"><?php if($phone_message == 1){echo 'Enter Phone No';} ?></p>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Address:</label>
		    <div class="col-sm-8">
		      <textarea type="text" class="form-control" id="email" name="address" value="<?php if(isset($address)){echo $address;} ?>" placeholder="Enter Last Name"></textarea>
		      <p id="address_message" style="color: red"><?php if($address_message == 1){echo 'Enter Address';} ?></p>
		    </div>
		  </div>
		  <!-- <p id="empty_message" style="color: red"><?php if($empty_message == 1){echo 'Please fill the form';} ?></p>	 -->
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" name="signup" value="signup" class="btn btn-default">SIGN UP</button> 
		      <a href="index.php" class="btn btn-default">SIGN IN</a>
		    </div>
		  </div>
		  
		</form>
		
	</div>
</body>
</html>