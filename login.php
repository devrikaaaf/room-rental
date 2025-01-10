<?php	
require 'functionn/function.php';

    if(isset($_POST["login"])){

      $username= $_POST["username"];
      $password= $_POST["password"];

      $result= mysqli_query($conn, "SELECT*FROM myadmin WHERE username= '$username'");

      //check username
      if(mysqli_num_rows($result)===1){
          //check password
          $row= mysqli_fetch_assoc($result);
         if(password_verify($password, $row["password"])){
             header("Location: room.php");
             exit;
         }
      }

      $error= true;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1 style="color: white">LOGIN PAGE</h1>

<?php	if(isset($error)) :?>
    <p style="color: #ff006e; font-style:italic">Username or password is wrong</p>
    <?php	endif; ?>
    <form action="" method="post">
        <label for="username">Username :</label>
        <input type="username" name="username" id="username" required>
        <br><br>

        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required>
        <br><br>

        <button type="submit" name="login">Login</button>

    </form>
    <span>Not yet register? <a href="regis.php" ">click here </a></span>
</body>
<style>
   
   @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

   body{
    background-image: url(img/login2.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    margin-top: 60px;
    padding-left: 355px;
    padding-top: 50px;
    font-family: 'Concert One', cursive;
    }
    h1{
        font-size: 40px;
        margin-top: 10px;
        margin-left: 300px;
    }
    form{
        margin-left: 286px;
        padding: 10px;
    }
    label{
        color: white;
        font-size: 20px;
        display: block;
        padding: 6px;
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
        background: #F6B123;
    }
    button{
        color: black;
        background: white;
        padding: 10px;
        border: black;
        border-radius: 25px;
        font-size: 18px;
        margin-left: 240px;
        margin-top: 10px;
        font-family: 'Concert One', cursive;
    }
    button:hover{
        color:#3B200A ;
        background: #F6B123;
        transform: scale(1.1);
        font-family: 'Concert One', cursive;
    }
    p{
        margin-left: 300px;
        font-size: 15px;
    }
    span{
    float: left;
    margin-left: 306px;
    color: white;
    font-size: 15px;
    }
    a{
    text-decoration: none;
    color: #27CFCA;
    }
    a:hover{
    color:#FABA21;
    }   

</style>
</html>