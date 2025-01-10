<?php
require 'functionn/function.php';

$month = mysqli_query($conn, "SELECT DISTINCT trans_month FROM income ORDER BY trans_month");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/income.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INCOME</title>
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
   
<div id="all">
    <h1>INCOME</h1>
<div id="mon">
    <form action= "" method="POST">
        <tr>
            <td>Select month : </td>
                <td><select name="month">
                <?php
                $i = 0;
                while($qrow= mysqli_fetch_array($month)) {
                ?>
                <option value="<?=$qrow['trans_month'];?>"><?=$qrow['trans_month'];?></option>
                <?php
                $i++;
                }
                ?>
        </tr>
                </select>
            </td>
        
    <input type="submit" value="Get Data" name="submit">
</form>
</div><br>

<div id="main">
<table border="1">
    <thead>
            <th>Transaction ID</th>
            <th>Transaction Date</th>
            <th>Price</th>
    </thead>
    <tbody>
        
    <?php
     if (isset($_POST['submit'])){
        $month= $_POST['month'];

        //Query data from table income
        $query= mysqli_query($conn, "SELECT*FROM income WHERE trans_month= '$month'");
        //To count the income
        $in= 0;
      
            while($sque= mysqli_fetch_assoc($query)){
                //Count the total income in a month
                $in+= $sque['monthly_price'];

    ?>
            <tr>
                <td><?= $sque["trans_id"] ;?></td>
                <td><?= $sque["trans_date"]; ?></td>
                <td><p>Rp.<?= number_format($sque["monthly_price"]); ?></p></td>
            </tr> 
           
            <?php  } ?>

            <?php 
                $mth = mysqli_query($conn, "SELECT trans_month FROM income");
                $trow= mysqli_fetch_array($mth);
            ?>
            <tr>
            <td><strong>Total Income in <?= $trow['trans_month']?></strong></td> 
            <td></td>
            <td><?= 'Rp.' . number_format($in) ?></td>
            </tr>
            <?php  } ?> 
           
            
        </tbody>
        
    </table>
        
</div>
</div></br>

</body>
<style>
body {
        margin: 0;
        padding: 0;
        font-family: 'Quicksand', sans-serif;
        font-size: 14px;
        background-image: url(img/coin.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
<script>
    const toggleBtn = document.querySelector('.toggleBtn input');
    const sidebar = document.querySelector('.sidebar ul');
    const all= document.querySelector('#all');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('slide');
        all.classList.toggle('move');
    });

</script>
</html>
