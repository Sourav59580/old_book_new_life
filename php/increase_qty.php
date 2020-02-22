<?php
 require_once("../database/database.php");
 $bookid = $_POST['bookid'];
 $email = $_POST['email'];
 $sell_price = $_POST['selling_price'];

 $update_quantity = "UPDATE cart SET quantity=quantity+1, sell_price=sell_price+'$sell_price' WHERE bookid='$bookid' AND email='$email'";
 $response = $db->query($update_quantity);
 if ($response) {
     echo "update";
 } else {
     echo "Failed to update";
 }



?>