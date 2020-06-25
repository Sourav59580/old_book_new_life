<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if (empty($username)) {
    header("Location:local_cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="icon" href="./photos/titlelogo.jpg" type="./images/style-six.png.webp">
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
    <?php
    include_once("./design/navbar.php");
    ?>
    <div class="container fluid">
        <div class="container mb-4">

            <div class="row px-4">
                <div class="col-md-2 col-12">
                    <h4>Shopping Cart</h4>
                </div>
                <div class="col-8"></div>
                <div class="col-2 d-md-block d-none"><span>Price</span></div>
            </div>
            <hr>

            <?php
            $get_cart_data = "SELECT * FROM cart WHERE email='$username'";
            $cart_item = [];
            $cart_status = [];
            if($response = $db->query($get_cart_data)){
            $i = 0;
            while ($cart = $response->fetch_assoc()) {
                $cart_item[$i] = $cart['bookid'];
                $cart_status[$i] = $cart['status_type'];
                $i++;
            }
            for ($i = 0; $i < count($cart_item); $i++) {
                $get_data = "SELECT * FROM $cart_status[$i] WHERE id='$cart_item[$i]'";
                $response = $db->query($get_data);
                if ($response) {
                    $data = $response->fetch_assoc();
                    $image = "data:image/png;base64," . base64_encode($data['book_image']);
                    $book_title = $data['book_title'];
                    $book_author = $data['book_author'];
                    $seller_name = $data['sellername'];
                    $mrp_price = $data['mrp_price'];
                    $sell_price = $data['selling_price'];
                    $quantity = 1;
                    $get_quantity = "SELECT quantity FROM cart WHERE bookid='$cart_item[$i]' AND email='$username' AND status_type='$cart_status[$i]'";
                    $get_response = $db->query($get_quantity);
                    if ($data = $get_response->fetch_assoc()) {
                        $quantity = $data['quantity'];
                    }
                    $selling_price = $sell_price * $quantity;
                    echo "<div class='row p-4 cart-product-container'>
                       <div class='col-md-2 col-6 mb-2'><img src='" . $image . "' width='100%'></div>
                       <div class='col-md-8 col-6 mb-2'>
                         <h4>" . $book_title . " By " . $book_author . "</h4>
                         <h4 class='d-md-none d-block text-danger'><i class='fa fa-inr mr-1'></i><span class='change-price'>" . $selling_price . "</span></h4>
                         <h5>Quantity : </h5>
                         <div class='btn-group mb-4 w-100' role='group'>
                           <button type='btn' class='btn btn-danger decrease-qty' price='" . $sell_price . "' email='" . $username . "' bookid='" . $cart_item[$i] . "' status='".$cart_status[$i]."'><i class='fa fa-minus '></i></button>
                           <button type='btn' class='btn px-4 btn-dark total-qty'>" . $quantity . "</button>
                           <button type='btn' class='btn btn-info increase-qty' price='" . $sell_price . "' email='" . $username . "' bookid='" . $cart_item[$i] . "' status='".$cart_status[$i]."'><i class='fa fa-plus'></i></button>
                           <button type='btn' class='btn btn-danger'><i class='fa fa-trash'></i></button>
                         </div>
                         <button type='btn' class='btn btn-secondary mr-4 my-3 delete-btn' price='" . $selling_price . "' email='" . $username . "' bookid='" . $cart_item[$i] . "' status='".$cart_status[$i]."'><i class='fa fa-trash mr-1'></i>DELETE</button>
                         <button type='btn' class='btn btn-success save-btn' author='" . $book_author . "' title='" . $book_title . "' mrp='" . $mrp_price . "' src='" . $image . "' price='" . (($selling_price) / $quantity) . "' email='" . $username . "' bookid='" . $cart_item[$i] . "' status='".$cart_status[$i]."'><i class='fa fa-save mr-1'></i>SAVE FOR LATER</button>
                       </div>
                       <div class='col-md-2 d-md-block d-none'><h4 class='text-danger'><i class='fa fa-inr mr-1'> </i><span class='desktop_change_price'>" . $selling_price . "</span></h4></div>
                     </div><hr>                     
                     ";
                }
            }
        }
            ?>
            <div class='after_move_to_cart'>


            </div>


            <div class="row px-4">
                <div class="col-md-2"></div>
                <div class="col-md-8"></div>
                <div class="col-md-2"><button class="btn btn-lg btn-warning proceed-btn">Proceed to Buy</button></div>
            </div>
            <hr>
        </div>

        <!--save later coding-->
        <div class="row px-4">
            <div class="col-md-2 col-12">
                <h4>Saved For Later
                    <span class="wishlist_count font-weight-bold text-dark"> (<span id="save_item_number"><?php

                                                                                                            if (empty($username)) {
                                                                                                                echo "0";
                                                                                                            } else {
                                                                                                                $get_data = "SELECT COUNT(bookid) AS result FROM save_later WHERE email='$username'";
                                                                                                                $response = $db->query($get_data);
                                                                                                                if ($response) {
                                                                                                                    $data = $response->fetch_assoc();
                                                                                                                    echo $data['result'];
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                }
                                                                                                            }
                                                                                                            ?></span>)
                    </span>
                </h4>
            </div>
            <div class="col-8"></div>
            <div class="col-2 d-md-block d-none"></div>
        </div>
        <hr>
        <?php
        $get_savelater_data = "SELECT * FROM save_later WHERE email='$username'";
        $savelater_item = [];
        $savelater_status = [];
        $response = $db->query($get_savelater_data);
        if($response){
        $i = 0;
        while ($savelater = $response->fetch_assoc()) {
            $savelater_item[$i] = $savelater['bookid'];
            $savelater_status[$i] = $savelater['status_type'];
            $i++;
        }
        for ($i = 0; $i < count($savelater_item); $i++) {
            $get_data = "SELECT * FROM $savelater_status[$i] WHERE id='$savelater_item[$i]'";
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
                echo "<div class='row p-4 cart-product-container'>
                       <div class='col-md-2 col-6 mb-2'><img src='" . $image . "' width='100%'></div>
                       <div class='col-md-8 col-6 mb-2'>
                         <h4>" . $book_title . " By " . $book_author . "</h4>
                         <h4 class=' text-danger'><i class='fa fa-inr mr-1'></i>" . $selling_price . "</h4>
                         <span class='border p-1 rounded mb-4'>" . $discount . "% OFF</span> 
                         <p class='m-1'>MRP <del>Rs. " . $mrp_price . "</del>   (Inclusive of all taxes)</p>
                         <h5>Quantity : </h5>
                         <div class='btn-group mb-4 w-100' role='group'>
                           <button type='btn' class='btn btn-danger'><i class='fa fa-minus'></i></button>
                           <button type='btn' class='btn px-4 btn-dark'>1</button>
                           <button type='btn' class='btn btn-info'><i class='fa fa-plus'></i></button>
                           <button type='btn' class='btn btn-danger'><i class='fa fa-trash'></i></button>
                         </div>
                         <button type='btn' class='btn btn-secondary mr-4 my-3 delete-save-btn' price='" . $selling_price . "' email='" . $username . "' bookid='" . $savelater_item[$i] . "' status='".$savelater_status[$i]."'><i class='fa fa-trash mr-1'></i>REMOVE</button>
                         <button type='btn' class='btn btn-primary move-btn' title='" . $book_title . "' author='" . $book_author . "' image='" . $image . "' price='" . $selling_price . "' email='" . $username . "' bookid='" . $savelater_item[$i] . "' status='".$savelater_status[$i]."'><i class='fa fa-save mr-1'></i>MOVE TO CART</button>
                       </div>
                       <div class='col-md-2 d-md-block d-none'></div>
                     </div><hr>";
            }
        }
    }
        ?>
        <div class="after_cart_to_save_for_later">


        </div>


    </div>


    <?php include_once("./design/footer.php"); ?>

    <script>
        //Proceed to buy
        $(document).ready(function(){
            $(".proceed-btn").click(function(){
                var email = '<?php echo $_SESSION['username'] ;?>'
                var ids = [];
                var sellprice = [];
                '<?php $getId= "SELECT * FROM cart WHERE email= 'ssantra.cse18@chitkarauniversity.edu.in'"; $response=$db->query($getId); while($data= $response->fetch_assoc()){ ?>'+ ids.push('<?php echo $data['bookid']; ?> ')+'<?php }  ?>' 

                '<?php $getId= "SELECT * FROM cart WHERE email= 'ssantra.cse18@chitkarauniversity.edu.in'"; $response=$db->query($getId); while($data= $response->fetch_assoc()){ ?>'+ sellprice.push('<?php echo $data['sell_price']; ?> ')+'<?php }  ?>' 

                $.ajax({
                    type : "POST",
                    url : "./php/buycartproduct.php",
                    data : {
                        bookids : JSON.stringify(ids),
                        sellprices : JSON.stringify(sellprice),
                        email : email 
                    },
                    success : function(response){
                        if(response='success'){
                            var bookidStr = encodeURIComponent(JSON.stringify(ids));
                            var sellpriceStr = encodeURIComponent(JSON.stringify(sellprice));
                            
                            window.location = "./cartProductDeliveryAddress.php?bookids="+bookidStr+"&sellprices="+sellpriceStr+"&email="+email;
                        }else{
                            alert(response);
                        }  
                    }
                })
                
            })
        })
        //increase qty
        $(document).ready(function() {
            $(".increase-qty").each(function() {
                $(this).click(function() {
                    var bookid = $(this).attr('bookid');
                    var email = $(this).attr('email');
                    var status = $(this).attr('status');
                    var selling_price = parseInt($(this).attr('price'));
                    var a = parseInt($(this).parent().children('.total-qty').html());
                    var parent = $(this).parent().children('.total-qty');
                    var b = parseInt($(this).parent().parent().children('H4').children('.change-price').html());
                    var price_parent = $(this).parent().parent().children('H4').children('.change-price');

                    var c = parseInt($(this).parent().parent().parent().children("DIV").children("H4").children('.desktop_change_price').html());
                    var desktop_price_parent = $(this).parent().parent().parent().children("DIV").children("H4").children('.desktop_change_price');

                    var total_price = parseInt($(".cart_price").html());
                    $.ajax({
                        type: "POST",
                        url: "./php/increase_qty.php",
                        data: {
                            bookid: bookid,
                            email: email,
                            status : status,
                            selling_price: selling_price
                        },
                        success: function(response) {
                            if (response.trim() == 'update') {
                                parent.html(a + 1);
                                price_parent.html(b + selling_price);
                                desktop_price_parent.html(c + selling_price);
                                $(".cart_price").html(total_price + selling_price);
                            } else
                                alert(response);
                        }
                    });
                });
            });
        });

        //decreace qty
        $(document).ready(function() {
            $('.decrease-qty').each(function() {
                $(this).click(function() {
                    
                    var mainParent = $(this).parent().parent().parent();
                    var bookid = $(this).attr('bookid');
                    var email = $(this).attr('email');
                    var status = $(this).attr('status');
                    var selling_price = parseInt($(this).attr('price'));
                    var a = parseInt($(this).parent().children('.total-qty').html());
                    var parent = $(this).parent().children('.total-qty');
                    var b = parseInt($(this).parent().parent().children('H4').children('.change-price').html());
                    var price_parent = $(this).parent().parent().children('H4').children('.change-price');

                    var c = parseInt($(this).parent().parent().parent().children("DIV").children("H4").children('.desktop_change_price').html());
                    var desktop_price_parent = $(this).parent().parent().parent().children("DIV").children("H4").children('.desktop_change_price');

                    var total_price = parseInt($(".cart_price").html());

                    $.ajax({
                        type: "POST",
                        url: "./php/decrease_qty.php",
                        data: {
                            bookid: bookid,
                            email: email,
                            status : status,
                            selling_price: selling_price
                        },
                        success: function(response) {
                            if (response.trim() == 'update') {
                                parent.html(a - 1);
                                price_parent.html(b - selling_price);
                                desktop_price_parent.html(c - selling_price);
                                $(".cart_price").html(total_price - selling_price);
                            } else if (response.trim() == 'not decrease') {

                                swal({
                                        title: "Are you sure?",
                                        text: "You will not be able to recover this imaginary file!",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Yes, delete it!",
                                        cancelButtonText: "No, cancel plx!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            $.ajax({
                                                type: "POST",
                                                url: './php/delete_product.php',
                                                data: {
                                                    bookid: bookid,
                                                    email: email,
                                                    status : status
                                                },
                                                success: function(response) {
                                                    if (response.trim() == 'success') {
                                                        mainParent.css("display","none");
                                                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                                    } else {
                                                        swal({
                                                            type: "error",
                                                            title: "Sorry, something went wrong",
                                                            text: "Please try again later",
                                                            timer: 2000,
                                                            showConfirmButton: false
                                                        });
                                                    }
                                                }
                                            });

                                        } else {
                                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                                        }
                                    });

                            } else {
                                swal({
                                    type: "error",
                                    title: "Sorry, something went wrong",
                                    text: "Please try again later",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }

                        }
                    });



                });
            });
        });

        //delete save later product
        $(document).ready(function() {
            $(".delete-save-btn").each(function() {
                $(this).click(function() {
                    alert();
                    var bookid = $(this).attr('bookid');
                    var email = $(this).attr('email');
                    var parent = $(this).parent().parent();
                    $.ajax({
                        type: "POST",
                        url: './php/delete_save_later_product.php',
                        data: {
                            bookid: bookid,
                            email: email
                        },
                        success: function(response) {
                            if (response.trim() == "success") {
                                parent.css("display", "none");
                                //some work panding......

                            } else {
                                alert(response);
                            }
                        }
                    });
                });
            });
        });

        //move to cart
        $(document).ready(function() {
            $(".move-btn").each(function() {
                $(this).click(function(e) {
                    e.preventDefault();
                    var bookid = $(this).attr('bookid');
                    var email = $(this).attr('email');
                    var image = $(this).attr('image');
                    var title = $(this).attr('title');
                    var status = $(this).attr('status');
                    var author = $(this).attr('author');
                    var parent = $(this).parent().parent();
                    var cart = parseInt($(".total_cart").html());
                    var price = parseInt($(this).attr('price'));
                    var total_price = parseInt($(".cart_price").html());
                    $.ajax({
                        type: "POST",
                        url: './php/move_to_cart.php',
                        data: {
                            bookid: bookid,
                            email: email,
                            sell_price: price,
                            status : status
                        },
                        success: function(response) {
                            if (response.trim() == 'success') {
                                $(".total_cart").html(cart + 1);
                                $(".cart_price").html(total_price + price);
                                parent.css('display', 'none');
                                //some work panding.....
                                var save_item_number = parseInt($("#save_item_number").html());
                                $("#save_item_number").html(save_item_number - 1);
                                // move to cart
                                var container = document.querySelector(".after_move_to_cart");
                                var row = document.createElement("DIV");
                                row.className = "row p-4 cart-product-container";

                                var col2 = document.createElement("DIV");
                                col2.className = 'col-md-2 col-6 mb-2';
                                var img = document.createElement("IMG");
                                img.src = image;
                                img.style.width = '100%';
                                col2.append(img);
                                row.append(col2);

                                var col8 = document.createElement("DIV");
                                col8.className = 'col-md-8 col-6 mb-2';
                                var hed1 = document.createElement("H4");
                                hed1.append(title + " BY " + author);
                                col8.append(hed1);
                                var hed2 = document.createElement("H4");
                                hed2.className = 'd-md-none d-block text-danger';
                                var inr = document.createElement("I");
                                inr.className = 'fa fa-inr mr-1';
                                hed2.append(inr);
                                hed2.append(price);
                                col8.append(hed2);
                                var qhed = document.createElement("H5");
                                qhed.append('Quantity : ');
                                col8.append(qhed);
                                var btndiv = document.createElement("DIV");
                                btndiv.className = 'btn-group mb-4 w-100';
                                var btn1 = document.createElement("BUTTON");
                                btn1.className = 'btn btn-danger';
                                var minus = document.createElement("I");
                                minus.className = 'fa fa-minus';
                                btn1.append(minus);
                                btndiv.append(btn1);

                                var btn2 = document.createElement("BUTTON");
                                btn2.className = 'btn px-4 btn-dark';
                                btn2.append("1");
                                btndiv.append(btn2);

                                var btn3 = document.createElement("BUTTON");
                                btn3.className = 'btn btn-info';
                                var plus = document.createElement("I");
                                plus.className = 'fa fa-plus';
                                btn3.append(plus);
                                btndiv.append(btn3);
                                col8.append(btndiv);

                                var btn4 = document.createElement("BUTTON");
                                btn4.className = 'btn btn-secondary mr-4 my-3 delete-btn';
                                var trash = document.createElement("I");
                                trash.className = 'fa fa-trash mr-1';
                                btn4.append(trash);
                                btn4.append("DELETE");
                                col8.append(btn4);

                                var btn5 = document.createElement("BUTTON");
                                btn5.className = 'btn btn-success save-btn';
                                var save = document.createElement("I");
                                save.className = 'fa fa-save mr-1';
                                btn5.append(save);
                                btn5.append("SAVE FOR LATER");
      //lot of work pending here
                                btn5.onclick = function(){alert('OnClick');}
                                col8.append(btn5);
                                row.append(col8);

                                var col_md_2 = document.createElement("DIV");
                                col_md_2.className = 'col-md-2 d-md-block d-none';
                                var hed3 = document.createElement("H4");
                                hed3.className = 'text-danger';
                                var india_inr = document.createElement("I");
                                india_inr.className = 'fa fa-inr mr-1';
                                hed3.append(india_inr);
                                hed3.append(price);
                                col_md_2.append(hed3);
                                row.append(col_md_2);

                                container.append(row);
                                var hr = document.createElement("HR");
                                container.append(hr);
                            } else {
                                alert(response);
                            }
                        }
                    });
                });
            });
        });

        //save later product
        $(document).ready(function() {
            $(".save-btn").each(function() {
                $(this).click(function(e) {
                    e.preventDefault();
                    var bookid = $(this).attr('bookid');
                    var email = $(this).attr('email');
                    var parent = $(this).parent().parent();
                    var cart = parseInt($(".total_cart").html());
                    var price = $(this).attr('price');
                    var mrp = $(this).attr('mrp');
                    var discount = Math.floor(((mrp - price) / mrp) * 100);
                    var title = $(this).attr('title');
                    var author = $(this).attr('author');
                    var src = $(this).attr('src');
                    var status = $(this).attr('status');
                    var total_price = parseInt($(".cart_price").html());
                    $.ajax({
                        type: "POST",
                        url: './php/save_later.php',
                        data: {
                            bookid: bookid,
                            email: email,
                            status : status
                        },
                        success: function(response) {
                            if (response.trim() == 'success') {
                                parent.css('display', 'none');
                                $(".total_cart").html(cart - 1);
                                $(".cart_price").html(total_price - price);
                                var save_item_number = parseInt($("#save_item_number").html());
                                $("#save_item_number").html(save_item_number + 1);

                                // dynamically show cart product to save for later product

                                var container = document.querySelector(".after_cart_to_save_for_later");
                                var row = document.createElement("DIV");
                                row.className = "row p-4 cart-product-container";

                                var col2 = document.createElement("DIV");
                                col2.className = 'col-md-2 col-6 mb-2';
                                var img = document.createElement("IMG");
                                img.src = src;
                                img.style.width = '100%';
                                col2.append(img);
                                row.append(col2);

                                var col8 = document.createElement("DIV");
                                col8.className = 'col-md-8 col-6 mb-2';
                                var hed1 = document.createElement("H4");
                                hed1.append("FINDING MOANA BY JAMES HALEMANU");
                                col8.append(hed1);

                                var sell_price = document.createElement("H4");
                                sell_price.className = 'text-danger';
                                var india_inr = document.createElement("I");
                                india_inr.className = 'fa fa-inr mr-1';
                                sell_price.append(india_inr);
                                sell_price.append(price);
                                col8.append(sell_price);

                                var span = document.createElement("SPAN");
                                span.className = 'border p-1 rounded mb-4';
                                span.append(discount + " % OFF");
                                col8.append(span);

                                var para = document.createElement("P");
                                para.className = 'm-1';
                                para.append("MRP ");
                                var del = document.createElement("DEL");
                                del.append("Rs. " + mrp);
                                para.append(del);
                                para.append("(Inclusive of all taxes)");
                                col8.append(para);

                                var hed2 = document.createElement("H4");
                                hed2.className = 'd-md-none d-block text-danger';
                                var inr = document.createElement("I");
                                inr.className = 'fa fa-inr mr-1';
                                hed2.append(inr);
                                hed2.append(price);
                                col8.append(hed2);
                                var qhed = document.createElement("H5");
                                qhed.append('Quantity : ');
                                col8.append(qhed);
                                var btndiv = document.createElement("DIV");
                                btndiv.className = 'btn-group mb-4 w-100';
                                var btn1 = document.createElement("BUTTON");
                                btn1.className = 'btn btn-danger';
                                var minus = document.createElement("I");
                                minus.className = 'fa fa-minus';
                                btn1.append(minus);
                                btndiv.append(btn1);

                                var btn2 = document.createElement("BUTTON");
                                btn2.className = 'btn px-4 btn-dark';
                                btn2.append("1");
                                btndiv.append(btn2);

                                var btn3 = document.createElement("BUTTON");
                                btn3.className = 'btn btn-info';
                                var plus = document.createElement("I");
                                plus.className = 'fa fa-plus';
                                btn3.append(plus);
                                btndiv.append(btn3);
                                col8.append(btndiv);

                                var btn4 = document.createElement("BUTTON");
                                btn4.className = 'btn btn-secondary mr-4 my-3 delete-btn';
                                var trash = document.createElement("I");
                                trash.className = 'fa fa-trash mr-1';
                                btn4.append(trash);
                                btn4.append("DELETE");
                                col8.append(btn4);

                                var btn5 = document.createElement("BUTTON");
                                btn5.className = 'btn btn-primary move-btn';
                                var save = document.createElement("I");
                                save.className = 'fa fa-save mr-1';
                                btn5.append(save);
                                btn5.append("MOVE TO CART");
                                col8.append(btn5);
                                row.append(col8);

                                var col_md_2 = document.createElement("DIV");
                                col_md_2.className = 'col-md-2 d-md-block d-none';
                                row.append(col_md_2);

                                container.append(row);
                                var hr = document.createElement("HR");
                                container.append(hr);


                            } else {
                                alert(response);
                            }

                        }
                    });

                });
            });
        });


        //delete product
        $(document).ready(function() {
            $(".delete-btn").each(function() {
                $(this).click(function(e) {
                    e.preventDefault();
                    var bookid = $(this).attr('bookid');
                    var email = $(this).attr('email');
                    var status = $(this).attr('status');
                    var parent = $(this).parent().parent();
                    var cart = parseInt($(".total_cart").html());
                    var price = $(this).attr('price');
                    var total_price = parseInt($(".cart_price").html());
                    $.ajax({
                        type: "POST",
                        url: './php/delete_product.php',
                        data: {
                            bookid: bookid,
                            email: email,
                            status : status
                        },
                        success: function(response) {
                            if (response.trim() == 'success') {
                                parent.css('display', 'none');
                                $(".total_cart").html(cart - 1);
                                $(".cart_price").html(total_price - price);
                            } else {
                                alert(response);
                            }
                        }
                    });
                });
            });
        });

        //
    </script>
</body>

</html>