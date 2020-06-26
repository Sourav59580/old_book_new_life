<?php
require("../database/database.php");

$email = $_POST['email'];
$bookid = $_POST['bookid'];
$category = $_POST['category'];
$question = $_POST['question'];

$check_table = "SELECT * FROM queans";
$response = $db->query($check_table);
if($response){
    $insertData = "INSERT INTO queans(bookid,category,email,question) VALUES('$bookid','$category','$email','$question')";
       $response = $db->query($insertData);
       if($response){
        echo $question;
       }else{
           echo "failed";
       }
}
else{
   $create_table = "CREATE TABLE queans(
       id INT(10) NOT NULL AUTO_INCREMENT,
       bookid INT(10),
       category VARCHAR(50),
       email VARCHAR(100),
       question TEXT,
       answer MEDIUMTEXT,
       PRIMARY KEY(id)
   )";
   $response = $db->query($create_table);
   if($response){
       $insertData = "INSERT INTO queans(bookid,category,email,question) VALUES('$bookid','$category','$email','$question')";
       $response = $db->query($insertData);
       if($response){
        echo $question;
       }else{
           echo "failed";
       }
   }
}
















?>