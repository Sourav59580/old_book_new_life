<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if (empty($username)) {
    header("Location:home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <style>
        input.empty {
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
}
    </style>
</head>

<body>
    <?php
    include_once("./design/navbar.php");
    ?>
    <div class="container" style="height:500px;">

    <div></div>
      <div class="row mb-3">
          <div class='col-md-3'><h3>Your Orders</h3></div>
          <div class='col-md-2'></div>
          <div class='col-md-4'>
              <form>
                  <input type="search" class="form-control empty" placeholder="&#xF002;   Search all oders">
              </form>
          </div>
          <div class='col-md-3'></div>
      </div>
      <div class="row">
          <div class=""></div>
      </div>



      
    </div>


    <?php include_once("./design/footer.php"); ?>
</body>

</html>