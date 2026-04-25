<?php

require 'functionn/function.php';

$conn = mysqli_connect("localhost", "root", "", "room");

$myroom = mysqli_query($conn, "SELECT*FROM myroom");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>Dashboard</title>
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
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="room.php">Room</a></li>
            <li><a href="tenant.php">Tenants</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="booked_room.php">Transaction</a></li>
            <li><a href="income.php">Income</a></li>
        </ul>
        <h3 class="wave">Wave Kost <span class="desc">Comfortable housing for millennials</span>
            <span class="logout"><a href="login.php">Log Out</span></a>
        </h3>
    </div>

    <h1 id="admin">  <i class="bi bi-house-door-fill"></i>   Dashboard</h1>


    <div class="container">
            <!-- Active Tenants -->
                <div class="card" id="card1">
                    <div class="card-body">

                        <!-- Count Active Tenants -->
                        <?php
                        $tenant = mysqli_query($conn, "SELECT COUNT(*) as total FROM tenant WHERE status ='Active' ");
                        $tenant_row = mysqli_fetch_array($tenant);
                        ?>
                        
                        <h5 class="card-title">Active</h5>
                        <p class="card-text"> <i class="bi bi-person-check-fill"></i>  <?= $tenant_row['total'] ?></p>
                        
                    </div>
                </div>

                <!-- Moving Out Tenants -->
                <div class="card" id="card2">

                    <!-- Count Moving Out tenants -->
                    <?php
                    $tenant1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM tenant WHERE status ='Moving Out' ");
                    $tenant_row1 = mysqli_fetch_array($tenant1);
                    ?>
                    <div class="card-body">
                        <h5 class="card-title">Moving Out</h5>
                        <p class="card-text"> <i class="bi bi-person-fill-slash"></i>  <?= $tenant_row1['total'] ?></p>
                    </div>
                </div>

                <!-- Total Tenants -->
                <div class="card" id="card3">

                    <!-- Count All tenants -->
                    <?php
                    $tenant2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM tenant");
                    $tenant_row2 = mysqli_fetch_array($tenant2);
                    ?>
                    <div class="card-body">
                        <h5 class="card-title">Total Tenants</h5>
                        <p class="card-text"> <i class="bi bi-people-fill"></i>  <?= $tenant_row2['total'] ?></p>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="card" id="card4">

                    <!-- Count All revenue -->
                    <?php
                        //Query data from table income
                        $query= mysqli_query($conn, "SELECT SUM(monthly_price) AS total_income FROM income");
                        $revenue = mysqli_fetch_array($query);
            
                    ?>
                    <div class="card-body">
                        <h5 class="card-title">Total Revenue</h5>
                        <p class="card-text"> <i class="bi bi-wallet-fill"></i>  Rp<?= number_format($revenue["total_income"]); ?></p>
                    </div>
                </div>
        </div>
        <br>


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
       
    </tr>
</div>
    <?php $i = 1; 	 ?>
    <?php 
    $check = mysqli_query($conn, "SELECT * FROM myroom WHERE room_availability = 'Available'");
    
    foreach($check as $row) : ?>
    <tr class="tb">
       <td><?= $row["room_id"]; ?></td>
       <td><?= $row["room_label"]; ?></td>
       <td><?= $row["room_location"]; ?></td>
       <td><?= $row["room_window"]; ?></td>
       <td><?= $row["room_monthly_price"]; ?></td>
       <td><?= $row["room_availability"]; ?></td>
       <td><?= $row["room_description"]; ?></td>
       

    </tr>
    <?php	endforeach; ?>
    
</table>
</body>
<script>
    //    Toggle for sidebar and the animation
    const toggleBtn = document.querySelector('.toggleBtn input');
    const sidebar = document.querySelector('.sidebar ul');
    const main = document.querySelector('#main table');
    const container = document.querySelector('.container');
    const admin = document.querySelector('#admin');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('slide');
        main.classList.toggle('move');
        container.classList.toggle('move1');
        admin.classList.toggle('move2');
    });

</script>

</html>