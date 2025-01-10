<?php	

require 'functionn/function.php';

    $conn= mysqli_connect("localhost", "root", "", "room");

    $myroom= mysqli_query($conn, "SELECT*FROM tenant");

//search button 
if (isset($_POST["search"])){
    $myroom= search1($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tenant.css" />

    <title>Tenants Info</title>
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

<h1 id="tenantInfo">DATA OF TENANTS</h1>
   <br>

<div id="search-add"> 
    <form action="" method="POST">
    <input type="text" class="keyword" name="keyword" placeholder="Type the keyword..."  autofocus >
    <button class="search" type="submit" name="search">Search</button>
    <button class="add"><a href="t_add.php" target="_blank">+ Add new tenant</a></button></form>
</div>

<div id="main">
     <table border="1" cellspacing="0" cellpadding="7">
    <tr class="tb-head">
       <th>Tenant Id</th>
       <th>Name</th>
       <th>Address</th>
       <th>Identity Number</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Emergcp</th>
       <th>Emergcp Phone</th>
       <th>Emergcp Email</th>
       <th>Bank Account</th>
       <th>Bank Account Number</th>
       <th>Action</th>
       <th>Status</th>
    </tr>
</div>
    <?php $i = 1; 	 ?>
    <?php foreach($myroom as $row) : ?>
    <tr class="tb">
       <td><?= $row["tenant_id"]; ?></td>
       <td><?= $row["tenant_name"]; ?></td>
       <td><?= $row["tenant_address"]; ?></td>
       <td><?= $row["tenant_ktp_no"]; ?></td>
       <td><?= $row["tenant_phone"]; ?></td>
       <td><?= $row["tenant_email"]; ?></td>
       <td><?= $row["tenant_emergcp"]; ?></td>
       <td><?= $row["tenant_emergcp_phone"]; ?></td>
       <td><?= $row["tenant_emergcp_email"]; ?></td>
       <td><?= $row["tenant_bankaccount"]; ?></td>
       <td><?= $row["tenant_bankaccount_no"]; ?></td>
       <td class="action">
          <a href="t_edit.php?tenant_id=<?= $row["tenant_id"];?>"><button class="edit">Edit</button></a>
          <a href="t_delete.php?tenant_id=<?= $row["tenant_id"]; ?>" onclick="return confirm('Delete this data?')"><button class="delete">Delete</button></a>
       </td>
       <td><?= $row["status"]; ?></td>

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