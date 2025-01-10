<?php	
require 'functionn/function.php';

    $conn= mysqli_connect("localhost", "root", "", "room");

    $myroom= mysqli_query($conn, "SELECT*FROM myroom");


    //search button 
    if (isset($_POST["search"])){
        $myroom= search($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/room.css" />
    
    <title>Room Info</title>  
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
            <li><a href="payment.php">Payment</a></li>
            <li><a href="booked_room.php">Transaction</a></li>
            <li><a href="income.php">Income</a></li>
        </ul>
    <h3 class="wave">Wave Kost <span class="desc">Comfortable housing for millennials</span>
    <span class="logout"><a href="login.php">Log Out<img src="img/logout1.png" style="width:20px; height:14px;"/></span></a></h3>
</div>
    <h1 id="roomInfo">ROOM INFORMATION</h1>
   <br>

<div id="search-add" > 
    <form action="" method="POST">
    <input type="text" class="keyword" name="keyword" placeholder="Type the keyword..."  autofocus >
    <button class="search" type="submit" name="search">Search</button>
   <button class="add"><a href="r_add.php" target="_blank">+ Add new room</a></button></form>
</div>

<div id="main">

<br>
     <table border="1" cellspacing="0" cellpadding="8" class="table">
    <tr class="tb-head">
       <th>Room Id</th>
       <th>Room Label</th>
       <th>Room Location</th>
       <th>Room Window</th>
       <th>Room Monthly price</th>
       <th>Room Availability</th>
       <th>Room Description</th>
       <th>Action</th>
    </tr>
</div>
    <?php $i = 1; 	 ?>
    <?php foreach($myroom as $row) : ?>
    <tr class="tb">
       <td><?= $row["room_id"]; ?></td>
       <td><?= $row["room_label"]; ?></td>
       <td><?= $row["room_location"]; ?></td>
       <td><?= $row["room_window"]; ?></td>
       <td><?= $row["room_monthly_price"]; ?></td>
       <td><?= $row["room_availability"]; ?></td>
       <td><?= $row["room_description"]; ?></td>
       <td class="action">
          <a href="r_edit.php?room_id=<?= $row["room_id"];?>"><button class="edit">Edit</button></a>
          <a href="r_delete.php?room_id=<?= $row["room_id"]; ?>" onclick="return confirm('Delete this room?')"><button class="delete">Delete</button></a>
       </td>

    </tr>
    <?php	endforeach; ?>
    
</table>
</body>
<script>
    const toggleBtn = document.querySelector('.toggleBtn input');
    const sidebar = document.querySelector('.sidebar ul');
    const main= document.querySelector('#main table');
    const search= document.querySelector('#search-add form');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('slide');
        main.classList.toggle('move');
        search.classList.toggle('move1');
    });

</script>

</html>