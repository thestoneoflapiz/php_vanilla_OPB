var posts = [];

$(document).ready(function(){
  
  getPosts();

});

function getPosts(){
  var func = "list_post";
  $.ajax("../controllers/ApiController.php?func="+func,{
    type: "get",
    success: function(data, status, xhr){
      posts = data.list;
      createFeed(data.list);
    }, 
    error: function(jqXhr, textStatus, errorMessage){
      console.log("jqXhr: ", jqXhr);
      console.log("textStatus: ", textStatus);
      console.log("errorMessage: ", errorMessage);
    }
  });
}

function createFeed(data){

  var feed = $("#feed");

  var items = data.map(function(post, iPost){

    var elCommentForm = `
      <div class="col-12">
        <div class="row post_comment">
          <div class="col-12">
            <textarea name="pc_${post.id}" id="pc_${post.id}_comment" class="comment_input __black"></textarea>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" onclick="handleComment(${post.id})">Comment</button>
          </div>
        </div>
      </div>
    `;

    var elComments = post.hasOwnProperty("comments") ? 
      post.comments.map(function(com, iCom){
      return `
        <div class="col-10">
          <p class="comment">${com.comment} <br/> <small>${com.c_at}</small></p>
        </div>
        <div class="col-2">
          <div class="d-flex flex-row-reverse align-items-center pr-2">
          <button class="btn btn-sm btn-outline-danger m-1" onclick="handleDeleteComment(${post.id},${com.id})">❌</button>
          </div>
        </div>
      `;
    }) : [""];

    var elPostGroup = `
      <div class="col-7 post_group __black mb-2" id="post__group_${post.id}">
        <div class="d-flex flex-row-reverse align-items-center pr-2">
          <button class="btn btn-sm btn-outline-danger m-1" onclick="handleDeletePost(${post.id})" id="deletePost__btn">❌</button>
          <button class="btn btn-sm btn-outline-primary m-1" onclick="handleEditPost(${post.id})" id="editPost__btn">✒</button>
          <button class="btn btn-sm btn-outline-danger m-1 hidden" onclick="handleCancelEditPost(${post.id})" id="cancelEditPost__btn">🔙</button>
        </div>
        <h1 class="fw-bold" id="postTitle__display">${post.title}</h1>
        <p id="postTextarea__display" class="blog">${post.post} <br/><small>${post.c_at}</small></p>
        <div id="postEdit__form" class="mb-1 hidden"></div>
        <div class="row comment_group">
          <hr/>
          ${elComments.join(" ")}
          ${elCommentForm}
        </div>
      </div>
    `;
  
    return elPostGroup;
  });

  feed.html(items.join(" "));
}

function handleComment(id){
  if(id){

    var textComment = $(`#pc_${id}_comment`);
    if(textComment && textComment.val().length > 0){

      postComment(textComment.val(), id);

    }else{

      alert("What do you want to say? 👀");

    }
  }
}

function postComment(comment, id){
  var func = "add_comment";
  $.ajax("./controllers/ApiController.php",{
    type: "post",
    data: {
      func, 
      comment, 
      id
    },
    success: function(data, status, xhr){
      setTimeout(() => {
        getPosts();
      }, 1000);
    }, 
    error: function(jqXhr, textStatus, errorMessage){
      console.log("jqXhr: ", jqXhr);
      console.log("textStatus: ", textStatus);
      console.log("errorMessage: ", errorMessage);
    }
  });
}

function handlePost(){

  var title = $(`#title`);
  var post = $(`#post`);
  if(title && title.val().length > 0 && post && post.val().length > 0){

    postBlog(title.val(),post.val(), null);

  }else{

    alert("What do you want to say? 👀");

  }
}

function postBlog(title, post, id){
  var func = id ? "edit_post" : "add_post";
  $.ajax("../controllers/ApiController.php",{
    type: "post",
    data: {
      func, 
      title, 
      post,
      id
    },
    success: function(data, status, xhr){
      $(`#title`).val("");
      $(`#post`).val("");

      $('#newPost__modal').modal('hide');

      setTimeout(() => {
        getPosts();
      }, 1000);
    }, 
    error: function(jqXhr, textStatus, errorMessage){
      console.log("jqXhr: ", jqXhr);
      console.log("textStatus: ", textStatus);
      console.log("errorMessage: ", errorMessage);

      $('#newPost__modal').modal('hide');
    }
  });
}

function handleDeletePost(id){
  const postTitle = $("#delete__modal_title");
  const postId = $("#delete__id");
  const deleteModalBtn = $("#deleteModal_btn");

  deleteModalBtn.click(function(){
    deletePost();
  });

  const post = posts.find(p => p.id==id);
  postTitle.html("~Post: "+post?.title);
  postId.val(id);

  $('#delete__modal').modal('show');
  
}

function deletePost(){
  const postId = $("#delete__id");
  const id = postId.val();

  var func = "delete_post";
  $.ajax("../controllers/ApiController.php",{
    type: "post",
    data: {
      func, 
      id, 
    },
    success: function(r){
      
      postId.val("");
      $('#delete__modal').modal('hide');

      setTimeout(() => {
        getPosts();
      }, 1000);
    }, 
    error: function(jqXhr, textStatus, errorMessage){
      console.log("jqXhr: ", jqXhr);
      console.log("textStatus: ", textStatus);
      console.log("errorMessage: ", errorMessage);
    }
  });
}

function logout(){
  window.location.replace("/logout");
}

function handleDeleteComment(postId, id){
  const comTitle = $("#delete__modal_title");
  const comId = $("#delete__id");
  const deleteModalBtn = $("#deleteModal_btn");

  deleteModalBtn.click(function(){
    deleteComment();
  });
  
  const post = posts.find(p => p.id==postId);
  const comment = post.comments.find(c => c.id==id);

  comTitle.html("~Comment: "+comment?.comment);
  comId.val(id);

  $('#delete__modal').modal('show');
  
}

function deleteComment(){
  const comId = $("#delete__id");
  const id = comId.val();

  const func = "delete_comment";
  $.ajax("../controllers/ApiController.php",{
    type: "post",
    data: {
      func, 
      id, 
    },
    success: function(r){
      
      comId.val("");
      $('#delete__modal').modal('hide');

      setTimeout(() => {
        getPosts();
      }, 1000);
    }, 
    error: function(jqXhr, textStatus, errorMessage){
      console.log("jqXhr: ", jqXhr);
      console.log("textStatus: ", textStatus);
      console.log("errorMessage: ", errorMessage);
    }
  });
}

function handleEditPost(id){
  const deleteBtn = $("#deletePost__btn");
  const editBtn = $("#editPost__btn");
  const cancelEditBtn = $("#cancelEditPost__btn");

  deleteBtn.addClass("hidden");
  editBtn.addClass("hidden");
  cancelEditBtn.removeClass("hidden");

  const post = posts.find(p => p.id==id);

  const postGroup = $(`#post__group_${id}`);
  const postTitleDisplay = postGroup.find('h1#postTitle__display');
  const postTextareaDisplay = postGroup.find('p#postTextarea__display');
  const postEditForm = postGroup.find('div#postEdit__form');

  postTitleDisplay.addClass("hidden");
  postTextareaDisplay.addClass("hidden");

  postEditForm.html(`
    <div class="form-group">
      <label for="title">Title</label>
      <input type="input" class="form-control" id="postTitle_${id}" value="${post.title}">
    </div>
    <div class="form-group mb-3">
      <label for="post">Post</label>
      <textarea class="form-control" id="postTextarea_${id}" rows="3">${post.post}</textarea>
    </div>
    <button type="button" class="btn btn-outline-success btn-sm mb-2" onclick="editPost(${id})">Save ✅</button>
  `);

  postEditForm.removeClass("hidden");
}

function handleCancelEditPost(id){
  const deleteBtn = $("#deletePost__btn");
  const editBtn = $("#editPost__btn");
  const cancelEditBtn = $("#cancelEditPost__btn");

  deleteBtn.removeClass("hidden");
  editBtn.removeClass("hidden");
  cancelEditBtn.addClass("hidden");

  const postGroup = $(`#post__group_${id}`);
  const postTitleDisplay = postGroup.find('h1#postTitle__display');
  const postTextareaDisplay = postGroup.find('p#postTextarea__display');
  const postEditForm = postGroup.find('div#postEdit__form');

  postTitleDisplay.removeClass("hidden");
  postTextareaDisplay.removeClass("hidden");

  postEditForm.addClass("hidden");
  postEditForm.html("");
}

function editPost(id){
  const title = $(`#postTitle_${id}`);
  const post = $(`#postTextarea_${id}`);

  if(title && title.val().length > 0 && post && post.val().length > 0){

    postBlog(title.val(),post.val(), id);

  }else{

    alert("What do you want to say? 👀");

  }

}