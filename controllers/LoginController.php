<?php 

  include_once("../database.php");

  class LoginController
  {

    function __construct(){
      if(!isset($_SESSION)) 
      { 
        session_start(); 
      } 
    }

    public function login($request){
      
      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $findUser = $dbConnect->queryToDB(
        "SELECT * FROM users WHERE deleted_at IS NULL AND username = '{$request["username"]}'"
      );

      if($findUser->num_rows == 1){
        $user = $findUser->fetch_all(MYSQLI_ASSOC)[0];
        $check = $this->comparePassword($user["password"], $request["password"]);

        if($check){
          $_SESSION["user"] = $user;
          $_SESSION["logged"] = true;

          
          $this->returnJSON([], 200);
        }

        $this->returnJSON([
          "list" => [],
          "message" => "You don't have an account with us..."
        ], 400);

      }

      $this->returnJSON([
        "list" => [],
        "message" => "You don't have an account with us..."
      ], 400);
      
    }
  

  public function comparePassword($uPass, $ePass){
    if(password_verify($ePass, $uPass)) return true;

    return false;
  }

  public function returnJSON($data, $status){
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($status);
    echo json_encode($data);
    exit;
  }

}

?>