<?php 

  include_once("../database.php");

  class PostController
  {

    function __construct(){

    }

    public function list(){
      
      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $posts = $dbConnect->queryToDB(
        "SELECT posts.*, DATE_FORMAT(created_at, '%M %d, %Y %h:%i %p') as c_at FROM posts WHERE deleted_at IS NULL ORDER BY created_at DESC"
      );

      if($posts->num_rows > 0){

        $posts_list = $posts->fetch_all(MYSQLI_ASSOC);

        $list = [];
        foreach ($posts_list as $key => $post) {
          
          $arrItem = $post;

          $comments = $dbConnect->queryToDB(
            "SELECT comments.*, DATE_FORMAT(created_at, '%M %d, %Y %h:%i %p') as c_at FROM comments WHERE deleted_at IS NULL AND post_id = ${post['id']} ORDER BY created_at DESC"
          );
    
          if($comments->num_rows > 0){
            $arrItem["comments"] = $comments->fetch_all(MYSQLI_ASSOC) ?? [];
          }

          $list[] = $arrItem;
          
        }
        
        $this->returnJSON([
          "list" => $list
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
      if(!$request["title"] || !$request["post"]){
        $this->returnJSON([
          "message" => "required fields: title and post!"
        ], 400);
      }

      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $newTitle = htmlspecialchars(str_replace("'", "\'", $request['title']));
      $newPost = htmlspecialchars(str_replace("'", "\'", $request['post']));

      $query = "INSERT INTO posts (title, post, created_at) VALUES ('{$newTitle}', '{$newPost}', NOW())";
      if($_SESSION["logged"] && !empty($_SESSION["user"])){
        $query = "INSERT INTO posts (title, post, created_at, created_by) VALUES ('{$newTitle}', '{$newPost}', NOW(), {$_SESSION['user']['id']})";
      }
      
      $post = $dbConnect->queryToDB($query);

      if($post){

        $this->returnJSON([
          "message" => "success!",
          "data" => $post,
        ], 200);

      }

      $this->returnJSON([
        "list" => [],
        "message" => "no record found!"
      ], 400);

    }

    public function edit($request){
      if(!$request["title"] || !$request["post"] || !$request["id"]){
        $this->returnJSON([
          "message" => "required fields: title, post, and id!"
        ], 400);
      }

      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $newTitle = htmlspecialchars(str_replace("'", "\'", $request['title']));
      $newPost = htmlspecialchars(str_replace("'", "\'", $request['post']));

      $query = "UPDATE posts SET title = '{$newTitle}', post = '{$newPost}', updated_at = NOW() WHERE id = {$request['id']}";
      if($_SESSION["logged"] && !empty($_SESSION["user"])){
        $query = "UPDATE posts SET title = '{$newTitle}', post = '{$newPost}', updated_at = NOW(), updated_by = {$_SESSION['user']['id']} WHERE id = {$request['id']}";
      }
      
      $post = $dbConnect->queryToDB($query);

      if($post){

        $this->returnJSON([
          "message" => "success!",
          "data" => $post,
        ], 200);

      }

      $this->returnJSON([
        "list" => [],
        "message" => "no record found!"
      ], 400);

    }

    public function delete($request){
      if(!$request["id"]){
        $this->returnJSON([
          "message" => "Not sure what to delete. 🤷🏻‍♀️"
        ], 400);
      }

      $dbConnect = new DatabaseConnect;
      $db = $dbConnect->connectToDB();

      $post = $dbConnect->queryToDB("DELETE FROM posts WHERE id = {$request['id']}");

      if($post){

        $this->returnJSON([
          "message" => "success!",
          "data" => $post,
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