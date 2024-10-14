<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $event = htmlspecialchars(trim($_POST['event']));
    $date = htmlspecialchars(trim($_POST['date']));
    $age = htmlspecialchars(trim($_POST['age']));

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); 
        $mail->Host = 'smtp.example.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'your-email@example.com'; 
        $mail->Password = 'your-email-password'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; 

        //Recipients
        $mail->setFrom('your-email@example.com', 'Your Name'); 
        $mail->addAddress('masete247@gmail.com'); 

        // Content
        $mail->isHTML(true); 
        $mail->Subject = 'New Booking Request';
        $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>Event: $event<br>Date: $date<br>Age: $age";

        // Send the email
        $mail->send();
        echo "<script>alert('Booking request sent successfully!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send booking request: {$mail->ErrorInfo}');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now Form</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
    <button class="book-now" onclick="openForm()">Book Now</button>
    <div class="form-popup" id="bookingForm" style="display: none;"> 
        <form action="booking.php" method="POST" class="form-container">
            <h2>Booking Form</h2>
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Your Name" name="name" required>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Your Email" name="email" required>
            <label for="phone"><b>Phone</b></label>
            <input type="tel" placeholder="Enter Your Phone Number" name="phone" required>
            <label for="event"><b>Event Type</b></label>
            <select name="event" required>
                <option value="birthday">Birthday</option>
                <option value="baby_shower">Baby Shower</option>
                <option value="game_night">Game Night</option>
                <option value="other">Other</option>
            </select>
            <label for="date"><b>Date</b></label>
            <input type="date" name="date" required>
            <label for="age"><b>Age</b></label>
            <input type="number" placeholder="Enter Your Age" name="age" min="18" required>
            <button type="submit" class="btn">Submit</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    <script>
        function openForm() {
            document.getElementById("bookingForm").style.display = "block";
        }
        function closeForm() {
            document.getElementById("bookingForm").style.display = "none";
        }
    </script>
</body>
</html>
