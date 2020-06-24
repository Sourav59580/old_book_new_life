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
    <div class="container py-4" style="padding-left:100px;padding-right:100px;">
        <div class="row mb-3">
            <div class='col-md-3'>
                <h3>Your Orders</h3>
            </div>
            <div class='col-md-2'></div>
            <div class='col-md-4'>
                <form>
                    <input type="search" class="form-control empty" placeholder="&#xF002;   Search all oders">
                </form>
            </div>
            <div class='col-md-3'></div>
        </div>
        <div class="container mt-4">

            <?php

             $email = $_SESSION['username'];
             $getOrdersData = "SELECT * FROM buy WHERE email = '$email' AND delivery_status='processing'";
             $response = $db->query($getOrdersData);
             while($data = $response->fetch_assoc()){
                 echo "<div class='card mb-4'><div class='card-header'>
                 <div class='row'>
                     <div class='col-2'>
                     <p class='mb-0'>ORDER PLACED</p>
                      ".$data['order_date']."
                     </div>
                     <div class='col-2 text-center'>
                       <p class='mb-0'>TOTAL</p>
                       ₹<span> ".$data['sell_price'].".00</span>
                     </div>
                     <div class='col-2'>
                         <p class='mb-0'>SHIP TO</p>
                         <div class='dropdown'>
                           <a href='#' class='dropdown-toggle' id='address' data-toggle='dropdown'>".$data['fullname']."</a>
                           <div class='dropdown-menu'>
                               <a class='dropdown-item'>".$data['landmark']."</a>
                               <a class='dropdown-item'>" . $data['house'] . ", " . $data['street'] . ", " . $data['city'] . ", " . $data['user_state'] . ", " . $data['pincode'] . "</a>
                               <a class='dropdown-item'>India</a>
                           </div>
                         </div>  
                     </div>
                     <div class='col-6 text-right'>
                        <p class='mb-0'>ORDER # <span>".$data['id']."</span></p>
                        <a href='#'>Order Details</a>
                     </div>
                 </div>
             </div>";
             $bookid = $data['bookid'];
             $getSellBookData = "SELECT * FROM sellbook WHERE id='$bookid'";
             $sellBookResponse = $db->query($getSellBookData);
             $sellBookData = $sellBookResponse->fetch_assoc();
             $image = "data:image/png;base64," . base64_encode($sellBookData['book_image']);
             echo "
             <div class='card-body'>
             <div class='d-flex'>
                 <div style='width:50px'>
                     <img src='".$image."'
                         class='w-100'>
                 </div>
                 <div class='ml-4'>
                     <p class='font-weight-bold text-primary mb-0'>".$sellBookData['book_title']."</p>
                     <p class='mb-0'>By <span>".$sellBookData['book_author']."</span></p>
                     <p style='color: deeppink'> ₹<span>".$sellBookData['selling_price'].".00</span></p>
                 </div>
             </div>
         </div>";

             echo "</div>";
             }
             

            ?>
            <!-- <div class='card mb-4'>
                <div class='card-header'>
                    <div class='row'>
                        <div class='col-2'>
                            <p class='mb-0'>ORDER PLACED</p>
                            5 March 2020
                        </div>
                        <div class='col-2 text-center'>
                            <p class='mb-0'>TOTAL</p>
                            ₹<span> 650.00</span>
                        </div>
                        <div class='col-2'>
                            <p class='mb-0'>SHIP TO</p>
                            <div class='dropdown'>
                                <a href='#' class='dropdown-toggle' id='address' data-toggle='dropdown'>Sourav
                                    Santra</a>
                                <div class='dropdown-menu'>
                                    <a class='dropdown-item'>Landmark</a>
                                    <a class='dropdown-item'>House + Street + city + State + Pin</a>
                                    <a class='dropdown-item'>India</a>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 text-right'>
                            <p class='mb-0'>ORDER # <span>18</span></p>
                            <a href='#'>Order Details</a>
                        </div>
                    </div>
                </div>

                <div class='card-body'>
                    <div class='d-flex'>
                        <div style='width:50px'>
                            <img src='https://images-eu.ssl-images-amazon.com/images/I/41l5viRtb1L._SY180_.jpg'
                                class='w-100'>
                        </div>
                        <div class='ml-4'>
                            <p class='font-weight-bold text-primary mb-0'>Samsung Galaxy M30s (Blue, 4GB RAM, 64GB
                                Storage)</p>
                            <p class='mb-0'>By Sourav</p>
                            <p style='color: deeppink'> ₹<span> 650.00</span></p>
                        </div>
                    </div>
                </div>

            </div> -->




        </div>
    </div>


    <?php include_once("./design/footer.php"); ?>
</body>

</html>