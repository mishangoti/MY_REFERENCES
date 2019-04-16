<?php
class Database
{
	
	
	private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'training';

	//  echo 'test';  exit();  
    //private $cont  = null;
     
//     public function __construct() {
//         die('Init function is not allowed');
//     }
     
    public static function connect()
    {
    
	// One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".$this->$_Host.";"."dbname=".$this->$_database, $this->$_username, $this->$_password); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
        
