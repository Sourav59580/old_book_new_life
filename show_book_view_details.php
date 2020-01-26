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
    if($response){
       $data = $response->fetch_assoc();
       echo $data['book_title']." By ".$data['book_author'];
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
</head>
<body>
    <div class="container p-4 bg-light">
        <div class="row p-3 bg-white shadow-lg mb-3">
            <div class="col-md-5 border-right pl-4">
            <?php 
               require("./database/database.php");
                $bookid = $_GET['bookid'];
                $get_data = "SELECT * FROM sellbook WHERE id='$bookid'";
                $response = $db->query($get_data);
                if($response){
                   $data = $response->fetch_assoc();
                   $image = "data:image/png;base64,".base64_encode($data['book_image']);
                   $book_title = $data['book_title'];
                   $book_author = $data['book_author'];
                   $mrp_price = $data['mrp_price'];
                   $selling_price = $data['selling_price'];
                   $discount = number_format((($mrp_price-$selling_price)/$mrp_price)*100);
                   $book_description = $data['book_description'];
                   $author_description = $data['author_description'];
                   echo "<img src='".$image."'class='w-75'></div>";
                   echo "<div class='col-md-7 pt-4 px-0'>
                   <div class='p-4 mb-4 bg-white'>
                   <h3>".$book_title."<i class='fa fa-heart-o close'></i></h3>";
                   echo "<h4>By ".$book_author."</h4>
                   <div class='mt-3'>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star text-warning' style='font-size:16px'></span>
                      <span class='fa fa-star-half-full text-warning' style='font-size:16px'></span>
                      <span>(34)</span>
                    </div>
                    <hr>";
                  echo "<p class='m-1'>MRP <del>Rs. ".$mrp_price."</del>   (Inclusive of all taxes)</p>";
                  echo "<h3 style='color:red;' >Rs. ".$selling_price."</h3><span class='border p-2 rounded mb-4'>".$discount."% OFF</span>
                       </div>
                       <div class='mt-4 ml-4 p-4'>
                    <button class='btn btn-lg btn-dark rounded mb-4'><i class='fa fa-shopping-cart'> </i> ADD TO CART</button>
                    <button class='btn btn-lg btn-danger rounded ml-4 mb-4'><i class='fa fa-shopping-bag'> </i> BUY NOW</button>
                    <div class='mt-4 row'>
                        <div class='col-2'>Delivery</div>
                        <div class='col-5'>
                            <form class='pincode-form'>
                               <div class='input-group mb-3 w-100'>
                                   <input type='number' class='form-control' placeholder='Pincode' name='pincode'>
                                   <div class='input-group-append'>
                                     <button class='btn btn-dark' type='submit'>CHECK</button>
                                   </div>
                                 </div>
                            </form>
                        </div>
                        <div class='col-5'>
                            <p>Generally delivered in 11 - 13 days</p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>";
        echo "<div class='row bg-white p-4 shadow-sm'>
        <div class='col-12 p-4'>
            <h4>Book Description</h4>
            <p>".$book_description."</p>
            </div>
            <div class='col-12 p-4'>
                <h4>Author Description</h4>
                <p>".$author_description."</p>
                </div>
            </div>
        </div>";


                }
            ?> 
                
                
                
                
        
</body>
</html>