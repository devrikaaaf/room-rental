<?php 
require 'functionn/function.php';

//retrieve data from url
$room_id= $_GET["room_id"];

//query data room base on room_id
$myroom= query("SELECT * FROM myroom WHERE room_id= '$room_id'")[0];

//button check
if(isset($_POST["submit"])){
 
//check data success to change or not
if(edit($_POST)>0){
    echo 
    "<script>
        alert('ROOM SUCCESSFULLY UPDATE!');
        document.location.href= 'room.php';
    </script>";
}else{
    echo 
    "<script>
        alert('ROOM WASN'T SUCCESSFULLY UPDATE!');
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
    <link rel="stylesheet" href="css/r_edit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
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
            <li><a href="booked_room.php">Transaction</a></li>
            <li><a href="income.php">Income</a></li>
        </ul>
    <h3 class="wave">Wave Kost <span class="desc">Comfortable housing for millennials</span>
    <span class="logout"><a href="login.php">Log Out<img src="img/logout1.png" style="width:20px; height:14px;"/></span></a></h3>
</div>

<div id="edit">
    <div id="input">
    <h1 ><img src="https://see.fontimg.com/api/renderfont4/1GMVL/eyJyIjoiZnMiLCJoIjo4MSwidyI6MTUwMCwiZnMiOjU0LCJmZ2MiOiIjRjZFQUVBIiwiYmdjIjoiI0YyRjJGMiIsInQiOjF9/RWRpdCBEYXRh/game-of-squids.png"></h1>
          <form action="" method="post">
          <ul>
           <br>
                <label for="room_id">Room Id </label>
                <input type="text" name="room_id" id="room_id" required value="<?= $myroom["room_id"]; ?>" style="margin-left: 90px;">
           
           <br><br>
                <label for="name">Room Label </label>
                <input type="text" name="room_label" id="room_label" value="<?= $myroom["room_label"]; ?>"  style="margin-left: 63px;">
           
           <br><br>
                <label for="gender">Room location </label>
                <input type="text" name="room_location" id="room_location" value="<?= $myroom["room_location"]; ?>" style="margin-left: 44px;">
           
           <br><br>
                <label for="email">Room window  </label>
                <input type="text" name="room_window" id="room_window" value="<?= $myroom["room_window"]; ?>" style="margin-left: 48px;">
           
           <br><br>
                <label for="id_card">Room monthly price  </label>
                <input type="text" name="room_monthly_price" id="room_monthly_price" value="<?= $myroom["room_monthly_price"]; ?>"style="margin-left: 2px;">
           
           <br><br>
                <label for="id_card">Room availability  </label>
                <input type="text" name="room_availability" id="room_availability" value="<?= $myroom["room_availability"]; ?>" style="margin-left: 24px;">
           
           <br><br>
                <label for="id_card">Room description </label>
                <input type="text" name="room_description" id="room_description" value="<?= $myroom["room_description"]; ?>" style="margin-left: 23px;">
           
           <br><br>
                <button type="submit" name="submit">Change data</button>
           
        </ul>

          </form>
     </div>
   
</div>
</body> 
<script>
    const toggleBtn = document.querySelector('.toggleBtn input');
    const sidebar = document.querySelector('.sidebar ul');
    const edit= document.querySelector('#edit');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('slide');
        edit.classList.toggle('move');
    });

</script>
</html>