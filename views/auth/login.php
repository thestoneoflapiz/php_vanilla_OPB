<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login to Admin Office</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/fav.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="office-bg">
    
    <main>

      <div class="container mt-5">
        <div class="row justify-content-center align-items-center"
          style="height:80vh"
        >
          <div class="col-lg-4 col-md-6 col-sm-10 col-10">
            <div class="card text-center">
              <div class="card-header h2">
                🚀 
              </div>
              <div class="card-body">
                <h5 class="card-title">Login to Admin</h5>
                <p class="card-text">Manage all blog posts & comments hassle free. 🍃</p>
                <div class="mb-3">
                  <input type="username" class="form-control" id="opb_username" placeholder="input_your__username">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" id="opb_password" placeholder="******">
                </div>
                <button class="btn btn-sm btn-outline-primary" onclick="handleLogin()">Take me there!</button>
              </div>
              <div class="card-footer text-body-secondary small">
                PHP vanilla mini project by ~thestoneoflapiz 🚀
              </div>
            </div>
          </div>
        </div>
      </div>

      <p class="credits pl-3">
        Image by <a href="https://www.freepik.com/free-vector/office-background-video-conference_9702342.htm#query=abstract%20office&position=2&from_view=keyword&track=ais&uuid=ddfbc394-1bdd-4c95-8823-8a15244e1d6c">Freepik</a>
      </p>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>
  </body>
</html>
