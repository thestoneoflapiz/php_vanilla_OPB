<?php 
include("./PostController.php");
include("./CommentController.php");
include("./LoginController.php");

$responsePOST = $_POST;
$responseGET = $_GET;

$postMethods = ["add", "edit", "delete", "import", "export", "login", "logout"];
$getMethods = ["get", "list", "item"];

if(count($responsePOST) > 0 && $responsePOST["func"]){

  $funcMethod = explode("_", $responsePOST["func"]);

  if(in_array($funcMethod[0], $postMethods)){
    $api = new ApiController;
    $api->execApi($responsePOST, $funcMethod);
    return;
  }
  
}

if(count($responseGET) > 0 && $responseGET["func"]){

  $funcMethod = explode("_", $responseGET["func"]);

  if(in_array($funcMethod[0], $getMethods)){
    $api = new ApiController;
    $api->execApi($responseGET, $funcMethod);
    return;
  }
}

echo json_encode([
  "status" => 404,
  "message" => "API not found!"
]);

class ApiController
{

  public function execApi($res, $funcMethod){    

    $controller = $funcMethod[1];
    $method = $funcMethod[0];
    switch ($controller) {
      case 'post':

        $controller = new PostController;
        $controller->$method($res);

      break;

      case 'comment':

        $controller = new CommentController;
        $controller->$method($res);

      break;

      case 'login':

        $controller = new LoginController;
        $controller->$method($res);

      break;
    
      default:
        echo json_encode([
          "status" => 404,
          "message" => "API not found!"
        ]);
      break;
    }
  }

}

?>