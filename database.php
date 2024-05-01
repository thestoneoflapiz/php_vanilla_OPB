<?php
 class DatabaseConnect {

    public $dbHost = "127.0.0.1";
    public $dbUser = "root";
    public $dbPass = "";
    public $dbName = "blog";

    public $connection;

    public function connectToDB(){
    
      $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);

      if ($this->connection->connect_error) {
        return die("Connection failed: " . $this->connection->connect_error);
      }
      
      return $this->connection;
    }

    public function queryToDB($sql){

      if($query = mysqli_query($this->connection, $sql)){  
        return $query;
      }else{  
        return mysqli_error($this->connection);  
      }  

      mysqli_close($this->connection);  
    }
 }
?>