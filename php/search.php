<?php

require_once("../database/database.php");
$value = $_POST['value'];

$getdata = "SELECT * FROM sellbook WHERE book_title LIKE '$value%'";
$response = $db->query($getdata);
if($response){
    $data=$response->fetch_assoc();
    echo "<a href='#'class='list-group-item list-group-item-action searchBook' onclick='myBookView()' bookid='".$data['id']."' category='".$data['book_category']."'>".$data['book_title']."</a>";
        
    
    
}















?>