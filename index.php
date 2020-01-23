<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if(empty($username)){
    header("Location:home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    
</head>
<body>
    <?php
    include_once("./design/navbar.php");
    ?>
    <div class="container-fluid page p-0" style="height:500px;">
      <div class="container-fluid p-0" style="margin-top: -10px;">
          <img src="./photos/contentpage_105_10_1.jpg" width="100%" height="200px">
      </div> 
      <div class="container">
          <div class="row">
            <div class="col-lg-2 col-3" style="box"></div>
            <div class="col-lg-10 col-9"></div> 
          </div>
     </div> 
    </div>

   <?php include_once("./design/footer.php");?>
<script src="./js/index.js"></script>
</body>
</html>