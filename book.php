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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $event_type = $_POST['event_type'];
    $wedding_option = $_POST['wedding_option'] ?? '';
    $food_option = $_POST['food_option'];
    $decoration_option = $_POST['decoration_option'];
    $Brange = $_POST['Brange'];
    $date = $_POST['date'];

    // Perform basic validation
   // if (true) {
       // echo "Please fill in all required fields.";
    //} else {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO booking (first_name, last_name, email, phone_number, event_type, wedding_option, food_option, decoration_option, Brange, bdate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssssssssss", $first_name, $last_name, $email, $phone_number, $event_type, $wedding_option, $food_option, $decoration_option, $Brange, $date);

        if ($stmt->execute()) {
            echo "Thank you for Booking,CONTACT YOU SOON!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
//}

$conn->close();
?>
