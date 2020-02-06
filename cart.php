<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if(empty($username)){
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
    <title>Shopping Cart</title>
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
    <div class="container fluid">
      <div class="container mb-4">

        <div class="row px-4">
            <div class="col-md-2 col-12"><h4>Shopping Cart</h4></div>
            <div class="col-8"></div>
            <div class="col-2 d-md-block d-none"><span>Price</span></div>
        </div>
        <hr>
        
        <?php
         $get_cart_data = "SELECT * FROM cart WHERE email='$username'";
         $cart_item = [];
         $response = $db->query($get_cart_data);
         $i=0;
         while($cart=$response->fetch_assoc())
         {
             $cart_item[$i]=$cart['bookid'];
             $i++;
         }
         for($i=0;$i<count($cart_item);$i++){
            $get_data = "SELECT * FROM sellbook WHERE id='$cart_item[$i]'";
            $response = $db->query($get_data);
            if($response){
               $data = $response->fetch_assoc();
               $image = "data:image/png;base64,".base64_encode($data['book_image']);
               $book_title = $data['book_title'];
               $book_author = $data['book_author'];
               $seller_name = $data['sellername'];
               $mrp_price = $data['mrp_price'];
               $selling_price = $data['selling_price'];

               echo "<div class='row p-4 cart-product-container'>
                       <div class='col-md-2 col-6 mb-2'><img src='".$image."' width='100%'></div>
                       <div class='col-md-8 col-6 mb-2'>
                         <h4>".$book_title." By ".$book_author."</h4>
                         <h4 class='d-md-none d-block text-danger'><i class='fa fa-inr mr-1'></i>".$selling_price."</h4>
                         <h5>Quantity : </h5>
                         <div class='btn-group mb-4 w-100' role='group'>
                           <button type='btn' class='btn btn-danger'><i class='fa fa-minus'></i></button>
                           <button type='btn' class='btn px-4 btn-dark'>1</button>
                           <button type='btn' class='btn btn-info'><i class='fa fa-plus'></i></button>
                           <button type='btn' class='btn btn-danger'><i class='fa fa-trash'></i></button>
                         </div>
                         <button type='btn' class='btn btn-secondary mr-4 my-3 delete-btn' price='".$selling_price."' email='".$username."' bookid='".$cart_item[$i]."'><i class='fa fa-trash mr-1'></i>DELETE</button>
                         <button type='btn' class='btn btn-success'><i class='fa fa-save mr-1'></i>SAVE FOR LATER</button>
                       </div>
                       <div class='col-md-2 d-md-block d-none'><h4 class='text-danger'><i class='fa fa-inr mr-1'> </i>".$selling_price."</h4></div>
                     </div><hr>";
            }
         }
        ?>
        <div class="row px-4">
            <div class="col-md-2"></div>
            <div class="col-md-8"></div>
            <div class="col-md-2"><button class="btn btn-lg btn-warning">Proceed to Buy</button></div>
        </div>
        </div>
    </div>


    <?php include_once("./design/footer.php");?>

    <script>
        //delete product
    $(document).ready(function(){
        $(".delete-btn").each(function(){
            $(this).click(function(){
                var bookid = $(this).attr('bookid');
                var email = $(this).attr('email');
                var parent = $(this).parent().parent();
                var cart= parseInt($(".total_cart").html());
                var price = $(this).attr('price');
                var total_price = parseInt($(".cart_price").html());
               $.ajax({
                 type : "POST",
                 url : './php/delete_product.php',
                 data : {
                     bookid :bookid,
                     email : email
                 },
                 success : function(response){
                     if(response.trim()=='success')
                     {
                         parent.css('display','none');
                         $(".total_cart").html(cart-1);
                         $(".cart_price").html(total_price-price);
                     }
                     else{
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