<?php

	$file_path = $_POST['path'];
	$data = file_get_contents($file_path); // Read the file's contents
    $name = 'ups_label.png';
    force_download($name, $data);