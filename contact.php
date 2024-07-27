<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Perform basic validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
    } else {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

        if ($stmt->execute()) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
