<?php
require 'functionn/function.php';

//Collect Data from database
$result = mysqli_query ($conn, "SELECT * FROM booking");

?>

<!-- Display the data -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/booked_room.css">
    <title>Booked Room</title>
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
    <span class="logout"><a href="homepage.php">Log Out<img src="img/logout1.png" style="width:20px; height:14px;"/></span></a></h3>
</div>

<div id="content">
  <h1>BOOKED ROOM</h1>
        <a href="booking.php"><button class="button">Booking new room</button></a>
        <br>

    <table class="table" border="1" cellpadding="7" cellspacing="0">
        <tr>
          <th>Booking ID</th>
          <th>Tenant Name</th>
          <th>Room</th>
          <th>Duration</th>
          <th>Start Rent</th>
          <th>End Rent</th>
          <th>Payment</th>
        </tr>

        <!-- Looping -->
      <?php while ($row = mysqli_fetch_assoc($result)):?>
        <tr>
          <td><?= $row["book_id"];?></td>
          <td><a href="trans.php?book_id=<?= $row["book_id"];?>"><?= $row["tenant_name"];?></a></td>
          <td><?= $row["room_id"];?></td>
          <td><?= $row["duration_month"] . ' month';?></td>
          <td><?= $row["book_start_date"];?></td>
          <td><?= $row["book_end_date"];?></td>
          <td><p>Rp.<?= number_format($row["payment"]);?></p></td>
        </tr>
      <?php endwhile; ?>
    </table>
</div>

        <br><br> 

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
