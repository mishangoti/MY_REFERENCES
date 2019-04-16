<?php
	include 'Includes/Crud_Operation.php';
	include 'header.php';

	if(!isset($_SESSION['id'])){
		header('location: index.php');
	}

	// this is for add user business
	if(isset($_POST['addyourbusiness'])){
		$User_Id = $_SESSION['id'];
		$Business_Id = $_POST['addbusiness_id'];

		// echo $User_Id.'<br>';
		// echo $Business_Id.'<br>'; exit();

		$Addedbusiness = $crud_operation->StoreUserBusiness($User_Id, $Business_Id);
	} 

	// this is for add uniqu category
	if(isset($_POST['addnewcategory'])){
		$new_category = $_POST['new_category'];
		$crud_operation->StoreNewCategory($new_category);
	}

	// this is for add new business 
	if(isset($_POST['addnewbusiness'])){
		$cat_id = $_POST['cat_id'];
		$new_business = $_POST['new_business'];
		// this function will store NEW BUSINESS
		$crud_operation->StoreNewBusiness($new_business);
		$Business_Id = $crud_operation->GetBusinessId($new_business);
		// echo $Business_Id['id']; exit();
		$crud_operation->StoreCategoryBusiness($cat_id, $Business_Id['id']);
		// print_r($Business_Id); 
	}

	// this is for delere user business
	if(isset($_POST['delete'])){
		$Delete_Id = $_POST['delete'];
		// echo $Delete_Id; exit();
		$DeleteUserBusiness = $crud_operation->DeleteUserBusiness($Delete_Id);
	}

	if(isset($_POST['addbusinessimage'])){
		$flag = 0;
		$business_id = $_POST['business_id'];

		if(isset($_FILES['busimage'])){
			$file_name = time().$_FILES['busimage']['name'];
		    $file_size =$_FILES['busimage']['size'];
		    $file_tmp =$_FILES['busimage']['tmp_name'];
		    $file_type=$_FILES['busimage']['type'];

	     	$expensions= array("jpeg","jpg","png");
	      	$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

		    if(file_exists("media/".$file_name)){
		      	$image_message = 1;
		        // echo "file is allready exist";
		    }
		    else{
		        if(in_array($file_ext,$expensions)=== false){
		            $image_message = 2;
		            // echo "Extention Not Supported, Please Insert png, jpg and jpeg";
		        }else{
			        if($file_size > 2097152){
			            $image_message = 3;
			            // echo "File Size Must Be Less Then 2 MB";
			        }else{
			           	$path = "media/".$file_name;
			           	$flag = $flag+1;
		        	}
		        }
		    }
		}else{		
			echo 'no image';
		}
		if($flag == 1){
			if($crud_operation->StoreUserBusinessImage($_SESSION['id'], $business_id, $path) == true){
				move_uploaded_file($file_tmp,"media/".$file_name);
				echo '<script>alert("Your Image Is Seted");</script>';
			}else{
				echo '<script>alert("Try Again");</script>';
			}
		}
		
	}

?>


</body>
</html>
<body>
	<center><h2>Welcome Profile</h2></center>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<a href="" class="btn btn-info" data-toggle="modal" data-target="#addyourbusiness">ADD YOUR BUSINESS</a>
				<a href="" class="btn btn-info" data-toggle="modal" data-target="#addnewcategory">ADD NEW CATEGORY</a>
				<a href="" class="btn btn-info" data-toggle="modal" data-target="#addnewbusiness">ADD NEW BUSINESS</a>
				<a href="" class="btn btn-info" data-toggle="modal" data-target="#addbusinessimage">ADD BUSINESS IMAGES</a>
			</div>
			<div class="col-md-4">
				<a href="edit_profile.php" class="btn btn-info">EDIT PROFILE</a>
				<a href="logout.php" class="btn btn-info">LOGOUT</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<center><h3>List Of Your Business</h3></center>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">##</th>
				      <th scope="col">Business Name</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
			    	<?php
			    	$SR = 1;
			    	$Result_ListBusiness = $crud_operation->ListUserBusiness($_SESSION['id']);
			    		if(!empty($Result_ListBusiness)){
							// print_r($row);exit();
							foreach ($Result_ListBusiness as $Value_ListBusiness) {
			    	?>
				    <tr>	
				      <th scope="row"><?php echo $SR; ?></th>
				      <td><?php echo $Value_ListBusiness['business_name']; ?></td> <!-- $database->GetBusiness($Value_ListBusiness['business_id']); -->
					  <td>	
					      <form action="home.php" method="post">
								<button class="btn btn-danger" type="submit" name="delete" value="<?= $Value_ListBusiness['business_id']?>">Delete</button>
								<a href="business_images.php?bus_id=<?= $Value_ListBusiness['business_id'] ?>&user_id=<?= $_SESSION['id'] ?>" class="btn btn-info">View Images</a>
						  </form>
				      </td>
				    </tr>  
			      	<?php
			      		$SR++;
			      			}
			  			}else{echo 'NO RECORD FOUND';}
			  		?>
				  </tbody>
				</table>
			</div>
			<div class="col-md-4 col-md-off-set-2">
				<center><h3>Your Info</h3></center>
				<?php
			    	$Result_UserProfile = $crud_operation->ViewProfile($_SESSION['id']);
			    	
		    		if(!empty($Result_UserProfile)){
						foreach ($Result_UserProfile as $Value_UserProfile) {
				
						 // $Value_UserProfile['image']
				?>	

					<img src="<?= $Value_UserProfile['image'] ?>" alt="User Image" class="img-rounded img-thumbnail" height="50%" width="70%">
					<h3><b>Name    : </b><?= $Value_UserProfile['f_name'].' '.$Value_UserProfile['l_name'] ?></h3>
					<h3><b>Email   : </b><?= $Value_UserProfile['email'] ?></h3>
					<h3><b>Phone   : </b><?= $Value_UserProfile['phone'] ?></h3>
					<h3><b>Address : </b><?= $Value_UserProfile['adress'] ?></h3>
				<?php
						}
					}
			    	?>
			</div>
		</div>
	</div>

<!-- model 1 -->
<!-- Add your business -->
<?php 
	$Result_ListBusines = $crud_operation->ListCategory();
?>
<div class="modal fade" id="addyourbusiness" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Add Your Business</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="home.php" method="Post">
				<div class="modal-body">
					<label data-error="wrong" data-success="right">Select Your Business Category</label>
				  	<div class="dropdown">
					  	<select id="category_id" class="btn dropdown-toggle" data-toggle="dropdown" name="id">
					  		<option>Select Category</option>
					  	<?php
				    		if(!empty($Result_ListBusines)){
								// print_r($row);exit();
								foreach ($Result_ListBusines as $Value_ListBusiness) {
					    	?>
						?>
					  		<option value="<?= $Value_ListBusiness['id']?>"><?= /*$Value_ListAllBusiness['id']*/ $Value_ListBusiness['cat_name'];?></option>
					  	<?php
				      			}
				  			}else{echo 'NO RECORD FOUND';}
				  		?>
					  	</select>
					</div>
					<label class="control-label col-sm-12" for="email">Select Your Business</label>
					<div class="dropdown">
					  	<select id="business_id" class="btn dropdown-toggle" data-toggle="dropdown" name="addbusiness_id">
					  		<option value="">Select Business</option>
					  	</select>
					</div>
				</div>					
				<div class="modal-footer">
					<div class="form-group">
						<input type="submit" class="btn btn-default" name="addyourbusiness" value="Add Business">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end popup -->

<!-- model 2 -->
<!-- Add new category -->
<div class="modal fade" id="addnewcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Add New Category</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="home.php" method="Post">
				<div class="modal-body">
					<label data-error="wrong" data-success="right">Enter New Category</label>
				  	<div class="form-group">
				  		<input class="form-control" type="text" name="new_category" placeholder="Enter New Category">
				  	</div>
				</div>					
				<div class="modal-footer">
					<div class="form-group">
						<input type="submit" class="btn btn-default" name="addnewcategory" value="Add Category">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end popup -->

<!-- model 3 -->
<!-- Add new business -->
<?php 
	$Result_ListBusines = $crud_operation->ListCategory();
?>
<div class="modal fade" id="addnewbusiness" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Add Your Business</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="home.php" method="Post">
				<div class="modal-body">
					<label data-error="wrong" data-success="right">Business Under Which Category</label>
				  	<div class="dropdown">
					  	<select id="category" class="btn dropdown-toggle" data-toggle="dropdown" name="cat_id">
					  		<option>Select Category</option>
					  	<?php
				    		if(!empty($Result_ListBusines)){
								// print_r($row);exit();
								foreach ($Result_ListBusines as $Value_ListBusiness) {
					    	?>
						?>
					  		<option value="<?= $Value_ListBusiness['id']?>"><?= $Value_ListBusiness['cat_name'];?></option>
					  	<?php
				      			}
				  			}else{echo 'NO RECORD FOUND';}
				  		?>
					  	</select>
					</div>
					<p id="business_exist_message"></p>

					<label class="control-label col-sm-12" for="email">Enter New Business</label>
					<div class="form-group">
						<input type="text" class="form-control" name="new_business" placeholder="Enter New Business">				
					</div>
					<p>NOTE: if you want to add new category. kindly go to 'ADD NEW CATEGORY' button</p>
				</div>					
				<div class="modal-footer">
					<div class="form-group">
						<input type="submit" class="btn btn-default" name="addnewbusiness" value="Add New Business">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end popup -->

<!-- model 4 -->
<!-- Add new Business images -->
<?php 
	$Result_ListAllBusines = $crud_operation->ListUserBusiness($_SESSION['id']);
?>
<div class="modal fade" id="addbusinessimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Add Your Business Image</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="home.php" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<label data-error="wrong" data-success="right">Select Business For Add Image</label>
				  	<div class="dropdown">
					  	<select class="btn dropdown-toggle" data-toggle="dropdown" name="business_id">
					  		<option>Select Category</option>
					  	<?php
				    		if(!empty($Result_ListAllBusines)){
								// print_r($row);exit();
								foreach ($Result_ListAllBusines as $Value_ListAllBusiness) {
					    	?>
						?>
					  		<option value="<?= $Value_ListAllBusiness['business_id']?>"><?= $Value_ListAllBusiness['business_name'];?></option>
					  	<?php
				      			}
				  			}else{echo 'NO RECORD FOUND';}
				  		?>
					  	</select>
					</div>
					<label class="control-label col-sm-12" for="email">Enter New Business</label>
					<div class="form-group">
						<input type="file" class="form-control" name="busimage" placeholder="Enter New Business">				
					</div>
				</div>					
				<div class="modal-footer">
					<div class="form-group">
						<input type="submit" class="btn btn-default" name="addbusinessimage" value="Add Image">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end popup -->
</body>



<script type="text/javascript">
$(document).ready(function(){
    $('#category_id').on('change',function(){
        var cat_id = $(this).val();
        if(cat_id){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'category_id='+cat_id,
                success:function(html){
                    $('#business_id').html(html);
                }
            }); 
        }else{
            $('#business_id').html('<option value="">Select Category First Business</option>');
        }
    });
});
</script>
