<?php

	include_once 'config/Database.php';

	class Model extends Database{
		public function getBookList()
		{
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
				// print_r($ArrgetBookList);

				if(!empty($ArrgetBookList)){	
					return $ArrgetBookList;
				}else{
					return 0; 
	 			}	
			} catch (Exception $Exception_getBookList) {
				echo 'Exception Caught ', $Exception_getBookLists->getMessage();
			}
			/*return array(
				"Jungle Book" => new Book("Jungle Book", "R. Kipling", "A classic book."),
				"Moonwalker" => new Book("Moonwalker", "J. Walker", ""),
				"PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")
			);*/
		}
	}

?>