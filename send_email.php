<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event = $_POST['event'];
    $date = $_POST['date'];
    $age = $_POST['age'];

    $to = "masethe247@gmail.com";
    $subject = "New Booking Request";
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nEvent: $event\nDate: $date\nAge: $age";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Booking request sent successfully!";
    } else {
        error_log("Failed to send booking request.",0) ;
        echo "Failed to send booking request.";
    }
}
?>
