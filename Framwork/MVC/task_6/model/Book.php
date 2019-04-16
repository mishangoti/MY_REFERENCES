<?php

	include_once 'config/Database.php';

	class Book extends Database{	
		public function getBook($id)
		{
			try 	{
				$getBook = "SELECT * FROM book WHERE id = $id";
				// echo $getBook; exit();
				$Res_getBook = mysqli_query($this->Connect_db(), $getBook);

				if(!$Res_getBook){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				while($Row_getBook = mysqli_fetch_assoc($Res_getBook)){
				    $ArrgetBook[] = $Row_getBook; 
				}

				// echo '<pre>';
				// print_r($ArrgetBook);

				if(!empty($ArrgetBook)){

					return $ArrgetBook;
				}else{
					return 0; 
	 			}	
			} catch (Exception $Exception_getBook) {
				echo 'Exception Caught ', $Exception_getBook->getMessage();
			}
			// $allBooks = $this->getBookList();
			// return $allBooks;
		}
	
	}

?>