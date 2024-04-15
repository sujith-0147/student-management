<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .valid {
            color: green;
          }
          
          .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
          }
          .invalid {
            color: red;
          }
          
          .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
          }
        body
        {
            display: flex;
justify-content: center;
align-items: center;
text-align: center;
            background: linear-gradient(90deg, #2146d8, #9951f3ee, rgba(255,143,245,0.87));
        }
        body, html {
            height: 100%;
            margin: 0;
        }
        button 
        {
            margin: 25px;
            background: linear-gradient(90deg, #2146d8, #9951f3ee, rgba(255,143,245,0.87));
            color: white;
            width: 100px;
            border-radius: 25px;
        }
        table
        {
            margin-left: auto;
            margin-right:auto;
        }
        #requirements
        {
            display: none;
        }
        .main 
        {
            width: 75%;
           
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75%;
        }
        .two
        {
            width: 50%;
            background-color: white;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .one 
        {
            height: 100%;
            width: 50%;
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            text-align: center;
            background-size: cover;
            background: linear-gradient(90deg, #2146d8, #9951f3ee, rgba(255,143,245,0.87));
        }
        input
        {
            border-radius: 25px;
            background-color: whitesmoke;
        }
        td
        {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bolder;
        }
        h1
        {
            color: white;
        }
    </style>
</head>
<body>
<h3>
        <?php
        error_reporting(0);
        echo $_SESSION['warning'];
        ?>
        </h3>
    <div class="main">
        <div class="one" id="one">
            <h1>Welcome to website</h1>
            <br>They graduated in 2005 and did not have much contact until July 2009, after Ms. Wallace had left her cellphone in a taxi in San Francisco and posted a status update on Facebook".Hey, I lost my cellphone," she recalled saying on the update .Everyone please send me your contact information"</div>
        <div class="two">
       <!-- <form onsubmit="return f3()" action="login_check.php" method="POST"> -->
       <form action="login_check.php" method="POST">
        <caption><h2>USER LOGIN</h2></caption>
   
        <table>
            
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="text" id="name" name="username"  autocomplete="off">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" id="email" name="email"  autocomplete="off"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" id="pass" onfocus="f1()" name="password" onfocusout="f2()" id="password"></td>
            </tr>
        </table>
        <div class="mid">
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </div>
       </form>
    </div>
    </div>
    <div id="requirements"><h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p></div>
    <script>
        document.addEventListener('contextmenu', event => {
            event.preventDefault();
        });
        let one=document.getElementById("one");
        let myInput=document.getElementById("pass");
        let lett=document.getElementById("letter");
        let cap=document.getElementById("capital");
        let num=document.getElementById("number");
        let leng=document.getElementById("length");
        function f2()
        {
            document.getElementById("requirements").style.display="none";
            one.style.display="flex";
        }
        function f1()
        {
            document.getElementById("requirements").style.display="block";
            one.style.display="none";
        }
        function f3() {
            let name = document.getElementById("name");
            let email = document.getElementById("email");
            let pass = document.getElementById("pass"); 
            let phn = document.getElementById("phn");
        
            if (name.value === '' || email.value === '' || pass.value === '' || phn.value === '') {
                alert("Please fill in all fields.");
                return false;
            }
        }
        myInput.onkeyup = function(){
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {  
              lett.classList.remove("invalid");
              lett.classList.add("valid");
            } else {
              lett.classList.remove("valid");
              lett.classList.add("invalid");
            }
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {  
              cap.classList.remove("invalid");
              cap.classList.add("valid");
            } else {
              cap.classList.remove("valid");
              cap.classList.add("invalid");
            }
            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {  
              num.classList.remove("invalid");
              num.classList.add("valid");
            } else {
              num.classList.remove("valid");
              num.classList.add("invalid");
            }
            if(myInput.value.length >= 8) {
              leng.classList.remove("invalid");
              leng.classList.add("valid");
            } else {
              leng.classList.remove("valid");
              leng.classList.add("invalid");
            }
        }
    </script>
</body>
</html>