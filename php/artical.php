<?php
require("../database/database.php");


//ECHO  $_GET['xyz'];

//ECHO $_POST['file'];//post method
if (isset($_POST['blogString'])) {
    $blogstring = $_POST['blogString'];
    
    $get_table = "SELECT * FROM artical";
    $response = $db->query($get_table);
    if($response){
        $insert_data = "INSERT INTO artical(blogstring)VALUES('$blogstring')";
        $response = $db->query($insert_data);
        if($response){
            echo "success";
        }else{
            echo "Failed";
        }
    }else{
        $create_table = "CREATE TABLE artical(
            id INT(10) NOT NULL AUTO_INCREMENT,
            blogstring LONGTEXT,
            PRIMARY KEY(id)
        )";
        $response = $db->query($create_table);
        if($response){
            $insert_data = "INSERT INTO artical(blogstring)VALUES('$blogstring')";
            $response = $db->query($insert_data);
            if($response){
                echo "success";
            }else{
                echo "Failed";
            }

        }else{
            echo "Table create failed";
        }
    }

}



//$string = $_POST['string'];
//echo $string;


// $artical_title = $_POST['title'];
// $author_name = $_POST['author'];
// $email = 'souravsantra59680@gmail.com';
// $artical_description = $_POST['editor'];

// $get_table = "SELECT * FROM artical";
// $response = $db->query($get_table);
// if($response)
// {
//     $insert_data = "INSERT INTO artical(email,artical_title,artical_author,artical_description)VALUES('$email','$artical_title','$author_name','$artical_description')";
//         $response = $db->query($insert_data);
//         if($response)
//         {
//             echo "success";
//         }
//         else{
//             echo "Failed to insert data";
//         }

// }
// else{
//     $create_table = "CREATE TABLE artical(
//         id INT(10) NOT NULL AUTO_INCREMENT,
//         email VARCHAR(50),
//         artical_title VARCHAR(255),
//         artical_author VARCHAR(50),
//         artical_description TEXT,
//         PRIMARY KEY(id)
//     )";
//     $response = $db->query($create_table);
//     if($response){
//         $insert_data = "INSERT INTO artical(email,artical_title,artical_author,artical_description)VALUES('$email','$artical_title','$author_name','$artical_description')";
//         $response = $db->query($insert_data);
//         if($response)
//         {
//             echo "success";
//         }
//         else{
//             echo "Failed to insert data";
//         }

//     }else{
//         echo "failed to create table";
//     }
// }
















?>