<?php

require_once(ROOT . DS . 'lib' . DS . 'Controller.php');
require_once(ROOT . DS . 'models' . DS . 'Model.php');

class SiteController extends Controller
{
    public function index(){
       echo "This is home page <br>";  
       echo "<a href='addbook' class='btn btn-default'>AddBook</a><br>";
       echo "<a href='site/view' class='btn btn-default'>View Books</a><br>";
    }

    public function addbook(){
        // echo 'create book';
        if(isset($_POST['addbook'])){
            $title = $_POST['title'];
            $auther = $_POST['auther'];
            $description = $_POST['description'];
            $this->model = new Model();
            $flag = $this->model->storeBook($title, $auther, $description);
            if($flag == true){
                echo '<script>alert("Book added");</script>';
            }
        }
        include (ROOT . DS . 'public' . DS . 'view'. DS .'addbook.php');

    }

    public function view(){
        // $params = App::getRouter()->getParams();
        // if(isset($params[0])){
        //     $alias = strtolower($params[0]);
        //     echo "here is your ".$alias." alias";
        // }
        $this->model = new Model();
        $books = $this->model->getBookList();
        include (ROOT . DS . 'public' . DS . 'view'. DS .'view.php');
    }

    public function admin_index(){
        echo "this is admin index";
    }
}
