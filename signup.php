<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/animate.min.css">
    
</head>
<body>
    <?php
    include_once("./design/navbar.php");
    ?>
    <div class="container-fluid p-4">
    <div class="container bg-white p-4" style="box-shadow:0px 0px 5px 3px #ccc;margin-top:10px;">
    <h3 style="font-family: 'Righteous', cursive;">SIGNUP</h3>
    <hr>
     <div class="row">
         <div class="col-md-6 signup-container">
            <form class="signup-form">
                <div class="form-group mb-3">
                    <label for="firstname">Firstname<sup class="text-danger">*</sup></label>
                    <input type="text" name="firstname" placeholder="Mr. raj" class="form-control bg-light" id="firstname"></input>
                </div>
                <div class="form-group mb-3">
                    <label for="lastname">Lastname<sup class="text-danger">*</sup></label>
                    <input type="text" name="lastname" placeholder="Kumar" class="form-control bg-light" id="lastname"></input>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email<sup class="text-danger">*</sup></label>
                    <input type="email" name="email" placeholder="email@gmail.com" class="form-control bg-light" id="email"></input>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password<sup class="text-danger">*</sup></label>
                    <input type="password" name="password" placeholder="*******" class="form-control bg-light" id="password"></input>
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Phone<sup class="text-danger">*</sup></label>
                    <input type="number" name="phone" placeholder="+91.........." class="form-control bg-light" id="phone"></input>
                </div>
                <button class="btn btn-primary py-2 register-btn mb-3" type="submit">Register now</button>
            </form>
            <div class="alert alert-success d-none success-msg" role="alert">
             Signup success,please login...
             </div>
         </div>
         <div class="col-md-1"></div>
         <div class="col-md-5">
             <h4>OLD USER</h4>
             <p>If you have a account please login</p>
             <a href="./signin.php" class="btn btn-danger">Login now</a>
         </div>
     </div>
    </div>

    </div>

   <?php 
   include_once("./design/footer.php");
   ?>
   <script>
   $(document).ready(function(){
      $(".signup-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url : "./php/register.php",
            data : new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success : function(response){
              if(response.trim()=="success")
              {
                  $(".signup-form").fadeOut(2000,function(){
                      $(".success-msg").removeClass('d-none');
                  });     

              }
              else{
                  alert(response);
              }
            }

        });
      });
   });
   
   
   </script>
<script src="./js/index.js"></script>
</body>
</html>