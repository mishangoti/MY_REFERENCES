<?php

	include_once 'model/Model.php';
	include_once 'model/Book.php';

	class Controller{
		public $model;
		
		public function __construct()  
	    {  
	        $this->model = new Model();
	        $this->book = new Book();
	    } 
		
		public function invoke()
		{
			if (!isset($_GET['book']))
			{
				// no special book is requested, we'll show a list of all available books
				$books = $this->model->getBookList();
				include 'view/pages/booklist.php';
			}
			else
			{
				// show the requested book
				$book = $this->book->getBook($_GET['book']);
				include 'view/pages/viewbook.php';
			}
		}
	}

?>