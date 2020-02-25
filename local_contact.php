<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
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

<div class="container-fluid">
        <div class="row">
            <div class="col-md-6 p-4">
                <div class='jumbotron bg-white'>
                    <h4>GET IN TOUCH</h4>
                    <p class="text-justify">We're here for you,and we're wearing our thinking caps.But first swing by
                        our fantastic <span class="text-danger">Help Center</span>
                        for all your inVision product and technical needs!</p>
                    <span class="fa fa-envelope-o" style="color: #FE3B48; font-size: 22px;"></span><span class="ml-4"
                        style="font-size:16px;">souravsantra59680@gmail.com</span><br><br>
                    <span class="fa fa-mobile-phone" style="color: #FE3B48; font-size: 32px;"></span><span class="ml-4"
                        style="font-size:16px;">+91 7585069971</span><br><br>
                    <span class="fa fa-map-marker" style="color: #FE3B48; font-size: 24px;"></span><span class="ml-4"
                        style="font-size:16px;">Kalka, Haryana 133301</span>
                </div>
            </div>
            
            <div class="col-md-6">
                <!-- <img src="./images/contact-us-concept-landing-page_52683-12759 (2).jpg" width="100%"> -->
                
                <div class="position-absolute w-75 p-5 bg-white mb-4 rounded"
                    style=" z-index:1;box-shadow: 0px 0px 10px 0px #B4B4B4;margin-top:30%;">
                    <form>
                        <input type="text" placeholder="Your Name...." class="form-control mb-4" style="outline: none;"
                            name="name">
                        <input type="email" placeholder="Your Email...." class="form-control mb-4"
                            style="outline: none;" name="email">
                        <textarea class="form-control mb-4" placeholder="Message...." rows="5"></textarea>
                        <input type="submit" value="SEND" class="btn border-0 form-control text-center text-light font-weight-bold"
                            style="background-color: #FE3B48;">
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style=" background-color:#FE3B48;">
            <div class="col-md-12" style="background-color:#FE3B48;">
              <div style="height: 50px"></div>
              <div class="d-flex mb-3">
              <a href="#" class="d-block py-2 text-light mx-5">HOME</a>
              <a href="#" class="d-block py-2 text-light mr-5">SELL BOOKS</a>
              <a href="#" class="d-block py-2 text-light mr-5">ARTICLES</a>
              <a href="#" class="d-block py-2 text-light">CONTACT</a>
              </div>
              <div  style="margin-left:93%">
              <a href="#" class="text-light d-block py-2"><i class="fa fa-facebook"> </i></a>
              <a href="#" class="text-light d-block py-2"><i class="fa fa-twitter"> </i></a>
              <a href="#" class="text-light d-block py-2"><i class="fa fa-instagram"> </i></a>
              <a href="#" class="text-light d-block py-2"><i class="fa fa-youtube"> </i></a>
              </div>
              <div class="mb-3 d-flex justify-content-center">
              <a href="privacy.php" class=" text-light">Privacy policy</a>
              <a href="cookies.php" class="ml-4 text-light">Cookies policy</a>
              <a href="terms.php" class="ml-4 text-light">Terms and condition</a>

              </div>
            </div>
        </div>
    </div>
    <script src="./js/index.js"></script>
</body>
</html>

   