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
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}
$sql="SELECT * FROM teacher";
$result=mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admmin pannel</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        .teacher
        {
            width: 100px;
        }
        .main
        {
            display: flex;
        }
        .main1
        {
            width: 25%;
        }
        table
        {
            border: 1px solid black;
        }
        th{
            padding: 20px;
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <h1>Teacher data</h1>
        <table class="table">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Highest Education</th>
      <th scope="col">Experience</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
      <!-- <th scope="col">Update</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row=$result->fetch_assoc()) {
        
    ?>
    <tr>
      <th scope="row">
      <?php echo $row["id"];
        ?>
      </th>
      <td>
      <?php echo $row["name"];
        ?>
        </td>
      <td>
      <?php echo $row["phone"];
        ?>
      </td>
      <td>
      <?php echo $row["email"];
        ?>
      </td>
      <td>
      <?php echo $row["highest_education"];
        ?>
      </td>
      <td>
      <?php echo $row["experience"];
        ?>
      </td>
      </td>
      <td>
    <img class="teacher" src="<?php echo $row['image']; ?>">
</td>

      <td>
      <?php 
      echo "<a onclick=\"javascript:return confirm('Are you sure you wana delete this');\" href='delete1.php?student_id={$row["id"]}'>Delete</a>";
        ?>
      </td>
     
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    </div>
  </div>
</body>
</html>