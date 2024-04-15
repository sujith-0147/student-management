<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="password.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "schoolproject";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    
    $sql = "SELECT * FROM user WHERE email='$email'";
    // echo"$sql";
    $result = $conn->query($sql);
    // echo"$result";

    if ($result->num_rows != 0) {
        $otp = generateOTP(); 
        if (sendOTP($email, $otp)) { 
            session_start();
            $_SESSION["otp"] = $otp;
            $_SESSION["email"] = $email;
            header("Location: verrifypass.php"); 
            exit();
        } 
        else {
            echo "Failed to send OTP.";
        }
    }
     else {
        echo "Email not found.";
    }
}


function generateOTP($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}


function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'sujithrama147@gmail.com'; 
        $mail->Password = 'tbnd ukjo gsnu aoet'; 
        $mail->SMTPSecure = 'tls';
        // $mail->CharSet = 'UTF-8';
        // $mail->SMTPDebug = 2; 
        $mail->Port = 587;
        

        $mail->setFrom('sujithrama147@gmail.com'); 
        $mail->AddAddress($_POST["email"]); 
        $mail->isHTML(true);
        $mail->Subject = "OTP Verification";
        $mail->Body = "Your OTP is: $otp";

        $mail->send();
        return true;
    } catch (Exception $e) {

        return false;
    }
}

$conn->close();
?>
