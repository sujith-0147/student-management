<?php
include("adminhome.php");
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
if (isset($_POST['apply'])) {   
    $teacherName = mysqli_real_escape_string($data, $_POST['name']);
    $phoneNumber = mysqli_real_escape_string($data, $_POST['phone']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $education = mysqli_real_escape_string($data, $_POST['education']);
    $experience = mysqli_real_escape_string($data, $_POST['experience']);
    $targetDirectory = "image/"; 
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

            $query = "INSERT INTO teacher (name, phone, email, image,highest_education,experience) VALUES ('$teacherName', '$phoneNumber', '$email', '$targetFile', '$education', '$experience')";
            $result = mysqli_query($data, $query);
            $data_password="123";
            $data_year="";
            $sql="INSERT INTO user(username,Phone,email,usertype,password,Year) VALUES('$teacherName','$phoneNumber','$email','teacher','$data_password','$data_year')";
            $result1 = mysqli_query($data, $sql);
            if ($result && $result1 ) {
                echo "Teacher added successfully!";
            } else {
                echo "Error adding teacher: " . mysqli_error($data);
            }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title> 
    <link rel="stylesheet" href="admin.css">
    <style>
        .main {
            display: flex;
        }

        .main1 {
            width: 25%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <center>
            <h1>Add Teacher</h1>
            <div>
                <form action="#" method="POST" enctype="multipart/form-data"> 
                    <table>
                        <tr>
                            <th><label for="name">Teacher Name:</label></th>
                            <th><input type="text" name="name" id="name"></th>
                        </tr>
                        <tr>
                            <th><label for="phone">Number:</label></th>
                            <th><input type="text" name="phone" id="phone"></th>
                        </tr>
                        <tr>
                            <th><label for="email">Email:</label></th>
                            <th><input type="text" name="email" id="email"></th>
                        </tr>
                        <tr>
                            <th><label for="image">Image:</label></th>
                            <th><input type="file" name="image" id="image"></th>
                        </tr>
                        <tr>
                            <th><label for="education">Highest Education:</label></th>
                            <th><input type="text" name="education" id="education"></th>
                        </tr>
                        <tr>
                            <th><label for="experience">Experience:</label></th>
                            <th><input type="text" name="experience" id="experience"></th>
                        </tr>
                    </table>
                    <button type="submit" name="apply" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </center>
    </div>
</body>
</html>