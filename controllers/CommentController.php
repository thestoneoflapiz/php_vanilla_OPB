<?php 

  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  
  include_once("../database.php");

  class CommentController
  {

    function __construct(){

    }

    public function list(){
      
      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $comments = $dbConnect->queryToDB(
        "SELECT comments.*, DATE_FORMAT(created_at, '%M %d, %Y %h:%i %p') as c_at FROM comments WHERE deleted_at IS NULL ORDER BY created_at DESC"
      );

      if($comments->num_rows > 0){

        $comments_list = $comments->fetch_all(MYSQLI_ASSOC);
        
        $this->returnJSON([
          "list" => $comments_list
        ], 200);
      
      }

      $this->returnJSON([
        "list" => [],
        "message" => "no record found!"
      ], 400);
      
    }

    public function item(){

    }

    public function add($request){
      if(!$request["comment"] || !$request["id"]){
        $this->returnJSON([
          "message" => "required fields: comment and id!"
        ], 400);
      }

      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $newComment = htmlspecialchars(str_replace("'", "\'", $request['comment']));

      $query = "INSERT INTO comments (comment, post_id, created_at) VALUES ('{$newComment}', {$request['id']}, NOW())";
      if($_SESSION["logged"] && !empty($_SESSION["user"])){
        $query = "INSERT INTO comments (comment, post_id, created_at, created_by) VALUES ('{$newComment}', {$request['id']}, NOW(), {$_SESSION['user']['id']})";
      }

      $comment = $dbConnect->queryToDB($query);

      if($comment){

        $this->returnJSON([
          "message" => "success!",
          "data" => $comment,
        ], 200);

      }

      $this->returnJSON([
        "message" => "no record found!"
      ], 400);

    }

    public function edit(){

    }

    public function delete($request){
      if(!$request["id"]){
        $this->returnJSON([
          "message" => "Not sure what to delete. 🤷🏻‍♀️"
        ], 400);
      }

      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $comment = $dbConnect->queryToDB("DELETE FROM comments WHERE id = {$request['id']}");

      if($comment){

        $this->returnJSON([
          "message" => "success!",
          "data" => $comment,
        ], 200);

      }

      $this->returnJSON([
        "list" => [],
        "message" => "no record found!"
      ], 400);
    }

    function returnJSON($data, $status){
      header('Content-Type: application/json; charset=utf-8');
      http_response_code($status);
      echo json_encode($data);
      exit;
    }
  }

?>