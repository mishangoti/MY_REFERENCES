<?php
	include 'dbconfig.php';
	include 'header.php';

	// addnew
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_POST['update_id'];
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$department = $_POST['department'];
	$email_id = $_POST['email'];
	$phone_no = $_POST['phone'];
	$salery = $_POST['salary'];
	$password = $_POST['password'];

	$sql5 = "UPDATE employee SET f_name='$f_name', l_name='$l_name', department='$department', email_id='$email_id', phone_no='$phone_no', salery='$salery', password='$password' WHERE id=$id";

	if($conn->query($sql5) === TRUE){
		echo '<script language="javascript">';
		echo 'alert(Employee Detail Updated Sussessfully)';
		echo '</script>';
		header('Location: index.php');
	}else{
		echo '<script language="javascript">';
		echo 'alert(Try Again)';
		echo '</script>';
	}		
}else{

}
?>

<?php
	// edit existing
	if(isset($_GET['edit_id']) != ""){

		$id = $_GET['edit_id'];
		$sql4 = "SELECT * from employee WHERE id = '$id'";
		$result = $conn->query($sql4);
		
		while($row = $result->fetch_assoc()){
			
?>	
<div class="container">
	<form action="update.php" method="Post">
		<div class="modal-header text-center">
			<h4 class="modal-title w-100 font-weight-bold">Update Record</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  	<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body mx-3">
			<div class="md-form mb-5">
			  	<input type="text" id="f_name" class="form-control validate" name="f_name" placeholder="<?= $row['f_name']; ?>">
			  	<input type="hidden" name="update_id" value="<?= $id; ?>">
			  	<label data-error="wrong" data-success="right" for="f_name">First Name</label>
			</div>

			<div class="md-form mb-5">
			  	<input type="text" id="l_name" class="form-control validate" name="l_name" placeholder="<?= $row['l_name']; ?>"> 
			  	<label data-error="wrong" data-success="right" for="l_name">Last Name</label>
			</div>

			<div class="md-form mb-5">
			  	<div class="dropdown">
				  	<!-- <button class="btn btn-primary dropdown-toggle" type="button" >Select Department -->
				  	<!-- <span class="caret"></span></button> -->
				  	<select class="btn dropdown-toggle" data-toggle="dropdown" name="department">
				  		<option ><?= $row['department']; ?></option>
				  		<option value="Php">Php</option>
				    	<option value="Android">Android</option>
				    	<option value="Python">Python</option>
				    	<option value="A.I.">A.I.</option>
				    	<option value="H.R.">H.R.</option>
				    	<option value="Testing">Testing</option>
				    	<option value="UI Designer">UI Designer</option>
				  	</select>
				</div>
			  	<label data-error="wrong" data-success="right" for="department">Department</label>
			</div>

			<div class="md-form mb-4">
			  	<input type="email" id="defaultForm-pass" class="form-control validate" placeholder="<?= $row['email_id']; ?>" name="email">
			  	<label data-error="wrong" data-success="right" for="email">Email</label>
			</div>

			<div class="md-form mb-4">
			  	<input type="number" id="defaultForm-pass" class="form-control validate" placeholder="<?= $row['phone_no']; ?>" name="phone">
			  	<label data-error="wrong" data-success="right" for="phone">Phone No.</label>
			</div>

			<div class="md-form mb-4">
			  	<input type="number" id="defaultForm-pass" class="form-control validate" placeholder="<?= $row['salery'];?>" name="salary">
			  	<label data-error="wrong" data-success="right" for="email">Salary</label>
			</div>

			<div class="md-form mb-4">
			  	<input type="password" id="defaultForm-pass" class="form-control validate" placeholder="<?= $row['password'];?>" name="password">
			  	<label data-error="wrong" data-success="right" for="email">Password</label>
			</div>

		</div>
		<div class="modal-footer d-flex justify-content-center">
		    <input type="submit" class="btn btn-default" value="Update">
		</div>
	</form>
</div>
<?php
		}
	}
?>