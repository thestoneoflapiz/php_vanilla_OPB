<?php 

if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

$request = $_SERVER["REQUEST_URI"];

switch ($request) {
  case '/':
  case '':
    require __DIR__."/views/blog.php";
    break;

  case '/login':
    if(!empty($_SESSION["user"]) && !empty($_SESSION["logged"]) && $_SESSION["logged"]){
      header('Location: /admin'); 
      break;
    }

    require __DIR__."/views/auth/login.php";
    break;

  case '/logout':
    
    session_unset();
    session_destroy();
    header('Location: /login');

    break;

  case '/admin':
    if(empty($_SESSION["user"]) && (empty($_SESSION["logged"]) || !$_SESSION["logged"])){
      header('Location: /login'); 
      break;
    }
    
    require __DIR__."/views/admin.php";
    break;
  
  default:

    $filename = __DIR__."/views/".$request.".php";
    if(file_exists($filename)){

      require $filename;
      break;
    
    }

    http_response_code(404);
    require "views/error/404.php";
    break;
}
