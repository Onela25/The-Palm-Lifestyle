<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $event = htmlspecialchars(trim($_POST['event']));
    $date = htmlspecialchars(trim($_POST['date']));
    $age = htmlspecialchars(trim($_POST['age']));

    
    if (empty($name) || empty($email)) {
        echo "<script>alert('Name and email are required.'); window.history.back();</script>";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com';
        $mail->Password = 'your-app-password'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

       
        $mail->setFrom($email, $name); 
        $mail->addAddress('masete247@gmail.com', 'The Palm Lifestyle'); 

        
        $mail->isHTML(true);
        $mail->Subject = 'New Booking Request';
        $mail->Body = "
            <h3>New Booking Request</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Event:</strong> $event</p>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Age:</strong> $age</p>
        ";

        
        $mail->send();
        echo "<script>alert('Booking request sent successfully!'); window.location.href='thank_you.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send booking request: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
}
?>
