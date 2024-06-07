<?php
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

$sid = 'ACe488e3599419b231862f19ad1b0becf9';
$token = '4deb9e6e67f8777af41542453250f999';
$twilio = new Client($sid, $token);

$phoneNumber = $_POST['phoneNumber'];
$otp = $_POST['otp'];

try {
    $verification_check = $twilio->verify->v2->services('VA51b77f051b2c795894791d2e83979c73')
                                             ->verificationChecks
                                             ->create([
                                                 'to' => $phoneNumber,
                                                 'code' => $otp
                                             ]);

    if ($verification_check->status == 'approved') {
        echo "OTP verified successfully.";
    } else {
        echo "OTP verification failed.";
    }
} catch (Exception $e) {
    echo "Error verifying OTP: " . $e->getMessage();
}
?>
