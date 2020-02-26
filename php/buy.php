<?php
require("../database/database.php");
$bookid = $_POST['bookid'];
$email = $_POST['email'];
$sell_price = $_POST['sell_price'];

$check_table = "SELECT * FROM buy";
$response = $db->query($check_table);
if($response)
{
    $insert_data = "INSERT INTO buy(bookid,sell_price,email,quantity) VALUES('$bookid','$sell_price','$email',1)";
    $response = $db->query($insert_data);
    if ($response) {
        echo "success";
    } else {
        echo "Failed! to insert data";
    }
}
else{
    $create_table = "CREATE TABLE buy(
        id INT(10) NOT NULL AUTO_INCREMENT,
        bookid INT(10),
        sell_price FLOAT(20),
        email VARCHAR(50),
        quantity INT(10),
        PRIMARY KEY(id)
       )";

$response = $db->query($create_table);
if ($response) {
    $insert_data = "INSERT INTO buy(bookid,sell_price,email,quantity) VALUES('$bookid','$sell_price','$email',1)";
    $response = $db->query($insert_data);
    if ($response) {
        echo "success";
    } else {
        echo "Failed! to insert data";
    }
}
}











?>