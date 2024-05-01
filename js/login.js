$(document).ready(function(){

});

function handleLogin(){
  var uname = $("#opb_username");
  var upass = $("#opb_password");

  if(uname && uname.val().length > 0 && upass && upass.val().length > 0){
    
    loginCreds(uname.val(), upass.val());
    return;
  }

  alert("You need to input your creds first 👀");

}

function loginCreds(username, password){
  var func = "login_login";
  $.ajax("./controllers/ApiController.php?func="+func,{
    type: "post",
    data: {
      func, 
      username, 
      password
    },
    success: function(){
      window.location.replace("/admin");
    }, 
    error: function(jqXhr, textStatus, errorMessage){
      console.log("jqXhr: ", jqXhr);
      console.log("textStatus: ", textStatus);
      console.log("errorMessage: ", errorMessage);
    }
  });
}