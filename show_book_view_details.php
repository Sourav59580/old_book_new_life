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
    <title><?php
            require("./database/database.php");
            $bookid = $_GET['bookid'];
            $get_data = "SELECT * FROM sellbook WHERE id='$bookid'";
            $response = $db->query($get_data);
            if ($response) {
                $data = $response->fetch_assoc();
                echo $data['book_title'] . " By " . $data['book_author'];
            }
            ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+91 9823 132 111
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">contact@bbbootstrap.com</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li> <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Italian</a></li>
                                                <li><a href="#">Spanish</a></li>
                                                <li><a href="#">Japanese</a></li>
                                            </ul>
                                        </li>
                                        <li> <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">EUR Euro</a></li>
                                                <li><a href="#">GBP British Pound</a></li>
                                                <li><a href="#">JPY Japanese Yen</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                    <div><a href="./signup.php" class="account">
                                            <?php
                                            if (empty($username)) {
                                                echo "Register";
                                            } else {
                                                $get_username = "SELECT firstname FROM register WHERE email='$username'";
                                                $response = $db->query($get_username);
                                                $name = $response->fetch_assoc();
                                                echo "Hello," . $name['firstname'];
                                            }

                                            ?>
                                        </a></div>
                                    <div><a href="./php/logout.php">Logout</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Header Main -->
            <div class="header_main shadow-sm">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="#"><img src="./photos/logo.jpg" height="70px" /></a></div>
                            </div>
                        </div> <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix"> <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                                            <div class="custom_dropdown" style="display: none;">
                                                <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div> <button type="submit" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="./wishlist_page.php">Wishlist</a></div>
                                        <div class="wishlist_count">
                                            <?php
                                            $get_data = "SELECT COUNT(bookid) AS result FROM wishlist WHERE email='$username'";
                                            $response = $db->query($get_data);
                                            if ($response) {
                                                $data = $response->fetch_assoc();
                                                echo $data['result'];
                                            } else {
                                                echo "0";
                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div> <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                       <a href="./cart.php"> <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                            <div class="cart_count"><span class="total_cart">
                                                    <?php
                                                    $get_data = "SELECT COUNT(bookid) AS result FROM cart WHERE email='$username'";
                                                    $response = $db->query($get_data);
                                                    if ($response) {
                                                        $data = $response->fetch_assoc();
                                                        echo $data['result'];
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>
                                                </span></div>
                                        </div></a>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="./cart.php">Cart</a></div>
                                            <div class="cart_price">
                                                <?php
                                                $get_data = "SELECT SUM(sell_price) AS result FROM cart WHERE email='$username'";
                                                $response = $db->query($get_data);
                                                if ($response) {
                                                    $data = $response->fetch_assoc();
                                                    echo $data['result'];
                                                } else {
                                                    echo "0";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>




    <div class="container p-4 bg-light">
        <div class="row p-3 bg-white shadow-lg mb-3">
            <div class="col-md-5 border-right pl-4">
                <?php
                require("./database/database.php");
                $bookid = $_GET['bookid'];
                $category = $_GET['category'];
                $get_data = "SELECT * FROM sellbook WHERE id='$bookid'";
                $response = $db->query($get_data);
                if ($response) {
                    $data = $response->fetch_assoc();
                    $image = "data:image/png;base64," . base64_encode($data['book_image']);
                    $book_title = $data['book_title'];
                    $book_author = $data['book_author'];
                    $seller_name = $data['sellername'];
                    $mrp_price = $data['mrp_price'];
                    $selling_price = $data['selling_price'];
                    $discount = number_format((($mrp_price - $selling_price) / $mrp_price) * 100);
                    $book_description = $data['book_description'];
                    $author_description = $data['author_description'];
                    echo "<img src='" . $image . "'class='w-75'></div>";
                    echo "<div class='col-md-7 pt-4 px-0'>
                   <div class='p-4 mb-4 bg-white'>
                   <h3>" . $book_title . "<span class='fa fa-heart-o close wishcart'></span></h3>";
                    echo "<h4>By " . $book_author . "</h4>
                   <div class='mt-3'>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star-half-full text-warning' style='font-size:16px'></span>
                      <span>(34)</span>";
                    echo "<span class='close text-primary' style='font-size:12px;'>Sold by " . $seller_name . "</span>
                    </div>
                    <hr>";
                    echo "<p class='m-1'>MRP <del>Rs. " . $mrp_price . "</del>   (Inclusive of all taxes)</p>";
                    echo "<h3 style='color:red;' >Rs. <span class='sell_price'>" . $selling_price . "</span></h3><span class='border p-2 rounded mb-4'>" . $discount . "% OFF</span>
                       </div>
                       <div class='mt-4 ml-4 p-4'>
                    <button class='btn btn-lg btn-dark rounded mb-4 cart-btn'><i class='fa fa-shopping-cart'> </i> ADD TO CART</button>
                    <button class='btn btn-lg btn-danger rounded ml-4 mb-4 buy-btn'><i class='fa fa-shopping-bag'> </i> BUY NOW</button>
                    <div class='mt-4 row'>
                        <div class='col-2'>Delivery</div>
                        <div class='col-5 w-100'>
                            <form class='pincode-form'>
                               <div class='input-group mb-3 w-100'>
                                   <input type='number' class='form-control' placeholder='Pincode' name='pincode' id='pincode'>
                                   <div class='input-group-append'>
                                     <button class='btn btn-dark' type='submit'>CHECK</button>
                                   </div>
                                 </div>
                            </form>
                            <div class='text-primary pincode-address'>
                            
                               
                            </div>
                        </div>
                        <div class='col-5'>
                            <p class='delivary_status'></p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>";

                    echo "<div class='row bg-white p-4 shadow-sm mb-3'>
                <div class='col-12 p-4'>
                 <h4>Book Description</h4>
                 <p>" . $book_description . "</p>
                </div>
                <div class='col-12 p-4'>
                  <h4>Author Description</h4>
                  <p>" . $author_description . "</p>
                </div>
              </div>";
                    $same_category_book = "SELECT * FROM sellbook WHERE book_category='$category'";
                    $response = $db->query($same_category_book);
                    if ($response) {
                        echo "<div class='row bg-white p-4 shadow-sm mb-3'>
              <div class='col-12 p-2'>
               <h3 class='mb-4'>Sponsored products related to this item</h3>
                 <div class='row'>";
                        while ($same_data = $response->fetch_assoc()) {
                            $image = "data:image/png;base64," . base64_encode($same_data['book_image']);
                            $price = $same_data['selling_price'];
                            echo "<div class='col-md-2 col-6 mb-3'>
                       <div class='card'>
                         <div class='card-body p-1'>
                            <div class='mb-1'><img src='" . $image . "' width='100%'></div>
                            <div class='rating'>
                               <span class='fa fa-star text-warning' style='font-size:12px'></span>
                               <span class='fa fa-star text-warning' style='font-size:12px'></span>
                               <span class='fa fa-star text-warning' style='font-size:12px'></span>
                               <span class='fa fa-star text-warning' style='font-size:12px'></span>
                               <span class='fa fa-star-half-full text-warning' style='font-size:12px'></span>
                            </div>
                            <div class='mb-1'>
                               <p class='mb-0'>165 reviews</p>
                               <span class='text-danger'>₹ <span>" . $price . "</span></span>
                            </div>
                         </div>
                        </div>
                      </div>";
                        }
                        echo " </div> 
             </div>
            </div>";
                    }
                    echo "<div class='row bg-white p-4 shadow-sm mb-3'>
                 <div class='col-md-3 p-4'>
                   <h4>Customer reviews</h4>
                    <div class='customer-reviews'>
                      <span class='fa fa-star checked text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star-o text-warning checked' style='font-size:16px'></span>
                      <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                      <span class='ml-1'>3.7 out of 5</span>
                    </div>
                  </div>
                  <div class='col-md-9'>

                     <div>
                       <i class='fa fa-user-circle-o' style='font-size:18px;'> </i><span> Sourav Santra</span>
                        <div class='customer-reviews'>
                          <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                          <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                          <span class='fa fa-star-o text-warning checked' style='font-size:16px'></span>
                          <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                          <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                          <span class='font-weight-bold'> Must buy for AIIMS PREPARATION</span>
                        </div>
                        <div class='date_of_comment'><span>Reviewed in India on 24 July 2019</span></div>
                        <p class='text-danger mb-1'>Verified Purchase</p>
                        <div class='comment'>
                        <span>Very good packaging and speedy delivery.. It is a quintessential book for AIIMS preparation.
                        Explanations are descriptive as well as precise and updated according to latest edition of standard text books..
                        Hats Off for the effort taken by Dr Pritesh Singh and others behind it</span>
                        </div> 
                     </div>
                     <hr>
                     <div>
                       <i class='fa fa-user-circle-o' style='font-size:18px;'> </i><span> Sourav Santra</span>
                        <div class='customer-reviews'>
                        <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                        <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                        <span class='fa fa-star-o text-warning checked' style='font-size:16px'></span>
                        <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                        <span class='fa fa-star-o text-warning' style='font-size:16px'></span>
                        <span class='font-weight-bold'> Must buy for AIIMS PREPARATION</span>
                      </div>
                      <div class='date_of_comment'><span>Reviewed in India on 24 July 2019</span></div>
                      <p class='text-danger mb-1'>Verified Purchase</p>
                      <div class='comment'>
                      <span>Very good packaging and speedy delivery.. It is a quintessential book for AIIMS preparation.
                      Explanations are descriptive as well as precise and updated according to latest edition of standard text books..
                      Hats Off for the effort taken by Dr Pritesh Singh and others behind it</span>
                      </div> 
                     </div>
                  </div>
              </div>
        </div>";
                }
                ?>


                <?php include_once("./design/footer.php"); ?>
                <script>
                    //buy product
                    $(document).ready(function() {
                        $(".buy-btn").each(function() {
                            $(this).click(function(){
                                var id = sessionStorage.getItem("sent");
                                var email = sessionStorage.getItem("email");
                                var sell_price = parseInt($(".sell_price").html());
                                $.ajax({
                                    type : "POST",
                                    url : "./php/buy.php",
                                    data : {
                                        bookid : id,
                                        email : email,
                                        sell_price: sell_price
                                    },
                                    success : function(response){
                                        if(response.trim()=='success')
                                        { 
                                            $.ajax({
                                                type : "POST",
                                                url : "./php/totalsell.php",
                                                data :{
                                                    bookid : id
                                                },
                                                success : function(response){
                                                  alert(response);
                                                }
                                            });

                                        }
                                        else
                                        {
                                            alert(response);
                                        }
                                    }
                                });
                            });  
                        });
                    });
                    //cart item
                    $(document).ready(function() {
                        var id = sessionStorage.getItem("sent");
                        var email = sessionStorage.getItem("email");
                        var cart = $(".total_cart").html();
                        var cart_price = parseInt($(".cart_price").html());
                        var sell_price = parseInt($(".sell_price").html());
                        var status = "sellbook";
                        $(".cart-btn").click(function(e) {
                            //var id = sessionStorage.getItem("sent");
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "./php/cart.php",
                                data: {
                                    bookid: id,
                                    email: email,
                                    status : status,
                                    sell_price: sell_price
                                },
                                success: function(response) {
                                    if (response.trim() == 'success') {
                                        cart = parseInt(cart) + 1;
                                        $(".total_cart").html(cart);
                                        $(".cart_price").html(cart_price + sell_price);
                                        swal({
                                            type: "success",
                                            title: "Shopping Cart",
                                            text: "Success You have added 1 item to your shopping cart",
                                            timer: 2000,
                                            showConfirmButton: false
                                        });

                                    } else if (response.trim() == 'update') {
                                        $(".cart_price").html(cart_price + sell_price);
                                        swal({
                                            type: "success",
                                            title: "Update Cart Quantity",
                                            text: "Success You have updated 1 item to your shopping cart",
                                            timer: 2000,
                                            showConfirmButton: false
                                        });
                                    } else {
                                        alert(response);
                                    }
                                }
                            });
                        });
                    });

                    //wish list item
                    $(document).ready(function() {
                        $(".wishcart").click(function() {
                            var id = sessionStorage.getItem("sent");
                            var email = sessionStorage.getItem("email");
                            var wishlist_count = parseInt($(".wishlist_count").html());
                            // alert();
                            $.ajax({
                                type: "POST",
                                url: "./php/wish.php",
                                data: {
                                    bookid: id,
                                    email: email
                                },
                                success: function(response) {
                                    if (response.trim() == "success") {
                                        $(".wishcart").removeClass('fa-heart-o');
                                        $(".wishcart").addClass("fa-heart");
                                        $(".wishcart").css('color', 'red');
                                        $(".wishlist_count").html(wishlist_count + 1);
                                    } else {
                                        alert(response);
                                    }
                                }

                            });
                        });
                    });

                    //delivary pincode
                    $(document).ready(function() {
                        $(".pincode-form").submit(function(e) {
                            e.preventDefault();
                            var pincode = $("#pincode").val();
                            $.ajax({
                                type: "GET",
                                url: 'https://api.postalpincode.in/pincode/' + pincode,
                                success: function(response) {
                                    $(".pincode-address").html("");
                                    $(".delivary_status").html("");
                                    console.log(response[0].PostOffice.length);
                                    var length = response[0].PostOffice.length;
                                    if (length > 0) {
                                        $(".delivary_status").html("Generally delivered in 11 - 13 days");
                                        for (var i = 0; i <= length; i++) {
                                            console.log(response[0].PostOffice[i].Name);
                                            var a = document.createElement("A");
                                            a.className = 'ml-2';
                                            var text = document.createTextNode(response[0].PostOffice[i].Name);
                                            a.append(text);
                                            $(".pincode-address").append(a);
                                        }
                                    }
                                    //console.log(response[0].PostOffice[i].Name);
                                }
                            });
                        })
                    });
                </script>

</body>

</html>