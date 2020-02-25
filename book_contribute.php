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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contribute:Books</title>
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

    <div class="container-fluid" style="height:150px;margin-top:-25px;background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);">
        <div class="row" style="background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);">
            <div class="col-md-3 col-sm-6 d-flex align-items-center">
                <img src="./photos/32701-7-students-learning.png" width="100%">
            </div>
            <div class="col-md-1 d-md-block d-none"></div>
            <div class="col-md-5 col-sm-6 py-4">
                <h3 class="p-0" style="color:#ff165d">50 <span class="text-dark"> Libraries</span></h3>
                <h3 class="p-0" style="color:#ff165d">50 <span class="text-dark"> Government Schools</span></h3>
                <h3 class="p-0" style="color:#ff165d">5000 <span class="text-dark"> Children!</span></h3>
                <div class=" my-2">
                    <hr>
                    <h5 style="color:#ff165d">Support 'The Kids' Sustainable School Challenge'</h5>
                    <hr>
                </div>
            </div>
            <div class="col-md-3 d-md-block d-none d-md-flex align-items-center">
                <img src="./photos/32793-5-students-learning-transparent-background.png" class="w-100">
            </div>
        </div>
    </div>
    <div class="container-fluid" style="height: 500px;">
        
    
    </div>

    <?php include_once("./design/footer.php") ?>

    <script src="./js/index.js"></script>
</body>

</html>