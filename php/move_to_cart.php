<?php
   require("../database/database.php");
   $bookid = $_POST['bookid'];
   $email = $_POST['email']; 
   $sell_price = $_POST['sell_price'];
   $status = $_POST['status'];

   $table_check = "SELECT * FROM cart";
   $response = $db->query($table_check);
   if($response)
   {
    $insert_data = "INSERT INTO cart(bookid,sell_price,email,quantity,status_type) VALUES('$bookid','$sell_price','$email',1,'$status')";
    $response = $db->query($insert_data);
    if($response){
        $delete_product = "DELETE FROM save_later WHERE email='$email' AND bookid='$bookid' AND status_type='$status'";
            $response = $db->query($delete_product);
            if($response){
                echo "success";
            }
            else{
                echo "Failed! try agin..";
            }
    }
    else{
        echo "Failed! to insert data";
    }

   }
   else{
       $create_table = "CREATE TABLE cart(
        id INT(10) NOT NULL AUTO_INCREMENT,
        bookid INT(10),
        sell_price FLOAT(20),
        email VARCHAR(50),
        quantity INT(10),
        status_type VARCHAR(20),
        PRIMARY KEY(id)
       )";
       $response = $db->query($create_table);
       if($response){
           $insert_data = "INSERT INTO cart(bookid,sell_price,email,quantity,status_type) VALUES('$bookid','$sell_price','$email',1,'$status')";
           $response = $db->query($insert_data);
           if($response){
            $delete_product = "DELETE FROM save_later WHERE email='$email' AND bookid='$bookid' AND status_type='$status'";
            $response = $db->query($delete_product);
            if($response){
                echo "success";
            }
            else{
                echo "Failed! try agin..";
            }
           }
           else{
               echo "Failed! to insert data";
           }
           
       }
   }


?>