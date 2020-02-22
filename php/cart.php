<?php
require("../database/database.php");
$bookid = $_POST['bookid'];
$email = $_POST['email'];
$sell_price = $_POST['sell_price'];

$table_check = "SELECT * FROM cart";
$response = $db->query($table_check);
if ($response) {
    $check_bookid = "SELECT bookid FROM cart WHERE email='$email'";
    $response_bookid = $db->query($check_bookid);
    $flag = 0;
    while ($data = $response_bookid->fetch_assoc()) {
        if ($data['bookid'] == $bookid) {
            $flag = 1;
            break;
        }
    }
    if ($flag == 1) {
        $update_quantity = "UPDATE cart SET quantity=quantity+1, sell_price=sell_price+'$sell_price' WHERE bookid='$bookid' AND email='$email'";
        $response = $db->query($update_quantity);
        if ($response) {
            echo "update";
        } else {
            echo "Failed to update";
        }
    } else {
        $insert_data = "INSERT INTO cart(bookid,sell_price,email,quantity) VALUES('$bookid','$sell_price','$email',1)";
        $response = $db->query($insert_data);
        if ($response) {
            echo "success";
        } else {
            echo "Failed! to insert data";
        }
    }
} else {
    $create_table = "CREATE TABLE cart(
        id INT(10) NOT NULL AUTO_INCREMENT,
        bookid INT(10),
        sell_price FLOAT(20),
        email VARCHAR(50),
        quantity INT(10),
        PRIMARY KEY(id)
       )";
    $response = $db->query($create_table);
    if ($response) {
        $insert_data = "INSERT INTO cart(bookid,sell_price,email,quantity) VALUES('$bookid','$sell_price','$email',1)";
        $response = $db->query($insert_data);
        if ($response) {
            echo "success";
        } else {
            echo "Failed! to insert data";
        }
    }
}
