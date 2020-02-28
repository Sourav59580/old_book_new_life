<?php
require("../database/database.php");
$file = $_FILES['book-image'];
$location = $file['tmp_name'];
$book_image = addslashes(file_get_contents($location));
$book_title = $_POST['book-title'];
$book_author = $_POST['book-author'];
$book_category = $_POST['book-category'];
$seller_name = $_POST['coustomer-name'];
$mrp_price = $_POST['mrp-price'];
$seeling_price = $_POST['selling-price'];
$discount = ((($mrp_price-$seeling_price)/$mrp_price)*100);
$book_description = addslashes($_POST['book-description']);
$author_description = addslashes($_POST['author-description']);

session_start();
$username = $_SESSION['username'];

$check_table = "SELECT * FROM sellbook";
$response = $db->query($check_table);
if($response){
    $insert_data = "INSERT INTO sellbook(username,sellername,book_image,book_title,book_author,book_category,mrp_price,selling_price,discount,book_description,author_description,totalsell)
    VALUES('$username','$seller_name','$book_image','$book_title','$book_author','$book_category','$mrp_price','$seeling_price','$discount','$book_description','$author_description',0)";
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
     book_category VARCHAR(50),
     mrp_price INT(10),
     selling_price INT(10),
     discount INT(5),
     book_description MEDIUMTEXT,
     author_description MEDIUMTEXT,
     totalsell INT(10),
     PRIMARY KEY(id)
    )";
    $response = $db->query($create_table);
    if($response){
        $insert_data = "INSERT INTO sellbook(username,sellername,book_image,book_title,book_author,book_category,mrp_price,selling_price,discount,book_description,author_description,totalsell)VALUES('$username','$seller_name','$book_image','$book_title','$book_author','$book_category','$mrp_price','$seeling_price','$discount','$book_description','$author_description',0)";
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