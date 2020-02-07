<?php
require("../database/database.php");
$email = $_POST['email'];
$bookid = $_POST['bookid'];

$delete_wishlist = "DELETE FROM wishlist WHERE email='$email' AND bookid='$bookid'";
$response = $db->query($delete_wishlist);
if($response){
    echo "success";
}
else{
    echo "Failed! try agin..";
}















?>