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
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <style>
   /* Image in left corner of <hr> tag */

div.style-five {
height: 60px;
background: #fff url('https://www.formget.com/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2014/12/style-five.png.webp') no-repeat scroll left;
background-size: 500px 75px;
margin-left: -20px;

}
hr.style-five
{
width: 95%;
margin-top: -40px;
border: 0;
border-bottom: 1px dashed black;
background: #70A8FF;
}

/* Gradient color1 - color2 - color1 */

hr.style-one {
border: 0;
height: 1px;
background: #333;
background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
background-image: -moz-linear-gradient(left, #ccc, #333, #ccc);
background-image: -ms-linear-gradient(left, #ccc, #333, #ccc);
background-image: -o-linear-gradient(left, #ccc, #333, #ccc);
}
.book-view:hover{
  box-shadow: 0px 0px 2px 2px #ccc;  
}

    </style>
</head>
<body>
    <?php
    include_once("./design/navbar.php");
    ?>

    <div class="container-fluid page">
     <div class=" container row mb-4">
         <div class="col-md-3 col-5 border-right p-4">
           <div>
              <p class="mt-4">Books <span class="close">-</span></p>
              <hr>
              <a href="#" class="d-block my-2">Arts & Music</a>
              <a href="#" class="d-block my-2">Biographies</a>
              <a href="#" class="d-block my-2">Business</a>
              <a href="#" class="d-block my-2">Engineering</a>
              <a href="#" class="d-block my-2">Health & Fitness</a>
              <a href="#" class="d-block my-2">Medical</a>
              <a href="#" class="d-block my-2 mb-3">Sports</a>
              <div class="style-five mb-4"></div>
              <hr class="style-five"> 

              <p class="mt-4">Price <span class="close">-</span></p>
              <hr>
              <form class="price-select">
                  <input type="range" class="custom-range">
                  <label>Rs.10</label><label class="close" style="font-size:12px;">Rs.12000</label>
                  <div class="d-flex justify-content-between">
                  <div class="border border-warning" style="width:100px;height:40px"></div>
                  <button type="button" class="btn btn-outline-warning">GO</button>
                  </div>  
              </form>
             

              <div class="style-five my-4"></div>
              <hr class="style-five"> 

              <p>Discount %<span class="close">-</span></p>
              <hr>
              <form class="discount-form">
                <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="zero_ten" name="zero_ten">
                   <label class="custom-control-label" for="zero_ten">0-10%</label>
                   <span class="close" style="font-size:13px">23444</span>
                </div>
                <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="ten_twenty" name="ten_twenty">
                   <label class="custom-control-label" for="ten_twenty">10-20%</label>
                   <span class="close" style="font-size:13px">51444</span>
                </div>
                <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="twenty_thirty" name="twenty_thirty">
                   <label class="custom-control-label" for="twenty_thirty">20-30%</label>
                   <span class="close" style="font-size:13px">31444</span>
                </div>
                <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="thirty_fourty" name="thirty_fourty">
                   <label class="custom-control-label" for="thirty_fourty">30-40%</label>
                   <span class="close" style="font-size:13px">1444</span>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                   <input type="checkbox" class="custom-control-input" id="fourty_fifty" name="fourty_fifty">
                   <label class="custom-control-label" for="fourty_fifty">40-50%</label>
                   <span class="close" style="font-size:13px">2444</span>
                </div>
              </form>
              <div class="style-five mb-4"></div>
              <hr class="style-five"> 
              
              <p class="mt-4">Customer Rating <span class="close">-</span></p>
              <hr>
              <form class="rating-form">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="five_star" name="five_star" value="five_star">
                    <label class="custom-control-label" for="five_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star-half-full text-warning" style="font-size:16px"></span></label>
                    <span class="close" style="font-size:13px">2444</span>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="four_star" name="four_star" value="four_star">
                    <label class="custom-control-label" for="four_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span></label>
                    <span class="close" style="font-size:13px">2444</span>
                </div>
              <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="three_star" name="three_star" value="three_star">
                    <label class="custom-control-label" for="three_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span></label>
                    <span class="close" style="font-size:13px">2444</span>
                </div>
                 <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="two_star" name="two_star" value="two_star">
                    <label class="custom-control-label" for="two_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span></label>
                    <span class="close" style="font-size:13px">2444</span>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" class="custom-control-input" id="one_star" name="one_star" value="one_star">
                    <label class="custom-control-label" for="one_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span>
                    <span class="fa fa-star-o" style="font-size:16px"></span></label>
                    <span class="close" style="font-size:13px">2444</span>
                </div>

              </form>
              <div class="style-five mb-4"></div>
              <hr class="style-five"> 

           </div>
        
         </div>
         <div class="col-md-9 col-7">
            <h4>✵ SELLING BOOKS</h4> 
            <hr class="style-one">
           <div class="row p-2">
           <?php
              $book_view = "SELECT * FROM sellbook";
              $response = $db->query($book_view);
              if($response){
                  while($data=$response->fetch_assoc()){
                      $id = $data['id'];
                      echo "<div class='col-md-3 book-view mb-3' bookid='".$id."'>
                               <div class='card border-0 p-0'>
                                   <div class='card-body p-1'>";
                                   $image = "data:image/png;base64,".base64_encode($data['book_image']);
                                   $book_title = $data['book_title'];
                                   $book_author = $data['book_author'];
                                   $mrp_price = $data['mrp_price'];
                                   $selling_price = $data['selling_price'];
                                   $discount = number_format((($mrp_price-$selling_price)/$mrp_price)*100);
                                     echo "<div class='mb-2'><img class='card-img-top' src='".$image."'bookid='".$id."'></div>";
                                     echo "<h5>".$book_title."</h5>";
                                     echo "<spna>by ".$book_author."</spna>";
                                     echo "<p class='mb-0'><del>Rs.".$mrp_price."</del> Rs.".$selling_price ."<span class='border ml-3 p-1 rounded'>".$discount."% OFF</span></p>
                                     <div class='mt-2'>
                                     <span class='fa fa-star text-warning' style='font-size:16px'></span>
                                     <span class='fa fa-star text-warning' style='font-size:16px'></span>
                                     <span class='fa fa-star text-warning' style='font-size:16px'></span>
                                     <span class='fa fa-star text-warning' style='font-size:16px'></span>
                                     <span class='fa fa-star-half-full text-warning' style='font-size:16px'></span>
                                     <span>(34)</span>
                                     </div>
                                     </div>
                                </div>
                            </div>";
                  }        
              }
           ?>    
           </div>
               <h4>✸ DONATED BOOKS</h4>
               <hr class="style-one">
           <div class="row p-2">
               
           </div>

         </div>
     </div>
     
     

    </div>

   <?php include_once("./design/footer.php");?>
   <script>
   $(document).ready(function(){
       $(".book-view").each(function(){
           $(this).click(function(){
               var bookid = $(this).attr("bookid");
              // sessionStorage.setItem("sent", bookid);
               window.open('./show_book_view_details.php?bookid='+bookid,'_blank');
               //var width = 20;
               //var height
               //window.location.href = "http://localhost/main.php?width=" + width + "&height=" + height;
               
               });
           });
       });
   </script>
<script src="./js/index.js"></script>
</body>
</html>