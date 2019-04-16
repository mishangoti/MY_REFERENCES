<html>
<head></head>

<body>

	<table>
		<tr>
			<td width="30%">Title</td>
			<td width="30%">Author</td>
			<td width="40%">Description</td>
		</tr>
		<?php 
		// echo '<pre>';
		// var_dump($books); exit();
			foreach ($books as $title => $book)
			{	
				echo '<tr><td><a href="index.php?book='.$book['id'].'">'.$book['title'].'</a></td><td>'.$book['auther_name'].'</td><td>'.$book['description'].'</td></tr>';
			}

		?>
	</table>

</body>
</html>