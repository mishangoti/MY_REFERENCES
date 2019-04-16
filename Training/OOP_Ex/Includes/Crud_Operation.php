<?php
	include_once 'Database.php';
	
	/** Here Is Functions Structure
	 *  1. Sanitize
	 *  2. Auth
	 *  3. Store
	 *  4. Delete
	 *  5. List
	 *  6. View
	 *  7. Get data
	 */
	class Crud_Operation extends Database
	{
		// cliner function for remove space and perform validation
		public function Sanitize($var){
			try{
				$return = mysqli_real_escape_string($this->Connect_db(), $var);
				return $return;
			}catch(Exception $Exception_Sanitize){
				return $Exception_Sanitize;
			}
		}

		// Check userid for login
		public function Auth($email, $password){
			try {
				$UserSqlAuth = "SELECT * FROM user where email = '".$email."' AND password = '".$password."'";
				$Res_UserAuth = mysqli_query($this->Connect_db(), $UserSqlAuth);
				// Associative array
				$Row_UserAuth=mysqli_fetch_array($Res_UserAuth,MYSQLI_ASSOC);
				// print_r($row);exit;
				if(!$Row_UserAuth){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}

				if($Row_UserAuth){
					// $this->SetSession();
					return $Row_UserAuth['id'];
				}else{
					return 0; 
	 			}
			} catch (Exception $Exception_Auth) {
				echo 'Exception Caught ', $Exception_Auth->getMessage();
			}
		}

		// for register new user 
		public function Store($F_Name, $L_Name, $Email, $Password, $Phone, $Address){
			try {
				$InsertSqlStore = "INSERT INTO `user` (f_name, l_name, email, password, phone, adress) VALUES ('$F_Name', '$L_Name', '$Email', '$Password', '$Phone', '$Address')";
				$Res_Store = mysqli_query($this->Connect_db(), $InsertSqlStore);
				if(!$Res_Store){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}

				if($Res_Store){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_Store) {
				echo 'Exception Caught ', $Exception_Store->getMessage();
			}	
		}

		// For update user data and insert image
		public function StoreUpdate($Id, $F_Name, $L_Name, $Phone, $Address, $Image_Path){
			try {
				$img_co = '';
				if($Image_Path != ''){
					$img_co = ",image = '".$Image_Path."'";
				}
				$UpdateSqlStore = "UPDATE user SET f_name = '$F_Name', l_name = '$L_Name', phone = '$Phone', adress = '$Address' ". $img_co." WHERE id = '$Id'";				
				$Res_StoreUpdate = mysqli_query($this->Connect_db(), $UpdateSqlStore);
				if(!$Res_StoreUpdate){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				if($Res_StoreUpdate){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_StoreUpdate) {
				echo 'Exception Caught ', $Exception_StoreUpdate->getMessage();
			}	
		}

		// For enter new category
		public function StoreNewCategory($New_Category){
			try {
				$InsertNewCatSql = "INSERT INTO `category` (cat_name) VALUES ('$New_Category')";
				// echo $InsertSqlStoreBusiness; exit();
				$Res_StoreNewCat = mysqli_query($this->Connect_db(), $InsertNewCatSql);
				if(!$Res_StoreNewCat){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				if($Res_StoreNewCat){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_StoreNewCat) {
				echo 'Exception Caught ', $Exception_StoreNewCat->getMessage();
			}		
		}

		// For enter new business
		public function StoreNewBusiness($New_Business){
			try {
				$InsertNewBusSql = "INSERT INTO `business` (name) VALUES ('$New_Business')";
				// echo $InsertNewBusSql; exit();
				$Res_StoreNewBus = mysqli_query($this->Connect_db(), $InsertNewBusSql);
				if(!$Res_StoreNewBus){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				if($Res_StoreNewBus){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_StoreNewBus) {
				echo 'Exception Caught ', $Exception_StoreNewBus->getMessage();
			}		
		}
		
		// For enter user business
		public function StoreUserBusiness($User_Id, $Business_Id){
			try {
				$InsertSqlStoreBusiness = "INSERT INTO `multyple_business` (user_id,business_id) VALUES ($User_Id,$Business_Id)";
				// echo $InsertSqlStoreBusiness; exit();
				$Res_StoreBusiness = mysqli_query($this->Connect_db(), $InsertSqlStoreBusiness	);
				if(!$Res_StoreBusiness){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}

				if($Res_StoreBusiness){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_StoreBusiness) {
				echo 'Exception Caught ', $Exception_StoreBusiness->getMessage();
			}			
		}

		// For enter user business Image
		public function StoreUserBusinessImage($User_Id, $Business_Id, $Image_Path){
			try {
				$SqlUserBusImage = "INSERT INTO `images` (user_id,business_id,image) VALUES ('$User_Id','$Business_Id','$Image_Path')";
				// echo $SqlUserBusImage; exit();
				$Res_StoreBusImage = mysqli_query($this->Connect_db(), $SqlUserBusImage);
				if(!$Res_StoreBusImage){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				if($Res_StoreBusImage){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_StoreBusImage) {
				echo 'Exception Caught ', $Exception_StoreBusImage->getMessage();
			}			
		}

		// For enter user business category wise
		public function StoreCategoryBusiness($Cat_Id, $Business_Id){
			try {
				$InsertSqlStoreCatBus = "INSERT INTO `category_business` (category_id,business_id) VALUES ($Cat_Id, $Business_Id)";
				// echo $InsertSqlStoreCatBus; exit();
				$Res_StoreCatBus = mysqli_query($this->Connect_db(), $InsertSqlStoreCatBus);
				if(!$Res_StoreCatBus){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}

				if($Res_StoreCatBus){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_StoreCatBus) {
				echo 'Exception Caught ', $Exception_StoreCatBus->getMessage();
			}			
		}

		// for delete user business
		public function DeleteUserBusiness($Delete_Id){
			try {
				$DeleteSqlUserBusiness = "DELETE FROM multyple_business WHERE business_id='$Delete_Id'";
				// echo $DeleteSqlUserBusiness; exit();
				$Res_DeleteUserBusiness = mysqli_query($this->Connect_db(), $DeleteSqlUserBusiness	);
				if(!$Res_DeleteUserBusiness){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				if($Res_DeleteUserBusiness){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_DeleteUserBusiness) {
				echo 'Exception Caught ', $Exception_DeleteUserBusiness->getMessage();
			}			
		}

		// for show user business
		public function ListUserBusiness($Id){
			try {
				$BusinessSqlUser = "SELECT mb.id,mb.business_id,mb.user_id,business.name as business_name 
									FROM `multyple_business` 
									as mb LEFT JOIN business ON business.`id` = mb.`business_id` where user_id = '".$Id."'";
				$Res_UserBusiness = mysqli_query($this->Connect_db(), $BusinessSqlUser);
				if(!$Res_UserBusiness){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				// making associative array
				while($Row_UserBusiness = mysqli_fetch_assoc($Res_UserBusiness)){
				    $ArrUserBusiness[] = $Row_UserBusiness; // Inside while loop
				}
				// echo '<pre>'; 			
				// print_r($ArrUserBusiness); exit;
				if(!empty($ArrUserBusiness)){
					return $ArrUserBusiness;
				}else{
					return 0; 
	 			}	
			} catch (Exception $Exception_ListUserBusiness) {
				echo 'Exception Caught ', $Exception_ListUserBusiness->getMessage();
			}
			
		}

		// for list all business available in database
		public function ListCategory(){
			try {
				$CatSql = "SELECT * FROM category";
				
				$Res_Cat = mysqli_query($this->Connect_db(), $CatSql);
				

				if(!$Res_Cat){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				// makking arry
				while ($Row_Cat = mysqli_fetch_assoc($Res_Cat)) {
					$Arr_Cat[] = $Row_Cat;
				}
				// echo '<pre>'; 			
				// print_r($ArrAllBusiness); exit; 
				if(!empty($Arr_Cat)){
					return $Arr_Cat;
				}else{
					return 0; 
	 			}	
			} catch (Exception $Exception_Cat) {
				echo 'Exception Caught ', $Exception_Cat->getMessage();
			}	
		}

		public function ListCategoryBusiness(){
			try {
				$Bus_CatSql = "SELECT * FROM category_business";				
				$Res_Cat_Bus = mysqli_query($this->Connect_db(), $Bus_CatSql);
				if(!$Res_Cat_Bus){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				// makking arry
				while ($Row_Bus_Cat = mysqli_fetch_assoc($Res_Cat_Bus)) {
					$Arr_Bus_Cat[] = $Row_Bus_Cat;
				}
				if(!empty($Arr_Bus_Cat)){
					return $Arr_Bus_Cat;
				}else{
					return 0; 
	 			}	
			} catch (Exception $Exception_Bus_Cat) {
				echo 'Exception Caught ', $Exception_Bus_Cat->getMessage();
			}	
		}

		// for list all business available in database
		/*public function ListAllBusines(){
			try {
				$SqlListAllBusines = "SELECT * FROM business WHERE subcate_status != '0'";			
				$Res_ListAllBusiness = mysqli_query($this->Connect_db(), $SqlListAllBusines);
				if(!$Res_ListAllBusiness){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				// makking arry
				while ($Row_ListAllBusiness = mysqli_fetch_assoc($Res_ListAllBusiness)) {
					$ArrAllBusiness[] = $Row_ListAllBusiness;
				}
				// echo '<pre>'; 			
				// print_r($ArrAllBusiness); exit; 
				if(!empty($ArrAllBusiness)){
					return $ArrAllBusiness;
				}else{
					return 0; 
	 			}	
			} catch (Exception $Exception_ListAllBusiness) {
				echo 'Exception Caught ', $Exception_ListAllBusiness->getMessage();
			}	
		}*/
		
		// for show user profile 
		public function ViewProfile($Id){
			try {				
	 			$UserSqlViewProfile = "SELECT * FROM user WHERE id = $Id";
				$Res_ViesProfile = mysqli_query($this->Connect_db(), $UserSqlViewProfile);

				if(!$Res_ViesProfile){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}					
				// makking arry
				while ($Row_UserViewProfile = mysqli_fetch_assoc($Res_ViesProfile)) {
					$ArrUserProfile[] = $Row_UserViewProfile;
				}
				// echo '<pre>'; 			
				// print_r($ArrUserProfile); exit;
				if(!empty($ArrUserProfile)){
					return $ArrUserProfile;
				}
			} catch (Exception $Exception_ViewProfile){
				echo 'Exception Caught ', $Exception_ViewProfile->getMessage();
			}
		}

		// for show user profile 
		public function ViewUserBusImages($Business_id, $Id){
			try {	
				// this is example query
				//SELECT mb.*,u.*, b.name as business_name FROM multyple_business mb INNER JOIN user u ON u.id = mb.user_id INNER JOIN business b ON mb.business_id = b.id WHERE mb.user_id = 41

				// SELECT u.id,i.user_id, i.business_id, i.image FROM images i INNER JOIN user u ON u.id = i.user_id WHERE i.user_id = 41

	 			$SqlViewBusImage = "SELECT u.id,i.user_id, i.business_id, i.image FROM images i INNER JOIN user u ON u.id = i.user_id WHERE i.user_id = '$Id' AND i.business_id = '$Business_id'";

	 			// echo $SqlViewBusImage; exit();

				$Res_ViewBusImage = mysqli_query($this->Connect_db(), $SqlViewBusImage);

				if(!$Res_ViewBusImage){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}					
				// makking arry
				while ($Row_ViewBusImage = mysqli_fetch_assoc($Res_ViewBusImage)) {
					$ArrViewBusImage[] = $Row_ViewBusImage;
				}
				// echo '<pre>'; 	
				// print_r($ArrViewBusImage); exit;
				if(!empty($ArrViewBusImage)){
					return $ArrViewBusImage;
				}
			} catch (Exception $Exception_ViewBusImage){
				echo 'Exception Caught ', $Exception_ViewBusImage->getMessage();
			}
		}

		// for get id of BUSINESS NAME
		public function GetBusinessId($Busness_Name){
			try {				
	 			$SqlGetBusinessId = "SELECT id FROM business WHERE name = '$Busness_Name'";
	 			// echo $SqlGetBusinessId; exit();
				$Res_GetBusinessId = mysqli_query($this->Connect_db(), $SqlGetBusinessId);
				if(!$Res_GetBusinessId){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}					
				// makking arry
				$Row_GetBusinessId = mysqli_fetch_assoc($Res_GetBusinessId);
				$ArrGetBusinessId = $Row_GetBusinessId;
				// echo '<pre>'; 			
				// print_r($ArrGetBusinessId); exit;
				if(!empty($ArrGetBusinessId)){
					return $ArrGetBusinessId;
				}
			} catch (Exception $Exception_GetBusinessId){
				echo 'Exception Caught ', $Exception_GetBusinessId->getMessage();
			}
		}
	}
	$crud_operation = new Crud_Operation();
?>