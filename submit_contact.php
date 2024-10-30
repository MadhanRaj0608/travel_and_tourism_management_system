<?php
$conn = new mysqli("localhost", "root", "", "travel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into contact_messages table
$sql = "INSERT INTO contact_messages (name, email, message) 
        VALUES ('$name', '$email', '$message')";

// Execute the query and check for success
if ($conn->query($sql) === TRUE) {
    // Redirect to the success page
    header("Location: contact_success.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
