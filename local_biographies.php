<?php
require("./database/database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home : Biographies Books</title>
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
  transform:scale(1.1);
  z-index: 1;
  transition:1s;
  cursor: pointer;
  background: white; 
}

    </style>
</head>
<body>
    <?php
    include_once("./design/navbar.php");
    ?>

    <div class="container-fluid page">
     <div class=" container row mb-4">
         <div class="col-md-2 col-5 border-right p-4">
           <?php include_once("./design/sidenavbar.php") ?>
         </div>
         
         <div class="col-md-8 col-7 border-right">
            <h4>✵ SELLING BOOKS</h4> 
            <hr class="style-one">
           <div class="row p-2">
           <?php
              $book_view = "SELECT * FROM sellbook WHERE book_category='Biographies'";
              $response = $db->query($book_view);
              if($response){
                  while($data=$response->fetch_assoc()){
                      $id = $data['id'];
                      $category = $data['book_category'];
                      echo "<div class='col-md-3 book-view mb-3' bookid='".$id."' category='".$category."' >
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

         <div class="col-md-2">
            <p>✸ Recommended books</p>
            <hr class="style-one">

         
         </div>
     </div>
     
     

    </div>

   <?php include_once("./design/footer.php");?>
   <script>
   $(document).ready(function(){
       $(".book-view").each(function(){
           $(this).click(function(){
               var bookid = $(this).attr("bookid");
               
               var category = $(this).attr("category");
               sessionStorage.setItem("sent", bookid);
               
               window.open('./local_show_book_view_details.php?bookid='+bookid +'&category='+category,'_blank');
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