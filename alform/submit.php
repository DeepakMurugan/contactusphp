<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//get data from form


$firstName = $_POST['first_name']; // Retrieve first name from the form
$lastName = $_POST['last_name']; // Retrieve last name from the form
$email = $_POST['email']; // Retrieve email from the form
$country = $_POST['country']; // Retrieve country code from the form
$countryCode = $_POST['mobileval']; //country code 


$mobile = $_POST['mobile']; // Retrieve mobile number from the form
$landline = $_POST['landline']; // Retrieve landline number from the form
$message = $_POST['message']; // Retrieve landline number from the form



// preparing mail content

// $messagecontent ="Name = ". $name . "<br>Email = " . $email . "<br>Phone = " . $phone . "<br>Company =" . $company . "<br>Message =" . $message ;

// $messagecontent ="Name = ". $name . "<br>Email = " . $email . "<br>Message =" . $message;

// Prepare mail content including the country code, first name, last name, email, mobile, and landline
// $messagecontent = "First Name: " . $firstName . "<br>Last Name: " . $lastName . "<br>Email: " . $email . "<br>Country: " . $country . "<br>Mobile: " . $mobile . "<br>Landline: " . $landline ."<br>Message:" . $message;

// Prepare mail content including the country code, first name, last name, email, mobile, and landline
$messagecontent = "First Name: " . $firstName . "<br>Last Name: " . $lastName . "<br>Email: " . $email . "<br>Country: " . $country . "<br>Mobile: " . $countryCode . " " . $mobile . "<br>Landline: " . $landline . "<br>Message: " . $message;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'neeraj.moorjani@petromin.in';                     //SMTP username
    $mail->Password   = 'mgxptbqwviyppksx';   
    $mail->SMTPSecure = 'ssl';
    //SMTP password
   // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('neeraj.moorjani@petromin.in', 'Alethia Food ');
    $mail->addAddress('deepak@bleap.in', 'Alethai '); // Add the original recipient
    $mail->addAddress('deepak@bleap.in'); // Name is optional
    $mail->addAddress('deepakm1600@gmail.com'); // Add an extra recipient
    $mail->addAddress('abishai@bleap.in'); // Add another extra recipient
    $mail->addReplyTo('deepak@bleap.in', 'Information');
    $mail->addCC('deepak@bleap.in');
    $mail->addBCC('deepak@bleap.in');




    // $mail->setFrom('neeraj.moorjani@petromin.in', 'Mailer');
    // $mail->addAddress('deepak@bleap.in', 'Dee User');     //Add a recipient
    // $mail->addAddress('deepak@bleap.in');               //Name is optional
    // $mail->addReplyTo('deepak@bleap.in', 'Information');
    // $mail->addCC('deepak@bleap.in');
    // $mail->addBCC('deepak@bleap.in');

    //Attachments

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Monarch New Form Submission ';
    $mail->Body    = $messagecontent;
    
    
     $mail->send();
     echo 'Message has been sent. We will contact you soon...';

     // Add a JavaScript script for redirection
     echo '<script>';
     echo 'setTimeout(function() {';
     echo '   window.location = "https://test.dtechcluster.com";'; // Redirect to          test.dtechcluster.com
       echo '}, 3000);'; // 5000 milliseconds (5 seconds)
     echo '</script>';

    

    




} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}