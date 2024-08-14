<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['username'] = $user;
            $_SESSION['role'] = $row['role'];
            if ($row['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: welcome.php");
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
$conn->close();
?>
