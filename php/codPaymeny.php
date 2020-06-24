<?php
require('../database/database.php');

$bookid = $_POST['bookid'];
$email = $_POST['email'];
$mydate=getdate(date("U"));
$orderDate = "$mydate[mday] $mydate[month]  $mydate[year]";


$updatePayment = "UPDATE buy SET delivery_status = 'processing', payment_method = 'COD', order_date ='$orderDate' WHERE bookid = '$bookid' AND email='$email'";
$response = $db->query($updatePayment);
if($response){
    echo "success";
}
else{
    echo "failed";
}













?>