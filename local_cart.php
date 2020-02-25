
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
    <?php
    include_once("./design/navbar.php");
    ?>
    <div class="container-fluid" style="background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);;margin-top:-25px;">
     <div class="row">
       <div class="col-md-4"></div>
       <div class="col-md-4 bg-white m-4 m-md-2 rounded shadow-lg text-center" style="height:400px">
         <div>
          <img src="./images/Cart Empty Icon.png" class="w-50">
         </div>
         <h3>Your cart is empty</h3>
         <p>You have no item in your shopping cart<br>Lets' go buy something!</p>
         <a href="./home.php" class="btn btn-danger btn-lg" style="border-radius:30px">Shop Now</a>
       </div>
       <div class="col-md-4"></div>
     </div>
    </div>

   <?php include_once("./design/footer.php"); ?>
</body>

</html>
