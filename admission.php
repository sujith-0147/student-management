<?php
include("adminhome.php");
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
$sql="SELECT * FROM admission";
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
        <h1>student data</h1>
        <table class="table">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">Roll No</th>
      <th scope="col">Name</th>
      <th scope="col">Course</th>
      <!-- <th scope="col">Delete</th> -->
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
      <?php echo $row["Roll"];
        ?>
        </td>
      <td>
      <?php echo $row["Name"];
        ?>
      </td>
      <td>
      <?php echo $row["Course"];
        ?>
      </td>
      <td>
  
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    </div></div>
</body>
</html>