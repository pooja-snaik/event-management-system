
<?php
if (isset($_POST['user_login'])) {
    $name = $_POST['user_username'];
    $password = $_POST['user_password'];

    $select_query = "SELECT * FROM login WHERE username='$name'";
    $result = mysqli_query($con, $select_query);

    if ($result) {
        $row_count = mysqli_num_rows($result);
        if ($row_count > 0) {
            $row_data = mysqli_fetch_assoc($result);
            if (password_verify($password, $row_data['password'])) {
                $_SESSION['name'] = $name;
                echo "<script>alert('Login successful');</script>";
                echo "<script>window.open('profile.php','_self');</script>";
            } else {
                echo "<script>alert('Invalid credentials');</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials');</script>";
        }
    } else {
        echo "<script>alert('Query failed: " . mysqli_error($con) . "');</script>";
    }
}
?>


