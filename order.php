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

    .checked {
        color: orange;
    }

    .cursor-pointer {
        cursor: pointer;
    }
    </style>
</head>

<body>
    <?php
    include_once("./design/navbar.php");
    ?>
    <div class="container py-4" style="padding-left:100px;padding-right:100px;">
        <div class="row mb-4">
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
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#order" data-toggle='tab'>Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#previousorder" data-toggle='tab'>Previous Orders</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="order">

                <div class="container mt-4">
                    <?php
             $email = $_SESSION['username'];
             $getOrdersData = "SELECT * FROM buy WHERE email = '$email' AND delivery_status='processing'";
             $response = $db->query($getOrdersData);
             if($response){
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

             }else{
                 echo "<p>No orders found.</p>";
             }
           
            ?>
                </div>
            </div>
            <div class="tab-pane fade" id="previousorder">
                <div class="container mt-4">
                    <?php
             $email = $_SESSION['username'];
             $getOrdersData = "SELECT * FROM buy WHERE email = '$email' AND delivery_status='delivered'";
             $response = $db->query($getOrdersData);
             if($response){
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
                <h4 class='text-danger'>Delivered 29-June-2020</h4>
                <div class='d-flex justify-content-between'>
                    <div class='d-flex'>
                        <div style='width:50px'><img src='".$image."' class='w-100'></div>
                        <div class='ml-4'>
                            <p class='font-weight-bold text-primary mb-0'>".$sellBookData['book_title']."</p>
                            <p class='mb-0'>By <span>".$sellBookData['book_author']."</span></p>
                            <p style='color: deeppink'> ₹<span>".$sellBookData['selling_price'].".00</span></p>
                        </div>
                    </div>
                    <div class='d-flex flex-column'>
                        <button class='btn btn-warning my-1'>Return or replace items</button>
                        <button class='btn my-1' data-toggle='modal' data-target='#productreview'>Write a product review</button>
                        <div class='modal fade' id='productreview' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>Product Review</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                                </div>
                                <div class='modal-body'>
                                    <div><h6>Overall rating</h6></div>
                                    <div class='mb-3'>
                                    <span class='fa fa-star-o rater cursor-pointer r1' rates='1'></span>
                                    <span class='fa fa-star-o rater cursor-pointer r2' rates='2'></span>
                                    <span class='fa fa-star-o rater cursor-pointer r3' rates='3'></span>
                                    <span class='fa fa-star-o rater cursor-pointer r4' rates='4'></span>
                                    <span class='fa fa-star-o rater cursor-pointer r5' rates='5'></span>
                                    </div>
                                    <textarea name='' id='review-form' class='form-control' rows='4' placeholder='Write your review...'></textarea>
                                </div>
                                <div class=' modal-footer '>
                                    <button type='button' class='btn btn-primary review-btn' rating='0' orderid='".$data['id']."'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>";
   
                echo "</div>";
                }

             }else{
                 echo "<p>No orders found.</p>";
             }
           
            ?>
                </div>
            </div>
        </div>


    </div>


    <?php include_once("./design/footer.php"); ?>

    <script>
    $(document).ready(function() {
        $(".review-btn").click(function() {
            var orderId = $(this).attr('orderid');
            console.log(orderId);
            var review = $("#review-form").val();
            console.log(review);
            var rating = $(this).attr('rating');
            console.log(rating);
            $.ajax({
                type : "POST",
                url : "./php/review.php",
                data : {
                    orderId : orderId,
                    rating : rating,
                    review : review
                },
                success : function(response){
                    if(response.trim()=='success'){
                        $(".modal-body").html("<div class='d-flex flex-column text-center container'><h3 class='text-center'><i class='fa fa-check-circle text-success fa-2x' aria-hidden='true'></i></h3><h4 class='text-center text-success'> Review submitted - Thank you!</h4><p>We are processing your review. This may take several days, so we appreciate your patience. We will notify you when this is complete. Please note that if the review is about your experience with a third-party seller, we may move it to the seller’s profile page.</p></div>");

                    }else{
                        $(".modal-body").html("<div class='d-flex flex-column text-center container'><h3 class='text-center'><i class='fa fa-times text-danger fa-2x' aria-hidden='true'></i></h3><h4 class='text-center text-danger'> Review submitted failed !</h4><p>Please try again later...</p></div>");
                    }
                    
                }
            })

        })
    })

    $(document).ready(function() {
            $(".rater").each(function() {
                $(this).click(function() {
                    var rating = $(this).attr("rates");
                    $(".rater ").removeClass("fa-star checked ");
                    $(".rater ").addClass("fa-star-o ");
                    
                    if (rating == 5) {
                        $(".r1 ").removeClass("fa-star-o ");
                        $(".r1 ").addClass("fa-star checked ");
                        $(".r2 ").removeClass("fa-star-o ");
                        $(".r2 ").addClass("fa-star checked ");
                        $(".r3 ").removeClass("fa-star-o ");
                        $(".r3 ").addClass("fa-star checked ");
                        $(".r4 ").removeClass("fa-star-o ");
                        $(".r4 ").addClass("fa-star checked ");
                        $(".r5 ").removeClass("fa-star-o ");
                        $(".r5 ").addClass("fa-star checked ");
                        $(".review-btn").attr("rating",rating);
                    }
                    if (rating == 4) {
                        $(".r1 ").removeClass("fa-star-o ");
                        $(".r1 ").addClass("fa-star checked ");
                        $(".r2 ").removeClass("fa-star-o ");
                        $(".r2 ").addClass("fa-star checked ");
                        $(".r3 ").removeClass("fa-star-o ");
                        $(".r3 ").addClass("fa-star checked ");
                        $(".r4 ").removeClass("fa-star-o ");
                        $(".r4 ").addClass("fa-star checked ");
                        $(".review-btn ").attr("rating",rating);
                    }
                    if (rating == 3) {
                        $(".r1 ").removeClass("fa-star-o ");
                        $(".r1 ").addClass("fa-star checked ");
                        $(".r2 ").removeClass("fa-star-o ");
                        $(".r2 ").addClass("fa-star checked ");
                        $(".r3 ").removeClass("fa-star-o ");
                        $(".r3 ").addClass("fa-star checked ");
                        $(".review-btn").attr("rating",rating);
                    }
                    if (rating == 2) {
                        $(".r1 ").removeClass("fa-star-o ");
                        $(".r1 ").addClass("fa-star checked ");
                        $(".r2 ").removeClass("fa-star-o ");
                        $(".r2 ").addClass("fa-star checked ");
                        $(".review-btn").attr("rating",rating);
                    }
                    if (rating == 1) {
                        $(".r1 ").removeClass("fa-star-o ");
                        $(".r1 ").addClass("fa-star checked ");
                        $(".review-btn").attr("rating",rating);
                    }
                })
            })
        });
    </script>
</body>

</html>