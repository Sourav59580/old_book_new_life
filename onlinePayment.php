<?php
require('./src/Instamojo.php');

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['mobile'];
$amount = $_GET['sellprice'];

//print_r($name." ".$email." ". $phone);

$api = new Instamojo\Instamojo('test_c2bb1c309d111c59923e30606ff','test_65db6f68825688481c7358ca397', 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Buying Product",
        "buyer_name" => $name,
        "amount" => $amount,
        "send_email" => true,
        "email" => $email,
        "send_sms" => true,
        "phone" => $phone,
        "redirect_url" => "https://ersourav.in/success.html"
        ));
        $url = $response['longurl'];
        header('Location:'.$url);

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>