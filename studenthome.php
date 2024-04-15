<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "User is logged in: " . $_SESSION['username'];

} else {
    echo "User is not logged in.";
    header("location:login.php");
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
    <header class="header">
        <a href="" class="btn btn-primary">Student Dashboard</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">logout</a>
        </div>
    </header>
    <aside>
        <ul>
        <li>
        <a class="lin" href="update1.php">Update Details</a>
            </li>
            <!-- <li> -->
                <!-- <a class="lin" href="">My Courses</a> -->
            <!-- </li> -->
            <li>
                <a class="lin" href="add_material.php">Add Materials</a>
            </li>
            <li>
                <a class="lin" href="view_material.php">View materials</a>
            </li>
            <li>
                <a class="lin" href="">Result</a>
            </li>
        </ul>
    </aside>
</body>
</html>