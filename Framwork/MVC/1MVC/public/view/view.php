<?php
	include (ROOT.DS.'public'.DS.'view'.DS.'header.php');
?>

<div class="container">
	<div class="row">
		<div class="col-md-2"><a href="<?php echo 'index'; ?>" class="btn btn-default">Home</a></div>
		<div class="col-md-8">
			<center><h2>Books List</h2></center>
			<table class="table table-striped">
				<thead>
				    <tr>
				    	<th>SR.</th>
				        <th width="30%">Title</th>
				        <th width="30%">Auther</th>
				        <th width="40%">Descriptio</th>
				    </tr>
				</thead>
    </thead>
			<?php
			$sr = 1;
			// echo '<pre>';
			// print_r($books); exit();
			foreach ($books as $title => $book)
				{
					echo '<tbody><tr>
							<td>'.$sr.'</td>
							<td>
								<a href="#">'.$book['auther_name'].'</a>
							</td>
						  	<td>'.$book['title'].'
						  	</td>
						  	<td>'.$book['description'].'</td>
						  </tr></tbody>';
						  $sr++;
				}
			?></div>
		<div class="col-md-2"></div>

	</div>
</div>
