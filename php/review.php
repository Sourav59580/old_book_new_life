<?php
require('../database/database.php');

$orderId = $_POST['orderId'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$mydate=getdate(date("U"));
$reviewDate = "$mydate[mday] $mydate[month]  $mydate[year]";

$updateReview = "UPDATE buy SET rating = '$rating', review = '$review', review_date ='$reviewDate' WHERE id = '$orderId'";
$response = $db->query($updateReview);
if($response){
    echo "success";
}
else{
    echo "failed";
}










?>