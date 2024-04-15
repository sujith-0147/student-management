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
    <style>
        .content
        {
            margin-left: 25%;
        }
    </style>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header class="header">
        <a href="" class="btn btn-primary">Admin Dashboard</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">logout</a>
        </div>
    </header>
    <aside>
        <ul>
            <li>
                <a class="lin" href="admission.php">Admission</a>
            </li>
            <li>
                <a class="lin" href="add_student.php">Add Student</a>
            </li>
            <li>
                <a class="lin" href="view_student.php">View Student</a>
            </li>
            <li>
                <a class="lin" href="admin_add_teacher.php">Add Teacher</a>
            </li>
            <li>
                <a class="lin" href="admin_view_teacher.php">View Teacher</a>
            </li>
            <!-- <li> -->
                <!-- <a class="lin" href="">Add Courses</a> -->
            <!-- </li> -->
            <!-- <li> -->
                <!-- <a class="lin" href="">View courses</a> -->
            <!-- </li> -->
        </ul>
    </aside>
</body>
</html>