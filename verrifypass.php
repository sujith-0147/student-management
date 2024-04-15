<?php
session_start();

if (!isset($_SESSION["otp"]) || !isset($_SESSION["email"])) {
header("Location: password.php"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST["otp"];
    $email = $_SESSION["email"];
    $otp = $_SESSION["otp"];

    if ($entered_otp == $otp) { 
        header("Location: reset.php");
        
        exit();
    } else {
        echo "Invalid OTP.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>
    <h2>Verify OTP</h2>
    <form action="verrifypass.php" method="post">
        <label for="otp">Enter OTP:</label><br>
        <input type="text" id="otp" name="otp" required><br><br>
        <input type="submit" value="Verify">
    </form>
</body>
</html>
