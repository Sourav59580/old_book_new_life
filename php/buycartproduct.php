<?php
require("../database/database.php");

$bookid_obj = json_decode($_POST['bookids']);
$sellprices_obj = json_decode($_POST['sellprices']);
$postemail = $_POST['email'];

$length = count($bookid_obj);
$i=0;
$status ="";

for($i=0;$i<$length;$i++){

$bookid = $bookid_obj[$i];
$email = $postemail;
$sell_price = $sellprices_obj[$i];

$check_table = "SELECT * FROM buy";
$response = $db->query($check_table);
if($response)
{
    $insert_data = "INSERT INTO buy(bookid,sell_price,email,quantity) VALUES('$bookid','$sell_price','$email',1)";
    $response = $db->query($insert_data);
    if ($response) {
        $status = "success";
    } else {
        $status = "Failed! to insert data";
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
        $status = "success";
    } else {
        $status = "Failed! to insert data";
    }
}
}
}
echo $status;
