<?php
require("../database/database.php");

$bookid = $_POST['bookid'];

$update_totalsell = "UPDATE sellbook SET totalsell=totalsell+1 WHERE id='$bookid'";
$response = $db->query($update_totalsell);
if($response)
{
    echo "success";
}
else{
    echo "Update failed";
}













?>