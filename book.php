<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $event = htmlspecialchars(trim($_POST['event']));
    $date = htmlspecialchars(trim($_POST['date']));
    $age = htmlspecialchars(trim($_POST['age']));

  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $to = "masethe247@gmail.com";
    $subject = "New Booking Request";
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nEvent: $event\nDate: $date\nAge: $age";
    $headers = "From: $email\r\n"; 

   
    if (mail($to, $subject, $message, $headers)) {
        echo "Booking request sent successfully!";
    } else {
        error_log("Failed to send booking request.", 0);
        echo "Failed to send booking request.";
    }
}
?>
