<?php
require('../database/database.php');

$bookids = json_decode($_POST['bookid']);
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$mobile = $_POST['mobile'];
$pincode = $_POST['pincode'];
$house = $_POST['house'];
$street = $_POST['street'];
$landmark = $_POST['landmark'];
$city = $_POST['city'];
$state = $_POST['state'];
$status = 'Active';

$sending_status = "";
$length = count($bookids);

for($i=0;$i<$length;$i++){
    $updateTable = "UPDATE buy SET fullname='$fullname',mobile='$mobile',pincode='$pincode',house='$house',street='$street',landmark='$landmark',city='$city',user_state='$state',delivery_status='$status' WHERE bookid = '$bookids[$i]' AND email='$email'";

    $response = $db->query($updateTable);
    if($response){
        $sending_status='success';
    }else{
        $sending_status='Failed';
    }

} 
echo $sending_status;













?>