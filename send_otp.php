<?php
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

$sid = 'ACe488e3599419b231862f19ad1b0becf9';
$token = '4deb9e6e67f8777af41542453250f999';
$twilio = new Client($sid, $token);

$phoneNumber = $_POST['phoneNumber'];

try {
    $verification = $twilio->verify->v2->services('VA51b77f051b2c795894791d2e83979c73')
                                      ->verifications
                                      ->create($phoneNumber, 'sms');

    echo "OTP sent successfully to $phoneNumber. Verification SID: " . $verification->sid;
} catch (Exception $e) {
    echo "Error sending OTP: " . $e->getMessage();
}
?>
