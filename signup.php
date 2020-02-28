<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
    <div class="container-fluid p-4" style="margin-top:-25px;background-image: linear-gradient(to top, #dfe9f3 0%, white 100%);">
    <div class="container" >
    
     <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6 signup-container bg-white p-4 rounded" style="margin-top:10px;background-image: linear-gradient(to right, #92fe9d 0%, #00c9ff 100%);">
         <h3 style="font-family: 'Righteous', cursive;">SIGNUP</h3>
         <hr>
            <form class="signup-form mb-3">
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

             <p>If you have a account please login <a href="./signin.php" >Login now</a></p>
         </div>
         <div class="col-md-3"></div>
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