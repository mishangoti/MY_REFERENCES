<?php
// Includes
include 'dbconfig.php';

// addnew
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['addnew']) == 1){
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$department = $_POST['department'];
		$email_id = $_POST['email'];
		$phone_no = $_POST['phone'];
		$salery = $_POST['salary'];
		$password = $_POST['password'];

		$sql1 = "INSERT INTO employee (f_name, l_name, department, email_id, phone_no, salery, password) VALUES ('$f_name', '$l_name', '$department', '$email_id', '$phone_no', '$salery', '$password')";

		if($conn->query($sql1) === TRUE){
			echo '<script language="javascript">';
			echo 'alert("New Employee Added Sussessfully")';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("Try again")';
			echo '</script>';
		}		
	}else{}
	if(isset($_POST['adddep']) == 1){
		$department = $_POST['department'];
		$sql6 = "INSERT INTO department (departments) VALUES ('$department')";

		if($conn->query($sql6) === TRUE){
			echo '<script language="javascript">';
			echo 'alert("New Department Added Sussessfully")';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("Try again")';
			echo '</script>';
		}	

	}else{}
}else{}

?>
<?php
	include 'header.php';
?>
		<div class="container">
			<!-- heading -->
			<center><h2>Employees</h2></center>
			<!-- buttons -->
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#addnew">Add new</a>
					<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#adddepartment">Add Department</a>

				</div>
				<div class="col-2"></div>
			</div>
			<!-- table -->
			<div class="px-2" >
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">First</th>
				      <th scope="col">Last</th>
				      <th scope="col">department</th>
				      <th scope="col">Email</th>
				      <th scope="col">Phone No</th>
				      <th scope="col">Salery</th>
				      <th scope="col">Options</th>
				    </tr>
				  </thead>
				  <tbody >
				  	<?php
	                   	
	                   	$nodata = 0;
	                   	$x = 1;
	                    
	                    $no_of_records_per_page = 10;
        				$offset = ($pageno-1) * $no_of_records_per_page;
        				$total_pages_sql = "SELECT COUNT(*) FROM employee";

        				// echo $total_pages_sql; exit();

	                    // Attempt select query execution
	                    $sql = "SELECT * FROM employee";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						?>
							<tr>
						      <th scope="row"><?php echo $x; ?></th>
						      <td><?= $row['f_name'] ?></td>
						      <td><?= $row['l_name'] ?></td>
						      <td><?= $row['department'] ?></td>
						      <td><?= $row['email_id'] ?></td>
						      <td><?= $row['phone_no'] ?></td>
						      <td><?= $row['salery']; ?></td>
						      <td>
						      		<a href="update.php?edit_id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
						      		<a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you shure you want to Delete')">Delete</a>
						      </td>
						    </tr>
						<?php
						  		// mysqli_close($conn);
	                   			$x++;
						    }
						} else {
						    $nodata = 1;
						}
						?>
				  </tbody>

				</table>
			</div>
			<div class="page">
				<ul class="pagination">
				  	<li><a href="?page_no=1'">First</a></li>
				  	<li><a href="?page_no=1'">1</a></li>
				  	<li><a href="?page_no=2'">2</a></li>
				  	<li><a href="?page_no=5'">Last</a></li>
				</ul>
			</div>
		</div>
		

<!-- Add new popup -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">

		<div class="modal-content">
			<form action="index.php" method="Post">
				<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Add New</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body mx-3">
				<div class="md-form mb-5">
				  	<input type="text" id="f_name" class="form-control validate" name="f_name" placeholder="First Name">
				  	<label data-error="wrong" data-success="right" for="f_name">First Name</label>
				</div>

				<div class="md-form mb-5">
				  	<input type="text" id="l_name" class="form-control validate" name="l_name" placeholder="Last Name"> 
				  	<label data-error="wrong" data-success="right" for="l_name">Last Name</label>
				</div>

				<div class="md-form mb-5">
					
				  	<div class="dropdown">
					  	<!-- <button class="btn btn-primary dropdown-toggle" type="button" >Select Department -->
					  	<!-- <span class="caret"></span></button> -->
					  	<select class="btn dropdown-toggle" data-toggle="dropdown" name="department">
					  		<option disabled>Select Department</option>
					  	<?php
					  		$sql = "SELECT * FROM department";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
						?>
					  		<option value="<?= $row['departments']?>"><?= $row['departments']?></option>
					  	<?php
					  		}
					  	}
					  	?>
					  	</select>
					</div>

				  	<label data-error="wrong" data-success="right" for="department">Department</label>
				</div>

				<div class="md-form mb-4">
				  	<input type="email" id="defaultForm-pass" class="form-control validate" placeholder="Email" name="email">
				  	<label data-error="wrong" data-success="right" for="email">Email</label>
				</div>

				<div class="md-form mb-4">
				  	<input type="number" id="defaultForm-pass" class="form-control validate" placeholder="Phone No" name="phone">
				  	<label data-error="wrong" data-success="right" for="phone">Phone No.</label>
				</div>

				<div class="md-form mb-4">
				  	<input type="number" id="defaultForm-pass" class="form-control validate" placeholder="salary" name="salary">
				  	<label data-error="wrong" data-success="right" for="email">Salary</label>
				</div>

				<div class="md-form mb-4">
				  	<input type="password" id="defaultForm-pass" class="form-control validate" placeholder="password" name="password">
				  	<label data-error="wrong" data-success="right" for="email">Password</label>
				</div>

				</div>
				<div class="modal-footer d-flex justify-content-center">
					<!-- this hidden throws flag for add new -->
					<input type="hidden" name="addnew" value="1">
				    <!-- end -->
				    <input type="submit" class="btn btn-default" value="Add">
				</div>
			</form>

		</div>
	</div>
</div>
<!-- end popup -->

<!-- add department -->
<div class="modal fade" id="adddepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">

		<div class="modal-content">
			<form action="index.php" method="Post">
				<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Add New Department</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body mx-3">
					<div class="md-form mb-5">
						<label data-error="wrong" data-success="right" for="department">Department Name</label>
					  	<input type="text" id="department" class="form-control validate" name="department" placeholder="department">
					</div>

					<!-- <div class="md-form mb-5">
						<label data-error="wrong" data-success="right" for="l_name">Last Name</label>
					  	<input type="text" id="l_name" class="form-control validate" name="l_name" placeholder="Last Name">
					</div>

					<div class="md-form mb-4">
						<label data-error="wrong" data-success="right" for="email">Email</label>
					  	<input type="email" id="defaultForm-pass" class="form-control validate" placeholder="Email" name="email">
					</div> -->

				</div>
				<div class="modal-footer d-flex justify-content-center">
					<!--  -->
					<input type="hidden" name="adddep" value="1">
					<!--  -->
				    <input type="submit" class="btn btn-default" value="Add">
				</div>
			</form>

		</div>
	</div>
</div>
<!-- add department end -->


</body>