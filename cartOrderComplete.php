<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if (empty($username)) {
    header("Location:cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Complete</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/animate.min.css">
    <style>
    #story-container .nav-link.active {
        color: red;
        background-image: url(./images/hover.png);
        background-repeat: no-repeat;
        background-position: bottom;
        padding-bottom: 15px;
        background-size: 0 0;
        -webkit-animation: hover 1s;
        -o-animation: hover 1s;
        -moz-animation: hover 1s;
        animation: hover 1s;
        animation-fill-mode: forwards;
    }

    @keyframes hover {
        0% {
            background-size: 0 0;
        }

        100% {
            background-size: 90% 15px;
        }
    }
    </style>
</head>
<body>
<div class="container p-4">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="./photos/oldbooknewlifeLogo.svg" height="90px" />
            </div>
            <div class="col-md-6 pt-4">
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="15"
                        aria-valuemin="0" aria-valuemax="100"><span><i class="fa fa-check-circle text-success"
                                aria-hidden="true"></i> SIGN IN</span> </div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"><span><i class="fa fa-check-circle text-success"
                                aria-hidden="true"></i> PLACE ORDER </span></div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100"><span><i class="fa fa-check-circle text-success"
                                aria-hidden="true"></i> PAYMENT </span></div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100"><span><i class="fa fa-check-circle text-success"
                                aria-hidden="true"></i> COMPLETET </span></div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <h3 class="text-center"><i class="fa fa-check-circle text-success fa-2x" aria-hidden="true"></i></h3>
    <h3 class="text-center text-success"> Order Complete</h3>

    <div class="container mt-4" style="padding-left:100px;padding-right:100px">
        <h4>Order Details</h4>
        <hr>
        <div class="container rounded border">
            
                <?php

                $bookid_obj = json_decode($_GET['bookid']);
                $email = $_GET['email'];
                $i=0;

                for($i=0;$i<count($bookid_obj);$i++){
                    $bookid = $bookid_obj[$i];
                
                $getOrderData = "SELECT * FROM buy WHERE bookid='$bookid' AND email='$email'";
                $response = $db->query($getOrderData);
                $orderData = $response->fetch_assoc();

                echo "<div class='row mb-4'>
                      <div class='col-md-4 py-3'>
                          <h6>Shipping Address</h6>
                          <p class='mb-0'>" . $orderData['fullname'] . "</p>
                          <p class='mb-0'>" . $orderData['landmark'] . "</p>
                          <p class='mb-0'>" . $orderData['house'] . ", " . $orderData['street'] . ", " . $orderData['city'] . ", " . $orderData['user_state'] . ", " . $orderData['pincode'] . "</p>
                          <p class='mb-0'>India</p></div>";
                echo "<div class='col-md-4 py-3'>
                         <h6>Payment Method</h6>";
                         if(($orderData['payment_method'])=='COD')
                         {
                             echo "<p>Pay on Delivery (Cash/Card). Cash on delivery (COD)</p>";
                         }else{
                            echo "<p>Online</p>";
                         }   
                     echo "</div>";
                echo "<div class='col-md-4 py-3'>
                <h6>Order Summary</h6>
                <table>
                    <tr>
                        <td class='pr-4'>Item(s) Subtotal : </td>
                        <td class='pl-4'>₹ <span>".$orderData['sell_price'].".00</span></td>
                    </tr>
                    <tr>
                        <td class='pr-4'>Shipping : </td>
                        <td class='pl-4'>₹ <span>0.00</span></td>
                    </tr>
                    <tr>
                        <td class='pr-4'>Total : </td>
                        <td class='pl-4'>₹ <span>".$orderData['sell_price'].".00</span></td>
                    </tr>
                    <tr>
                        <td class='pr-4 font-weight-bold'>Grand Total : </td>
                        <td class='pl-4'>₹ <span>".$orderData['sell_price'].".00</span></td>
                    </tr>
                </table>
            </div> </div><hr>";
                        }

                ?>
                
            
        </div>
        <div class="text-center my-4">
            <a href="./index.php" class="btn btn-warning">Continue Shopping</a>
        </div>

    </div>




</body>
</html>