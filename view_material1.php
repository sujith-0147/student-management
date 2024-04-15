<?php
session_start();
$host = "localhost";
error_reporting(0);
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content {
            margin-left: 25%;
            background-color: white;
        }
    </style>
</head>

<body>
    <?php
    include("teacherhome.php");
    ?>

    <div class="content">
        <h1>View Materials</h1>
        <ul style="background-color: white;">
            <?php
            $materialsFolder = "materials";
            $files = scandir($materialsFolder);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    echo "<li><a href='$materialsFolder/$file' style='color: black;'>$file</a></li>";

                }
            }
            ?>
        </ul>
    </div>
</body>

</html>
