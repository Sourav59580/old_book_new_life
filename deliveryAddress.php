<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if (empty($username)) {
    header("Location:show_book_view_details.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select a Delivery Address</title>
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
                        aria-valuemin="0" aria-valuemax="100"><span>PLACE ORDER </span></div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">PAYMENT</div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">COMPLETE</div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="container px-4">
            <h3>Add a new address</h3>
            <p>Be sure to click "Deliver to this address" when you've finished.</p>
        </div>
        <hr>
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-6">
                    <form class="deliveryAddressForm">
                        <div class="form-group">
                            <label for="fullname">Full Name<span class="text-danger">*</span> : </label>
                            <input type="text" name="fullname" id="fullname" class="form-control" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number<span class="text-danger">*</span> : </label>
                            <input type="text" name="mobile" id="mobile" class="form-control" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode<span class="text-danger">*</span> : </label>
                            <input type="text" name="pincode" id="pincode" class="form-control" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="house">Flat, House no., Building, Company, Apartment<span
                                    class="text-danger">*</span> : </label>
                            <input type="text" name="house" id="house" class="form-control" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="street">Area, Colony, Street, Sector, Village<span class="text-danger">*</span>
                                : </label>
                            <input type="text" name="street" id="street" class="form-control" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="landmark">Landmark e.g. near apollo hospital<span class="text-danger">*</span> :
                            </label>
                            <input type="text" name="landmark" id="landmark" class="form-control" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="city">Town/City<span class="text-danger">*</span> : </label>
                            <input type="text" name="city" id="city" class="form-control" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="state">State<span class="text-danger">*</span> : </label>
                            <input type="text" name="state" id="state" class="form-control" required='required'>
                        </div>
                        <button type="submit" class="btn btn-warning mb-4 float-right">Deliver to this address</button>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>

    <script>
    var url_string = window.location;
    var url = new URL(url_string);
    var bookid = url.searchParams.get("bookid");
    var sellprice = url.searchParams.get("sell_price");
    var email = sessionStorage.getItem("email");
    var emailId = sessionStorage.getItem("email");
    $(document).ready(function() {
        $(".deliveryAddressForm").submit(function(e) {
            //alert(sessionStorage.getItem("email"))
            e.preventDefault();
            var fullname = $("#fullname").val();
            var mobile = $("#mobile").val();
            var pincode = $("#pincode").val();
            var house = $("#house").val();
            var street = $("#street").val();
            var landmark = $("#landmark").val();
            var city = $("#city").val();
            var state = $("#state").val();

            $.ajax({
                type: "POST",
                url: "./php/delivery.php",
                data: {
                    bookid: bookid,
                    email: email,
                    fullname: fullname,
                    mobile: mobile,
                    pincode: pincode,
                    house: house,
                    street: street,
                    landmark: landmark,
                    city: city,
                    state: state
                },
                success: function(response) {
                    if(response.trim() == 'success'){
                        window.location = './payment.php?email='+email+'&bookid='+bookid+'&sellprice='+sellprice+'&name='+fullname+'&mobile='+mobile;
                    }else{
                        alert(response);
                    }
                }
            })

        })
    })
    </script>




</body>

</html>