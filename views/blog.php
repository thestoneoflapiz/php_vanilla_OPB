<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>One Paper Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/fav.png" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="paper-bg">
    
    <main>
      <div class="floating_login-btn">
        <button class="btn btn-warning __custom_login" onclick="goTo('login')">🚀</button>
      </div>

      <div class="mt-2">
        <div class="row justify-content-center align-items-center">
          <div class="col text-center m-5">
            <h1 class="title">🌿ONE PAPER BLOG🌿</h1>
          </div>
        </div>
        <div class="row justify-content-center align-items-center" id="feed">
          <!-- <div class="col-7 post_group">
            <h1 class="fw-bold">Post#1</h1>
            <p>
              "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            </p>
            <div class="row">
              <hr/>
              <div class="col-12">
                <p>My comment is! #1 <br/> <small>March 25, 1998 10 PM</small></p>
              </div>
              <div class="col-12 comment_group">
                <div class="row post_comment">
                  <div class="col-12">
                    <textarea name="pc_1" id="pc_1_comment" class="comment_input"></textarea>
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
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./js/blog.js"></script>
  </body>
</html>
