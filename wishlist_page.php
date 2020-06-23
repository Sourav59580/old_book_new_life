<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if(empty($username)){
    header("Location:local_wishlist.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Wishlist</title>
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
      <div class="container mb-4">

        <div class="row px-4">
            <div class="col-md-2 col-12">
                <h4>My Wishlist
                    <span class="wishlist_count font-weight-bold text-dark"> (<?php
                            
                              if(empty($username)){
                                echo "0";
                              }
                              else{
                                $get_data = "SELECT COUNT(bookid) AS result FROM wishlist WHERE email='$username'";
                                $response = $db->query($get_data);
                                    if($response){
                                        $data = $response->fetch_assoc();
                                        echo $data['result'];
                                    }
                                    else{
                                        echo "0";
                                    }
                             }
                            ?>)
                    </span>
                </h4>
            </div>
            <div class="col-8"></div>
            <div class="col-2 d-md-block d-none"></div>
        </div>
        <hr>
        
        <?php
         $get_wishlist_data = "SELECT * FROM wishlist WHERE email='$username'";
         $wishlist_item = [];
         $response = $db->query($get_wishlist_data);
         $i=0;
         while($wishlist=$response->fetch_assoc())
         {
             $wishlist_item[$i]=$wishlist['bookid'];
             $i++;
         }
         for($i=0;$i<count($wishlist_item);$i++){
            $get_data = "SELECT * FROM sellbook WHERE id='$wishlist_item[$i]'";
            $response = $db->query($get_data);
            if($response){
               $data = $response->fetch_assoc();
               $image = "data:image/png;base64,".base64_encode($data['book_image']);
               $book_title = $data['book_title'];
               $book_author = $data['book_author'];
               $seller_name = $data['sellername'];
               $mrp_price = $data['mrp_price'];
               $selling_price = $data['selling_price'];
               $discount = number_format((($mrp_price-$selling_price)/$mrp_price)*100);
               echo "<div class='row p-4 cart-product-container'>
                       <div class='col-md-1 col-6 mb-2'><img src='".$image."' width='100%'></div>
                       <div class='col-md-9 col-6 mb-2'>
                         <h4>".$book_title." By ".$book_author."</h4>
                         <h4 class=' text-danger'><i class='fa fa-inr mr-1'></i>".$selling_price."</h4><span class='border p-1 rounded mb-4'>".$discount."% OFF</span> 
                         <p class='m-1'>MRP <del>Rs. ".$mrp_price."</del>   (Inclusive of all taxes)</p>
                       </div>
                       <div class='col-md-2 d-md-block d-none'><h3 class='text-danger'><i class='fa fa-trash mr-1 delete-wishlist' style='cursor:pointer;' email='".$username."' bookid='".$wishlist_item[$i]."'> </i></h3></div>
                     </div><hr>";
            }
         }
        ?>
        
        </div>
    </div>

    <?php include_once("./design/footer.php");?>

    <script>
        //delete product
    $(document).ready(function(){
        $(".delete-wishlist").each(function(){
            $(this).click(function(){
                var bookid = $(this).attr('bookid');
                var email = $(this).attr('email');
                var parent = $(this).parent().parent().parent();
                var wishlist_count= parseInt($(".wishlist_count").html());
                //var price = $(this).attr('price');
                //var total_price = parseInt($(".cart_price").html());
               $.ajax({
                 type : "POST",
                 url : './php/delete_wishlist.php',
                 data : {
                     bookid :bookid,
                     email : email
                 },
                 success : function(response){
                     if(response.trim()=='success')
                     {
                         parent.css('display','none');
                         $(".wishlist_count").html(wishlist_count-1);
                         
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