<?php
require("../database/database.php");
$bookid = $_POST['bookid'];
$email = $_POST['email'];

$check_table = "SELECT * FROM save_later";
$response = $db->query($check_table);
if($response){
    $insert_data = "INSERT INTO save_later(bookid,email) VALUES('$bookid','$email')";
        $response_data = $db->query($insert_data);
        if($response){
            $delete_product = "DELETE FROM cart WHERE email='$email' AND bookid='$bookid'";
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
    $create_save_table = "CREATE TABLE save_later(
        id INT(10) NOT NULL AUTO_INCREMENT,
        bookid INT(10),
        email VARCHAR(50),
        PRIMARY KEY(id)
    )";
    $response = $db->query($create_save_table);
    if($response){
        $insert_data = "INSERT INTO save_later(bookid,email) VALUES('$bookid','$email')";
        $response_data = $db->query($insert_data);
        if($response){
            $delete_product = "DELETE FROM cart WHERE email='$email' AND bookid='$bookid'";
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
        echo "Failed! to create table";
    }
}








?>