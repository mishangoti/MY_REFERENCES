<html>
<head></head>

<body>

<?php 
	// echo '<pre>';
	// print_r($book); 
	// echo $book['0']['id'];

	echo 'Title:' . $book['0']['title'] . '<br/>';
	echo 'Author:' . $book['0']['auther_name'] . '<br/>';
	echo 'Description:' . $book['0']['description'] . '<br/>';
	echo 'Registered At:' . $book['0']['created_at'] . '<br/>';

?>

</body>
</html>