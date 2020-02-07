<?php
require("../database/database.php");
$email = $_POST['email'];
$bookid = $_POST['bookid'];

$delete_product = "DELETE FROM save_later WHERE email='$email' AND bookid='$bookid'";
$response = $db->query($delete_product);
if($response){
    echo "success";
}
else{
    echo "Failed! try agin..";
}















?>