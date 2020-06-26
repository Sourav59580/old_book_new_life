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
    <title>Payment</title>
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

    .custom-control-input:checked~.custom-control-label::before {
        background-color: red !important;
        border: red !important;
    }

    .custom-control-input:focus~.custom-control-label::before {
        box-shadow: none !important;
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
                        aria-valuemin="0" aria-valuemax="100">PAYMENT</div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">COMPLETE</div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    
    <div class="container py-4" style="padding-left:100px;padding-right:100px;">
        <h3>PAYMENT</h3>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form class="paymentForm">
                    <ul class="list-group mb-3">
                        <li class="list-group-item bg-info text-light">Select a payment method</li>
                        <li class="list-group-item">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment" id="online" value="Credit Card/Debit Card/Net
                                    Banking" class="custom-control-input">
                                <label class="custom-control-label" for="online">Credit Card/Debit Card/Net
                                    Banking</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment" id="COD" value="Pay on Delivery"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="COD">Pay on Delivery (Cash)</label>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-warning float-right">Continue</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $(".paymentForm").submit(function(e) {
            e.preventDefault();
            if (document.getElementById("COD").checked) {
                // alert(document.getElementById("COD").value)
                var url_string = window.location;
                var url = new URL(url_string);
                var bookidjson = url.searchParams.get("bookid");
                var bookidsobj = JSON.parse(bookidjson);
                var email = url.searchParams.get("email");
                var name = url.searchParams.get("name");
                var mobile = url.searchParams.get("mobile");
                var sellprice = url.searchParams.get("sellprice");
                //alert(bookid);
                $.ajax({
                    type : "POST",
                    url : "./php/cartProductcodPayment.php",
                    data : {
                        bookid : JSON.stringify(bookidsobj),
                        email : email
                    },
                    success : function(response){
                        
                        if(response.trim()=='success'){
                            window.location = "cartOrderComplete.php?email="+email+"&bookid="+encodeURIComponent(JSON.stringify(bookidsobj));
                        }else{
                            alert(response);
                        }
                    }
                })
                
            } else {

                var url_string = window.location;
                var url = new URL(url_string);
                var bookidjson = url.searchParams.get("bookid");
                var bookidsobj = JSON.parse(bookidjson);
                var email = url.searchParams.get("email");
                var name = url.searchParams.get("name");
                var mobile = url.searchParams.get("mobile");
                var sellprice = url.searchParams.get("sellprice");
               

                $.ajax({
                    type : "POST",
                    url : "./php/onlineCartProductPayment.php",
                    data : {
                        bookid : JSON.stringify(bookidsobj),
                        email : email
                    },
                    success : function(response){
                        
                        if(response.trim()=='success'){
                            window.location.href = './onlinePayment.php?name='+name+'&email='+email+'&mobile='+mobile+'&sellprice='+sellprice+'&bookid='+encodeURIComponent(JSON.stringify(bookidsobj));
                        }else{
                            alert(response);
                        }
                    }
                })
            }
        })

    })
    </script>


</body>
</html>