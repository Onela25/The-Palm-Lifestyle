<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $event = htmlspecialchars(trim($_POST['event']));
    $date = htmlspecialchars(trim($_POST['date']));
    $age = htmlspecialchars(trim($_POST['age']));

    $mail = new PHPMailer(true);

    try {
   
        $mail->isSMTP();
        $mail->Host = 'masete247@gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'masete247@gmail.com'; 
        $mail->Password = 'masete247@gmail.com'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

       
        $mail->setFrom('masete247@gmail.com', 'The Palm Lifestyle');
        $mail->addAddress('masete247@gmail.com');

        
        $mail->isHTML(true);
        $mail->Subject = 'New Booking Request';
        $mail->Body = "Name: $name<br>Email: $email<br>Phone: $phone<br>Event: $event<br>Date: $date<br>Age: $age";

       
        $mail->send();
        echo "<script>alert('Booking request sent successfully!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send booking request: {$mail->ErrorInfo}');</script>";
    }
}
?>
