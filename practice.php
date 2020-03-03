<?php  require_once("./database/database.php");            ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
  <script src="./js/jquery.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/index.css">
  <script src="./ckeditor/ckeditor.js"></script>
  <title>Document</title>
</head>

<body>

  <div class="container">
    <div class="row mt-4">
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <h4>Create Artical</h4>
        <hr>
        <form class="artical-from" method="POST">
          <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-pencil"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Artical name" name="title" id="title">
          </div>

          <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Author name" name="author" id="author">
          </div>

          <div class="form-group">
            <label for="editor1">Description:</label>
            <textarea name="editor1" id="des"></textarea>
          </div>

          <button class="btn btn-warning btn-md mb-4 save-btn" type="submit"><i class="fa fa-send mr-2"></i>Submit</button>

        </form>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>

<button id="save" onclick="save()">Save me</button>

 <script>
         function save() {

             var question = CKEDITOR.instances.editor1.getData();
             alert(question);

             $.ajax({
                type: 'POST',
                data: {file: question},
                url: "./php/artical.php?xyz="+question+"",
                success: function (html) {
                    alert('may be saved');
                    $("#show").html(html);
                }
            });
            return false;
         }
 </script> 

 <div id="show"></div>
  //  <script>
  //    $(document).ready(function() {
    //   $(".artical-from").submit(function(e) {
    //     e.preventDefault();
    //     var data = CKEDITOR.instances.editor1.getData();
    //     var title = $("#title").val();
    //     var autor = $("#author").val();
    //     $.ajax({
    //       type: "POST",
    //       url: "./php/artical.php",
    //       data: {
    //         title :title,
    //         autor : autor,
    //         editor : data
    //       },
    //       success: function(response) {
    //         alert(response);
    //       }

    //     });
    //   });
    // })
  // </script>
  <script>
    CKEDITOR.replace('editor1');
  </script>
</body>

</html>