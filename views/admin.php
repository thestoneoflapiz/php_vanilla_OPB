<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Office</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/fav.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="office-bg">
    
    <main>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand __custom" href="/admin">Admin Office 👨🏻‍💼</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav __custom">
            <li class="nav-item m-2">
              <button class="btn btn-outline-secondary" onclick="logout()">Logout</button>
            </li>
            
            <li class="nav-item m-2">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPost__modal">New Post 🔥</button>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container mt-5">
        <div class="row justify-content-center align-items-center" id="feed">
          <!-- <div class="col-7 post_group __black mb-2">
            <h1 class="fw-bold">Post#1</h1>
            <p>
              "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
              when an unknown printer took a galley of type and scrambled it to make a type 
              specimen book. It has survived not only five centuries, but also the leap into 
              electronic typesetting, remaining essentially unchanged. It was popularised in the 
              1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
              recently with desktop publishing software like Aldus PageMaker including versions 
              of Lorem Ipsum."
              <br/> <small>March 25, 2024 10:15 PM</small>
            </p>
            <div class="row">
              <hr/>
              <div class="col-12">
                <p>My comment is! #1 <br/> <small>March 25, 2024 10:15 PM</small></p>
              </div>
              <div class="col-12 comment_group">
                <div class="row post_comment">
                  <div class="col-12">
                    <textarea name="pc_1" id="pc_1_comment" class="comment_input __black"></textarea>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" onclick="handleComment('1')">Comment</button>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>

      <p class="credits pl-3">
        Image by <a href="https://www.freepik.com/free-vector/office-background-video-conference_9702342.htm#query=abstract%20office&position=2&from_view=keyword&track=ais&uuid=ddfbc394-1bdd-4c95-8823-8a15244e1d6c">Freepik</a>
      </p>
    </main>

    <div class="modal fade" id="newPost__modal" tabindex="-1" role="dialog" aria-labelledby="newPost__modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newPost__modalLabel">What are you thinking? 💭 <br/><small> ~New Post</small></h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="input" class="form-control" id="title" placeholder="Ka-Boom!💥 News Flash!">
            </div>
            <div class="form-group">
              <label for="post">Post</label>
              <textarea class="form-control" id="post" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="handlePost()">Post 🔥</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="delete__modal" tabindex="-1" role="dialog" aria-labelledby="delete__modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete__modalLabel">Are you sure to delete this? <br/><small id="delete__modal_title"> ~Post >>title<<</small></h5>
            <input type="hidden" id="delete__id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="deleteModal_btn">Delete ✅</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../js/admin.js"></script>
  </body>
</html>
