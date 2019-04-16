<?php
	include 'header.php';
	include 'dbconfig.php';
?>

		<div class="container">
			<!-- heading -->
			<center><h2>Department</h2></center>
			<!-- buttons -->
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
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
        				// $total_pages_sql = "SELECT COUNT(*) FROM employee";

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
		</div>