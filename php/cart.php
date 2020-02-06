<?php
   require("../database/database.php");
   $bookid = $_POST['bookid'];
   $email = $_POST['email']; 
   $sell_price = $_POST['sell_price'];

   $table_check = "SELECT * FROM cart";
   $response = $db->query($table_check);
   if($response)
   {
    $insert_data = "INSERT INTO cart(bookid,sell_price,email) VALUES('$bookid','$sell_price','$email')";
    $response = $db->query($insert_data);
    if($response){
        echo "success";
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
        PRIMARY KEY(id)
       )";
       $response = $db->query($create_table);
       if($response){
           $insert_data = "INSERT INTO cart(bookid,sell_price,email) VALUES('$bookid','$sell_price','$email')";
           $response = $db->query($insert_data);
           if($response){
               echo "success";
           }
           else{
               echo "Failed! to insert data";
           }
           
       }
   }
















?>