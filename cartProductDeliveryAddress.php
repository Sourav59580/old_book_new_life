<?php
 
 $obj = json_decode($_GET['bookids']);
print_r(count($obj));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <script>
        var url_string = window.location;
        var url = new URL(url_string);
        var json = url.searchParams.get('bookids');
        var obj = JSON.parse(json);
        console.log(obj[1]);

    </script>
</body>
</html>


