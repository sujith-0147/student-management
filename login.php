<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px 0;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .mid {
            margin-top: 20px;
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .warning {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="login_check.php" method="POST">
        <h2>USER LOGIN</h2>
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" id="name" name="username" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" id="pass" name="password"></td>
            </tr>
        </table>
        <div class="mid">
            <button type="submit" class="btn">LOGIN</button>
            <a href="password.php">Forgotten Password</a>
        </div>
    </form>
    <div class="warning">
        <?php
        error_reporting(0);
        session_start();
        session_destroy();
        echo $_SESSION['warning'];
        ?>
    </div>
</body>
</html>
