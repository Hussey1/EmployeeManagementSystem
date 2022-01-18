<?php
require('config.php');
require('./twilio-php-main/src/Twilio/autoload.php');
use Twilio\Rest\Client;

if(isset($_GET['eid'])){
    $employeeID=$_GET['eid'];
    $sql = "SELECT * FROM `profile` WHERE `empID`='$employeeID'";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
                $name=$row['nickname'];
                $id=$row['empID'];
                $passcode=$row['tempPass'];
                $mobilenum="+94".substr($row['contactnum'],1);

            // Your Account SID and Auth Token from twilio.com/console
                $sid = 'ACf06868ad95b8f95849601425e97f8198';
                $token = '164ff5f4991d4177606ee8d8353bf210';
                $client = new Client($sid, $token);
                $message='Hi ! '.$name.'. Please visit https://www.massivedynamics100.online/activate.php to activate your account. your passcode is '.$passcode;

                // Use the client to do fun stuff like send text messages!
                $client->messages->create(
                // the number you'd like to send the message to
                $mobilenum,
                [
                    // A Twilio phone number you purchased at twilio.com/console
                'from' => '+13343453283',
                    // the body of the text message you'd like to send
                'body' => $message
                    ]
                );

                $sql2="UPDATE `profile` SET `status`='Inactive | Sent' WHERE `empID`='$employeeID'";
                $result2 = mysqli_query($conn, $sql2);


        }
        header('Location:verification.php');

    }

}










 ?>