<?php
require('../database/database.php');

$bookid = $_POST['bookid'];
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

// echo"$bookid + ' '+$email+' '+$fullname+' '+$mobile+' '+$house+' '+$street+' '+$landmark+' '+$city+' '+$state+' '+$status";

// $getID = "SELECT id,email FROM buy WHERE bookid='$bookid' AND email='$email'";
// $responseData = $db->query($getID);
// $data = $responseData->fetch_assoc();
// echo $data['id'];
// while($data = $responseData->fetch_assoc()){
//    $primaryEmail[$i] = trim($data['email']);
//    $primaryId[$i] = $data['id'];
//    $i++; 
// }
// $j= "";
// for($i=0;$i<count($primaryEmail);$i++){
//     if(strcmp(strval($primaryEmail[$i]),strval(trim($email)))!=0){
//        echo $primaryEmail[$i];
//     }
// }
// $primaryBookId = $data['id'];
 

$updateTable = "UPDATE buy SET fullname='$fullname',mobile='$mobile',pincode='$pincode',house='$house',street='$street',landmark='$landmark',city='$city',user_state='$state',delivery_status='$status' WHERE bookid = '$bookid' AND email='$email'";

$response = $db->query($updateTable);
if($response){
    echo 'success';
}else{
    echo 'Failed';
}











?>