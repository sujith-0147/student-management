<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="reset.php" method="post">
        <label for="password">New Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: password.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $email = $_SESSION["email"];

    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "schoolproject";

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET password='$hashed_password' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully.";
    } else {
        echo "Failed to update password.";
    }

    $conn->close();
    session_unset();
    session_destroy();
}
?>
