<?php
require("../database/database.php");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$check_table = "SELECT * FROM register";
$response = $db->query($check_table);
if($response){
    $insert_data = "INSERT INTO register(firstname,lastname,email,password,phone)
    VALUES('$firstname','$lastname','$email','$password','$phone')";
        $response = $db->query($insert_data);
        if($response){
            echo"success";
        }
        else{
            echo"Failed to data store";
        }
}
else{
    $create_table = "CREATE TABLE register(
        id INT(10) NOT NULL AUTO_INCREMENT,
        firstname VARCHAR(50),
        lastname VARCHAR(50),
        email VARCHAR(100),
        password VARCHAR(20),
        phone VARCHAR(10),
        PRIMARY KEY(id)
    )";

    $response = $db->query($create_table);
    if($response){
      $insert_data = "INSERT INTO register(firstname,lastname,email,password,phone)
      VALUES('$firstname','$lastname','$email','$password','$phone')";
          $response = $db->query($insert_data);
          if($response){
              echo"success";
          }
          else{
              echo"Failed to data store";
          }
    }
    else{
        echo"Failed to create table";
    }
}













?>
