<?php
require 'functionn/function.php';

//Retrieve data from url
$book_id= $_GET["book_id"];

?>


<!-- Display the data -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/trans.css">
    <title>Transaction--Info</title>
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
 <h1>TRANSACTION</h1>
<?php

    //Query the data from database
    $result = mysqli_query ($conn, "SELECT *
                                    FROM trans a, booking b, tenant c
                                    WHERE b.book_id='$_GET[book_id]'AND a.tenant_name = b.tenant_name AND b.tenant_name=c.tenant_name ");
    
    $row = mysqli_fetch_assoc($result);
?>

<!-- Display the data -->
<div id="tenant-info">
      <div class="frame">
        <div class="tenant-main">
        <h3>Tenants Information</h3>
            <table >
                <tr>
                    <td>Booking ID </td>
                    <td><?= ':' . ' ' . $row['book_id'] ?></td>
                </tr>
                <tr>
                    <td>Tenant Name </td>
                    <td><?= ':' . ' ' . $row['tenant_name'] ?></td>
                </tr>
                <tr>
                    <td>Address </td>
                    <td><?= ':' . ' ' . $row['tenant_address'] ?></td>
                </tr>
                <tr>
                    <td>Phone  </td>
                    <td><?= ':' . ' ' . $row['tenant_phone'] ?></td>
                </tr>
                <tr>
                    <td>Bank Account  </td>
                    <td><?= ':' . ' ' . $row['tenant_bankaccount'] ?></td>
                </tr>
                <tr>
                    <td>Bank Account Number  </td>
                    <td><?= ':' . ' ' . $row['tenant_bankaccount_no'] ?></td>
                </tr>
            </table>
        </div>

        <a href="tn_upstatus.php?room_id=<?= $row['room_id']?>"><button class="moving">Moving Out</button></a>
</div>
        <br><br>
    
    <div class="content">
           <h3>Tenant Transaction</h3><a href="invoice/invoice.php?book_id=<?=$row['book_id'] ?>" target="_blank"><button class="invoice">Download Invoice</button></a>

       <br><br>
            <table class="table" border="1" cellpadding="10" cellspacing="0">
           
                <tr>
                    <th>Transaction ID</th>
                    <th>Tenant Name</th>
                    <th>Month</th>
                    <th>Monthly Price</th>
                    <th>Transaction Date</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr> 

                <?php 
                    //Looping data base on duration of rent
                    $sql= mysqli_query($conn ," SELECT * FROM trans a, booking b WHERE a.tenant_name = '$row[tenant_name]' AND  b.tenant_name=a.tenant_name");
                    $i=1;
                        while($sq = mysqli_fetch_assoc($sql)){
                        ?>
                                <tr>
                                    <td><?= $sq['trans_id'];?></td>
                                    <td><?= $sq['tenant_name'];?></td>
                                    <td><?= $sq['the_month'];?></td>
                                    <td><?= 'Rp.' . number_format($sq['monthly_price']); ?></td>
                                    <td><?= $sq['trans_date']; ?></td>
                                    <td><?= $sq['description'];?></td>
                                    <td>
                                    <?php
                                    if ($sq['trans_date'] == ''){
                                        echo "<a href='trans_process.php?trans_id=$sq[trans_id]&act=pay&book_id=$sq[book_id]&act'></a> ";
                                        echo "<a class='button' href='trans_process.php?trans_id=$sq[trans_id]&act=pay&book_id=$sq[book_id]'><button>Pay</button></a> ";
                                    }else {
                                        echo "</a>";
                                        echo "<a class='button' href='trans_process.php?trans_id=$sq[trans_id]&act=cancel&book_id=$sq[book_id]'><button>Cancel</button></a> ";
                                        
                                    }
                                    ?>
                                    </td>
                                   
                                </tr>
                            <?php } ?>
             </table>
        </div> 
</div>
   
</body>
<script>
    const toggleBtn = document.querySelector('.toggleBtn input');
    const sidebar = document.querySelector('.sidebar ul');
    const tenant= document.querySelector('#tenant-info');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('slide');
        tenant.classList.toggle('move');
    });

</script>
</html>