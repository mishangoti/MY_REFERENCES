<?php
	include 'database.php';
	session_start();

	$message = '';

	if(isset($_SESSION['user_id'])){
		header('location:home.php');
	}

	// echo $_POST['email']; die();
	if(isset($_POST['submit'])){

		$query = "SELECT id, email, password FROM login where email = "."'".$_POST['email']."'"."";

		// echo $query;exit();
		$result = $conn->query($query);
		// echo '<pre>';
		// print_r($result);die();
		if($result != null){
 			foreach ($result as $row) {
 				// echo $row['email'];
				if($_POST['pass'] == $row['password']){
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['user_email'] = $row['email'];
					$sub_query = "INSERT INTO login_details (id) VALUES ('".$row['id']."')";
					$result = $conn->query($sub_query);

					$_SESSION['login_details_id'] = $row['id'];
					
					header('location:home.php'); 
				}else{
					$message = 'wrong password';
				}
			}
		}else{
			$message = 'wrong email address';
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
</head>
<body>
	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <p><?php echo $message; ?></p>
            <form class="form-signin" action="index.php" method="post">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Sign in</button>
                
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

