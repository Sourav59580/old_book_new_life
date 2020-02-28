<?php

require_once("../database/database.php");
$value = $_POST['value'];

$getdata = "SELECT book_title FROM sellbook";
$response = $db->query($getdata);
while($data=$response->fetch_assoc())
{
    if($data['book_title']=='$value')
    {
        echo "<li>".$data['book_title']."</li>";
    }
    
}















?>