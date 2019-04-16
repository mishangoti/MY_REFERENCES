<?php
	// includes
	include 'Includes/Crud_Operation.php';
	include 'header.php';
	
	$crud_operation = new Crud_Operation();

	$invalid_message = 0;
	if(isset($_SESSION['id'])){
		header('location: home.php');
	}


	//sussess message
	if(!empty($_GET['sussess'])){
		if($_GET['sussess'] == 1){
			echo '<script>alert("Registration Sussess. Login Now.");</script>';
		}
	}
	//auth checker
	if(!empty($_POST['signin'])){

		$email = $crud_operation->Sanitize($_POST['email']);
		$password = $crud_operation->Sanitize($_POST['password']);
		$password_md5 = md5($password);
		$auth = $crud_operation->Auth($email, $password_md5);
		if($auth != 0){
			$_SESSION['id'] = $auth;
			
			// print_r($_SESSION); exit();
			header('location: home.php');
			
		}else{
			$invalid_message = 1;
		}
	}

?>


<body>

	<div><center><h1>Login</h1></center></div>

	<div class="container">
		<hr>
		<form class="form-horizontal" action="index.php" method="POST">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-8">
		      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Password:</label>
		    <div class="col-sm-8"> 
		      <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
		    </div>
		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" name="signin" value="signin" class="btn btn-default">SIGN IN</button>
		      <a href="signup.php" class="btn btn-default">SIGN UP</a>
		      <div>
		      	<p style="color: red"><?php if($invalid_message == 1){echo 'INVADID EMAILID OR PASSWORD';}?></p>
		      </div>
		    </div>
		  </div>
		</form>
	</div>
</body>
</html>

<?php
	
?>