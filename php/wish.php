<?php
   require("../database/database.php");
   $bookid = $_POST['bookid'];
   $email = $_POST['email']; 

   $table_check = "SELECT * FROM wishlist";
   $response = $db->query($table_check);
   if($response)
   {
    $insert_data = "INSERT INTO wishlist(bookid,email) VALUES('$bookid','$email')";
    $response = $db->query($insert_data);
    if($response){
        echo "success";
    }
    else{
        echo "Failed! to insert data";
    }

   }
   else{
       $create_table = "CREATE TABLE wishlist(
        id INT(10) NOT NULL AUTO_INCREMENT,
        bookid INT(10),
        email VARCHAR(50),
        PRIMARY KEY(id)
       )";
       $response = $db->query($create_table);
       if($response){
           $insert_data = "INSERT INTO wishlist(bookid,email) VALUES('$bookid','$email')";
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