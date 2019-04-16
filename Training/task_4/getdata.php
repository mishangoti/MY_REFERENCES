<?php
		if(isset($_GET['submit'])){

		$value = $_GET['value'];
		
		echo '<pre>';
		print_r($value);

		$count = 0;
		foreach ($value as $totalvalue) {
			
			echo $count.' . '.$totalvalue.'<br>';
			$count++;
		}

		echo 'total value are :'. $count;
	}
?>
