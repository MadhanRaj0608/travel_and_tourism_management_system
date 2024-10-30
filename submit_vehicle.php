<?php
$conn = new mysqli("localhost", "root", "", "travel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_name = $_POST['user-name'];
$user_email = $_POST['user-email'];
$user_phone = $_POST['user-phone'];
$vehicle_type = $_POST['vehicle-type'];
$pick_up_date = $_POST['pick-up-date'];
$drop_off_date = $_POST['drop-off-date'];

$sql = "INSERT INTO vehicle_bookings (user_name, user_email, user_phone, vehicle_type, pick_up_date, drop_off_date) 
        VALUES ('$user_name', '$user_email', '$user_phone', '$vehicle_type', '$pick_up_date', '$drop_off_date')";

if ($conn->query($sql) === TRUE) {
    // Display user details and message with animation
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Booking Confirmation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                opacity: 0;
                animation: fadeIn 1s forwards;
            }
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            h2 {
                color: #2980b9;
                margin-bottom: 20px;
                text-align: center;
                animation: slideIn 0.5s ease-out forwards;
            }
            @keyframes slideIn {
                from { transform: translateY(-20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }
            p {
                margin: 5px 0;
                font-size: 1.1em;
            }
            .details {
                border: 1px solid #2980b9;
                padding: 15px;
                border-radius: 5px;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s;
                transform: scale(0);
                animation: scaleIn 0.5s forwards;
            }
            @keyframes scaleIn {
                from { transform: scale(0); }
                to { transform: scale(1); }
            }
            .footer-message {
                margin-top: 20px;
                font-size: 1.2em;
                color: #2c3e50;
                text-align: center;
                opacity: 0;
                animation: fadeIn 1s forwards;
                animation-delay: 1.2s; /* Delay for the footer message */
            }
        </style>
    </head>
    <body>
        <div>
            <h2>Your Booking Details</h2>
            <div class='details'>
                <p><strong>Name:</strong> $user_name</p>
                <p><strong>Email:</strong> $user_email</p>
                <p><strong>Phone Number:</strong> $user_phone</p>
                <p><strong>Vehicle Type:</strong> $vehicle_type</p>
                <p><strong>Pick-Up Date:</strong> $pick_up_date</p>
                <p><strong>Drop-Off Date:</strong> $drop_off_date</p>
            </div>
            <div class='footer-message'>
                <p>This is your details. Your booking is under process, and we will contact you soon through email or phone.</p>
            </div>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
