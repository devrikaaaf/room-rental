<?php 
require 'functionn/function.php';
    //button check
    if(isset($_POST["submit"])){
 
//check data success to add or not
if(add($_POST)>0){
    echo 
    "<script>
        alert('ROOM SUCCESSFULLY ADDED!');
        document.location.href= 'room.php';
    </script>";
}else{
    echo 
    "<script>
        alert('ROOM FAIL TO ADDED!');
        document.location.href= 'room.php';
    </script>";
}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/r_add.css" />
    

    <title>Add new room</title>
</head>
<body>
<div class="sidebar">
        <div class="toggleBtn">
            <input type="checkbox" />
            <span> </span>
            <span> </span>
            <span> </span>
        </div>
        <span></span>
        <ul>
            <li class="menu-title">MENU</li>
            <li><a href="login.php">Home</a></li>
            <li><a href="room.php">Room</a></li>
            <li><a href="tenant.php">Tenants</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="trans.php">Transaction</a></li>
            <li><a href="income.php">Income</a></li>
        </ul>
    <h3 class="wave">Wave Kost <span class="desc">Comfortable housing for millennials</span>
    <span class="logout"><a href="login.php">Log Out<img src="img/logout1.png" style="width:20px; height:14px;"/></span></a></h3>
</div>

<div id="addRoom">
    <div id="input">
    <h1 ><img src="https://see.fontimg.com/api/renderfont4/1GMVL/eyJyIjoiZnMiLCJoIjoxMjAsInciOjE1MDAsImZzIjo4MCwiZmdjIjoiI0ZGRkZGRiIsImJnYyI6IiNGMkYyRjIiLCJ0IjoxfQ/YWRkIG5ldyByb29t/game-of-squids.png"></h1>
          <form action="" method="post">
          <ul >
               <br>
                    <label for="room_id">Room Id  </label>
                    <input type="text" name="room_id" id="room_id" style="margin-left: 110px;" required >
               <br><br>
                    <label for="room_label">Room Label   </label>
                    <input type="text" name="room_label" id="room_label" style="margin-left: 82px;">
               <br><br>
                    <label for="room_location">Room location  </label>
                    <input type="text" name="room_location" id="room_location" style="margin-left: 64px;">
               <br><br>
                    <label for="room_window">Room window </label>
                    <input type="text" name="room_window" id="room_window" style="margin-left: 66px;">
               <br><br>
                    <label for="room_monthly_price">Room monthly price  </label>
                    <input type="text" name="room_monthly_price" id="room_monthly_price" style="margin-left: 20px;">
               <br><br>
                    <label for="room_availability">Room availability  </label>
                    <input type="text" name="room_availability" id="room_availability"  style="margin-left: 42px;">
               <br><br>
                    <label for="room_description">Room description </label>
                    <input type="text" name="room_description" id="room_description" style="margin-left: 40px;">
               <br><br><br>
                    <button type="submit" name="submit">Add data</button>
          </ul>
          </form>
     </div>
</div>
</body> 

<script>
    const toggleBtn = document.querySelector('.toggleBtn input');
    const sidebar = document.querySelector('.sidebar ul');
    const addRoom= document.querySelector('#addRoom');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('slide');
        addRoom.classList.toggle('move');
    });

</script>
</html>