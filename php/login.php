<?php
require("../database/database.php");
$username = $_POST['email'];
$password = $_POST['password'];

$check_data = "SELECT * FROM register WHERE email='$username'";
$response = $db->query($check_data);
$data = $response->fetch_assoc();
if($data){
$email = $data['email'];
if($email==$username){
  $o_password = $data['password'];
  if($o_password==$password){
      echo "success";
      session_start();
      $_SESSION['username'] = $username;
  }
  else{
      echo "wrong password!try again";
  }
}
else{
    echo "Username not exits!please register now...";
}
}


















?>