<?php

require_once(ROOT . DS . 'models' . DS . 'Book.php');
require_once(ROOT . DS . 'models' . DS . 'database' . DS . 'Database.php');

class Model extends Database{
	public function getBookList(){
		try {
			$getBookList = "SELECT * FROM book";
			// echo $getBookList; exit();
			$Res_getBookList = mysqli_query($this->Connect_db(), $getBookList);

			if(!$Res_getBookList){
				$error = "Error description: " . mysqli_error($this->Connect_db());
				throw new Exception($error);
			}
			while($Row_getBookList = mysqli_fetch_assoc($Res_getBookList)){
			    $ArrgetBookList[] = $Row_getBookList; 
			}

			// echo '<pre>';
			// print_r($ArrgetBookList);exit();

			if(!empty($ArrgetBookList)){	
				return $ArrgetBookList;
			}else{
				return 0; 
 			}	
		} catch (Exception $Exception_getBookList) {
			echo 'Exception Caught ', $Exception_getBookLists->getMessage();
		}		
	}

	public function storeBook($title, $auther, $description){
		try {
			$SqlStoreBook = "INSERT INTO `book` (auther_name, title, description) VALUES ('$title', '$auther', '$description')";
			$Res_Store = mysqli_query($this->Connect_db(), $SqlStoreBook);
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
}

?>