<?php	
require 'functionn/function.php';


if(isset($_POST["register"])){

    if(registration($_POST)>0){
        echo "<script>
        alert('user succesful added!');
        document.location.href= 'login.php';
        </script>";
        
    }else{
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="regis.css" rel="stylesheet"/>
    <title>Registration Page</title>
</head>
<body>
<div class ="table1">
    <h1>ADMIN REGISTRATION FORM</h1>

<form action="" method="post">

<label for="username">Username : </label><br>
<input type="username" name="username" id="username" required>
<br><br>

<label for="password">Password : </label><br>
<input type="password" name="password" id="password" required>
<br><br>

<label for="password2">Confirm password : </label><br>
<input type="password" name="password2" id="password2"required>
<br><br>

<button type="submit" name="register">Register</button>

</form>
<span>Have you registered? <a href="login.php" ">Login here</a></span>
<br>

</div>
</body>
<style>

@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');


body {
    background-image: url(img/login2.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    margin-top: 80px;
    padding-left: 355px;
}

div.table1{
    border: 10px white;
    border-color: black;
    width: 600px;
    length: 350px;
    padding: 15px;
    margin-left: 200px;
}
h1{
    color: white;
    font-size: 40px;
    margin-left: 40px;
    font-family: 'Concert One', cursive;
}
input{
   background: white;
   color:black;
   width: 280px;
   length: 15px;
   padding: 5px;
   font-size: 15px;
   border-radius: 10px;
}
input:hover{
        background:#F6B123;
    }
label {
    display: block;
    font-size: 18px;
    color: white;
    font-family: 'Concert One', cursive;
}
form{
    margin-left: 40px;
    
}
button{
    color: black;
    text-size: 50px;
    background: white;
    padding: 8px;
    border: white;
    border-radius: 15px;
    font-size: 17px;
    margin-top: 10px;
    font-family: 'Concert One', cursive;
}
button:hover{
    background: #F6B123;
    transform: scale(1.1);
    border: 3px white;
    color: black;
    font-family: 'Concert One', cursive;
}
span{
    margin-left: 250px;
    color: white;
    font-size: 16px;
    font-family: 'Concert One', cursive;
}
a{
    text-decoration: none;
    color: #27CFCA;
}
a:hover{
    color: #F6B123;
}
    </style>
</html>