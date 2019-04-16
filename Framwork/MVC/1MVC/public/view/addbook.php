<?php
	include (ROOT.DS.'public'.DS.'view'.DS.'header.php');
?>

<div class="container">
	<div class="row">
		<div class="col-md-3"><a href="<?php echo 'index'; ?>" class="btn btn-default">Home</a></div>
		<div class="col-md-6">
			<center><h2>Add Book with Detail</h2></center>
			<form action="addbook" method="POST">
				<input class="form-control" type="text" name="auther" placeholder="Enter Auther Name" required><br>
				<input class="form-control" type="text" name="title" placeholder="Enter title" required><br>
				<textarea class="form-control" name="description" placeholder="Enter Book Description" required></textarea><br>
				<button name="addbook" class="btn btn-default">Add</button>
			</form>
		</div>
		<div class="col-md-3"></div>

	</div>
</div>
