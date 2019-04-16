<?php

	if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];

      $expensions= array("jpeg","jpg","png");
      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

      if(file_exists("images/".$file_name)){
        echo "file is allready exist";
      }
      else{
        if(in_array($file_ext,$expensions)=== false){
          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }else{
          echo "Ext is uniq";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"images/".$file_name);
           $path = "images/".$file_name;
           echo "Success";
        }else{
           echo "Upload only image";
        }
      }
   }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Image upload</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<!-- this is image upload  -->
	<form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="container">
      <div class="form-group">
        <label class="control-label col-sm-2">Select image to upload:</label>
    	
    	 <input type="file" class="form-control" name="image" id="">
    	 <input type="submit" class="btn btn-default" value="Upload Image" name="submit">
      </div>
    </div>
	</form>
</html>