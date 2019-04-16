<?php
	include_once 'dbconfig.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	<div><center><h1>Login</h1></center></div>

	<div class="container">
		<hr>
		<form class="form-horizontal" action="register.php">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">First Name:</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="email" name="f_name" placeholder="Enter First Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Last Name:</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="email" name="l_name" placeholder="Enter Last Name">
		    </div>
		  </div>
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
		    <label class="control-label col-sm-2" for="pwd">Re-Password:</label>
		    <div class="col-sm-8"> 
		      <input type="password" class="form-control" id="pwd" name="re_password" placeholder="Enter password Again">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Phone:</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="email" name="l_name" placeholder="Enter Last Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Address:</label>
		    <div class="col-sm-8">
		      <textarea type="text" class="form-control" id="email" name="l_name" placeholder="Enter Last Name"></textarea>
		    </div>
		  </div>

		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" name="register" class="btn btn-default">SIGN UP</button> 
		      <a href="index.php" type="submit" name="signin" class="btn btn-default">SIGN IN</a>
		    </div>
		  </div>
		  
		</form>
	</div>
</body>
</html>