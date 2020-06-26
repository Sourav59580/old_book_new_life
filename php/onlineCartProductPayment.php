<?php

require("../database/database.php");
$bookid_obj = json_decode($_POST['bookid']);

$email = $_POST['email'];
$mydate=getdate(date("U"));
$orderDate = "$mydate[mday] $mydate[month]  $mydate[year]";

$length = count($bookid_obj);
$i=0;
$status ="";

for($i=0;$i<$length;$i++){

    $bookid = $bookid_obj[$i];

    $updatePayment = "UPDATE buy SET delivery_status = 'processing', payment_method = 'Online', order_date ='$orderDate', payment_status='success' WHERE bookid = '$bookid' AND email='$email'";
    $response = $db->query($updatePayment);
    if($response){
        $delete_product = "DELETE FROM cart WHERE email='$email' AND bookid='$bookid' AND status_type='sellbook'";
        $response = $db->query($delete_product);
        if($response){
            $status="success";
        }
        else{
            $status="Failed! try agin..";
        }
        
    }
    else{
        $status="failed";
    }
}
echo $status;
















?>