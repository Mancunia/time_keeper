<?php
class Database{
  
    // specify your own database credentials
    // private $host = "localhost"; 
    // private $db_name = "mydb";
    // private $username = "root";
    // private $password = "";
    // public $conn;


    function getdbconnect(){
      $conn = mysqli_connect("localhost","root","","time_keeper") or die("<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>OOPS!</strong> You are not connected.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>");

    return $conn;
  }
  
    // get the database connection
    // public function getConnection(){
  
    //     $this->conn = null;
  
    //     try{
    //         $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            
    //         //echo "hey i'm connected";
    //     }catch(PDOException $exception){
    //         echo "";
    //         die();
    //       // echo "Connection error: " . $exception->getMessage();
    //     }
  
    //     return $this->conn;
    // }
}

?>
