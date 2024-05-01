$(document).ready(function(){
  getPosts();
});

function getPosts(){
  var func = "list_post";
  $.ajax("./controllers/ApiController.php?func="+func,{
    type: "get",
    success: function(data, status, xhr){
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
          <div class="col-12 mb-1">
            <textarea name="pc_${post.id}" id="pc_${post.id}_comment" class="comment_input"></textarea>
          </div>
          <div class="col-12">
            <button class="btn btn-warning" onclick="handleComment(${post.id})">Comment</button>
          </div>
        </div>
      </div>
    `;

    var elComments = post.hasOwnProperty("comments") ? 
      post.comments.map(function(com, iCom){
      return `
        <div class="col-12">
          <p class="comment">${com.comment} <br/> <small>${com.c_at}</small></p>
        </div>
      `;
    }) : [""];

    var elPostGroup = `
      <div class="col-md-7 col-sm-8 col-10 post_group mb-2">
        <h1 class="fw-bold">${post.title}</h1>
        <p class="blog">${post.post} <br/><small>${post.c_at}</small></p>
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

function goTo(link){
  window.location.replace(link);
}