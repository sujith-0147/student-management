<?php
include("adminhome.php");
?>
<?php
// session_start();
if (isset($_SESSION['username'])) {
    echo "User is logged in: " . $_SESSION['username'];

} else {
    echo "User is not logged in.";
    header("location:login.php");
}
?>
<?php

// session_start();
$host="localhost";

error_reporting(0);

$user="root";

$password="";

$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}
if(isset($_POST['apply']))
{
    // $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    // $data_message=$_POST['message'];
    $data_rollno=$_POST['rollno'];
    $data_year=$_POST['year'];
    $data_password=$_POST['password'];
    
    $sql="INSERT INTO user(username,Phone,email,usertype,password,Year) VALUES('$data_rollno','$data_phone','$data_email','student','$data_password','$data_year')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="your application sent successful";
        if($_SESSION['message'])
{
$message=$_SESSION['message'];

echo "<script type='text/javascript'>
    
alert('$message');

</script>";
}
        header("location:add_student.php");
    }
    else
    {
        echo "Apply failed";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admmin pannel</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
   
    <div class="content">
        <h1>add student</h1>
        <div>
            <form action="add_student.php" method="POST">
                <div class="one"><label for="">Roll NO</label>
                <input type="text" name="rollno"></div>
                <div class="one"><label for="">year</label>
                <input type="number" name="year" min="1" max="4"></div>
                <div class="one"><label for="">email</label>
                <input type="email" name="email"></div>
                <div class="one"><label for="">Phone</label>
                <input type="tel" name="phone"></div>
                <div class="one"><label for="">Password</label>
                <input type="password" name="password"></div>
                <button type="submit" name="apply">SUBMIT</button>
            </form>
        </div>
    </div></div>
</body>
</html>