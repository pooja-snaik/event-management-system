<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'event';

// Connect to database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape input values
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

// Validation
if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
  echo "Please fill in all fields!";
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email!";
  exit;
}

if ($password != $confirm_password) {
  echo"<script>alert('Passwords do not match!')</script>";
  exit;
}
$password = 'user-input-pass';

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

$password = "YourPasswordHere"; // Replace with the actual password

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) != 8) {
    echo "<script>alert('Password should be exactly 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
}else{
    echo "<script>alert('Strong password.')</script>";
}


// Check if username already exists
$query = "SELECT * FROM signup WHERE username='$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
 echo "<script>alert('Username already exists!')</script>";
  exit;
}

// Password hashing
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// Insert new user into database
$query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password_hash')";
if (mysqli_query($conn, $query)) {
    // Redirect to home page
    header("Location:index.html");
    exit;
  } else {
    echo "Error: " . mysqli_error($conn);
  }


?>


   