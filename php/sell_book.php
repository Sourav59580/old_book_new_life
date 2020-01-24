<?php
require("../database/database.php");
$file = $_FILES['book-image'];
$location = $file['tmp_name'];
$book_image = addslashes(file_get_contents($location));
$book_title = $_POST['book-title'];
$book_author = $_POST['book-author'];
$seller_name = $_POST['coustomer-name'];
$book_description = addslashes($_POST['book-description']);
$author_description = addslashes($_POST['author-description']);

session_start();
$username = $_SESSION['username'];

$check_table = "SELECT * FROM sellbook";
$response = $db->query($check_table);
if($response){
    $insert_data = "INSERT INTO sellbook(username,sellername,book_image,book_title,book_author,book_description,author_description)
    VALUES('$username','$seller_name','$book_image','$book_title','$book_author','$book_description','$author_description')";
    $response = $db->query($insert_data);
    if($response){
        echo "success";
    }
    else{
        echo "Failed to insert data!";
    }
} 
else{
    $create_table = "CREATE TABLE sellbook(
     id INT(10) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50),
     sellername VARCHAR(20),
     book_image MEDIUMBLOB,
     book_title VARCHAR(100),
     book_author VARCHAR(100),
     book_description MEDIUMTEXT,
     author_description MEDIUMTEXT,
     PRIMARY KEY(id)
    )";
    $response = $db->query($create_table);
    if($response){
        $insert_data = "INSERT INTO sellbook(username,sellername,book_image,book_title,book_author,book_description,author_description)VALUES('$username','$seller_name','$book_image','$book_title','$book_author','$book_description','$author_description')";
        $response = $db->query($insert_data);
        if($response){
            echo "success";
        }
        else{
            echo "Failed to insert data!";
        }
    }
    else{
        echo "Failed to create table!";
    }
}












?>