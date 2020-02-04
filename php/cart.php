<?php
   require("../database/database.php");
   $bookid = $_POST['bookid'];
   $email = $_POST['email']; 

   $table_check = "SELECT * FROM cart";
   $response = $db->query($table_check);
   if($response)
   {

   }
   else{
       $create_table = "CREATE TABLE cart(

       )";
   }
















?>