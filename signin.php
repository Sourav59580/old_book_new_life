<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
    <div class="container p-4" style="background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);;margin-top:-25px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 bg-white p-4 rounded shadow-sm">
                <h3 style="font-family: 'Righteous', cursive;">SIGNIN</h3>
                <hr>
                <form class="signin-form mb-3">
                    <div class="form-group mb-3">
                        <label for="email">Email<sup class="text-danger">*</sup></label>
                        <input type="email" name="email" placeholder="er@gmail.com" class="form-control bg-light" id="email"></input>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Passsword<sup class="text-danger">*</sup></label>
                        <input type="password" name="password" placeholder="*******" class="form-control bg-light" id="password"></input>
                    </div>
                    <button class="btn btn-primary py-2">Login now</button>
                </form>
                <p>If you have no account please register with us <a href="signup.php">Create a new account</a></p>
                    
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- <div class="container bg-white p-4" style="box-shadow:0px 0px 2px 2px #ccc;margin-top:10px;">


            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <h4>NEW CUSTOMER</h4>
                    
                </div>
            </div>
        </div> -->
    </div>

    <script>
        $(document).ready(function() {
            $(".signin-form").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "./php/login.php",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        if (response.trim() == "success") {
                            window.location.assign('./index.php');
                            $(".account").html()
                        } else {
                            alert(response);
                        }
                    }
                });
            });
        });
    </script>

    <?php include_once("./design/footer.php"); ?>
    <script src="./js/index.js"></script>
</body>

</html>