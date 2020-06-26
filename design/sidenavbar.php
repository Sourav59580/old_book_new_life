<div>
   <p class="">Books <span class="close">-</span></p>
   <hr>
   <a href="./arts_and_Music.php" class="d-block my-2">Arts & Music</a>
   <a href="./biographies.php" class="d-block my-2">Biographies</a>
   <a href="./business.php" class="d-block my-2">Business</a>
   <a href="./engineering.php" class="d-block my-2">Engineering</a>
   <a href="#" class="d-block my-2">Health & Fitness</a>
   <a href="./medical.php" class="d-block my-2">Medical</a>
   <a href="#" class="d-block my-2 mb-3">Sports</a>
   <div class="style-five mb-4"></div>
   <hr class="style-five">

   <p class="mt-4">Price <span class="close">-</span></p>
   <hr>
   <form class="price-select">
      <input type="range" class="custom-range" id="range" min='0' max='12000' name="range">
      <label>Rs.10</label><label class="close" style="font-size:12px;">Rs.12000</label>
      <div class="d-flex justify-content-between">
         <div class="border border-warning  p-2" style="width:100px;height:40px">Max : <span class="display-range">6000</span></div>
         <button type="submit" class="btn btn-outline-warning range-btn">GO</button>
      </div>
   </form>
   <script>
      $(document).ready(function() {
         $("#range").on("input", function() {
            var value = $("#range").val();
            $(".display-range").html(value);

         });
      });
      $(document).ready(function(){
         $(".price-select").submit(function(e){
            e.preventDefault();
            var value = $("#range").val();
            var username = "<?php if(empty($username)){echo 'null';} else{echo 'present';} ?>";
            if(username=="null")
            {
               
               window.location.href='./local_range.php?range='+value;
            }
            
            else
            { 
               
               window.location.href='./range.php?range='+value;
            }
            
           
         });
      });
   </script>

   <div class="style-five my-4"></div>
   <hr class="style-five">

   <p>Discount %<span class="close">-</span></p>
   <hr>
   <form class="discount-form">
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input discount" id="zero_ten" name="discount" value="10">
         <label class="custom-control-label" for="zero_ten">0-10%</label>
         <span class="close" style="font-size:13px">
         <?php
            $get_quantity = "SELECT COUNT(discount) AS result FROM `sellbook` WHERE discount BETWEEN 0 AND 10";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?>
         </span>
      </div>
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input discount" id="ten_twenty" name="discount" value="20">
         <label class="custom-control-label" for="ten_twenty">10-20%</label>
         <span class="close" style="font-size:13px">
         <?php
            $get_quantity = "SELECT COUNT(discount) AS result FROM `sellbook` WHERE discount BETWEEN 10 AND 20";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?>
        </span>
      </div>
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input discount" id="twenty_thirty" name="discount" value="30">
         <label class="custom-control-label" for="twenty_thirty">20-30%</label>
         <span class="close" style="font-size:13px">
         <?php
            $get_quantity = "SELECT COUNT(discount) AS result FROM `sellbook` WHERE discount BETWEEN 20 AND 30";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?>
        </span>
      </div>
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input discount" id="thirty_fourty" name="discount" value="40">
         <label class="custom-control-label" for="thirty_fourty">30-40%</label>
         <span class="close" style="font-size:13px">
         <?php
            $get_quantity = "SELECT COUNT(discount) AS result FROM `sellbook` WHERE discount BETWEEN 30 AND 40";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?>
         </span>
      </div>
      <div class="custom-control custom-radio mb-3">
         <input type="radio" class="custom-control-input discount" id="fourty_fifty" name="discount" value="50">
         <label class="custom-control-label" for="fourty_fifty">40-50%</label>
         <span class="close" style="font-size:13px">
         <?php
            $get_quantity = "SELECT COUNT(discount) AS result FROM `sellbook` WHERE discount BETWEEN 40 AND 51";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?>
         </span>
      </div>
   </form>
   <script>
      $(document).ready(function(){
         $(".discount").each(function(){
            $(this).on("input",function(){
               var value = $(this).val();
               
               var username = "<?php if(empty($username)){echo 'null';} else{echo 'present';} ?>";
               if(username=="null")
               {
                  sessionStorage.setItem("active",value);
                  window.location.href='./local_discount.php?discount='+value;
               }
                 
               else
               {
                  sessionStorage.setItem("active",value);
                  window.location.href='./discount.php?discount='+value;
               }
                  
            });
         });
      });
   </script>
   <div class="style-five mb-4"></div>
   <hr class="style-five">

   <p class="mt-4">Customer Rating <span class="close">-</span></p>
   <hr>
   <form class="rating-form">
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input star" id="five_star" name="star" value="5">
         <label class="custom-control-label" for="five_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star-half-full text-warning" style="font-size:16px"></span></label>
         <span class="close" style="font-size:13px">
         <?php
            $get_quantity = "SELECT COUNT(rating) AS result FROM `sellbook` WHERE rating=5";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?>
         </span>
      </div>
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input star" id="four_star" name="star" value="4">
         <label class="custom-control-label" for="four_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span></label>
         <span class="close" style="font-size:13px"><?php
            $get_quantity = "SELECT COUNT(rating) AS result FROM `sellbook` WHERE rating=4";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?></span>
      </div>
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input star" id="three_star" name="star" value="3">
         <label class="custom-control-label" for="three_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span></label>
         <span class="close" style="font-size:13px"><?php
            $get_quantity = "SELECT COUNT(rating) AS result FROM `sellbook` WHERE rating=3";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?></span>
      </div>
      <div class="custom-control custom-radio">
         <input type="radio" class="custom-control-input star" id="two_star" name="star" value="2">
         <label class="custom-control-label" for="two_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span></label>
         <span class="close" style="font-size:13px"><?php
            $get_quantity = "SELECT COUNT(rating) AS result FROM `sellbook` WHERE rating=2";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?></span>
      </div>
      <div class="custom-control custom-radio mb-3">
         <input type="radio" class="custom-control-input star" id="one_star" name="star" value="1">
         <label class="custom-control-label" for="one_star"><span class="fa fa-star text-warning" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span>
            <span class="fa fa-star-o" style="font-size:16px"></span></label>
         <span class="close" style="font-size:13px"><?php
            $get_quantity = "SELECT COUNT(rating) AS result FROM `sellbook` WHERE rating=1";
            $response=$db->query($get_quantity);
            if($response)
            {
               $data = $response->fetch_assoc();
               echo $data['result'];

            }
            else{
               echo "0";
            }

         ?></span>
      </div>

   </form>
   <script>
      $(document).ready(function(){
         $(".star").each(function(){
            $(this).on("input",function(){
               var value = $(this).val();
               var username = "<?php if(empty($username)){echo 'null';} else{echo 'present';} ?>";
               if(username=='null'){
                  window.location = "./local_ratingBook.php?rating="+value;
               }else{
                  window.location = "./ratingBook.php?rating="+value;
               }
               
            });
         });
      });

   </script>
   <div class="style-five mb-4"></div>
   <hr class="style-five">

</div>