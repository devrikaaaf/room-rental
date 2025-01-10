<?php 
require 'functionn/function.php';

//retrieve data from url
$tenant_id= $_GET["tenant_id"];

//query data room base on room_id
$tenant= query("SELECT * FROM tenant WHERE tenant_id= '$tenant_id'")[0];

//button check
if(isset($_POST["submit"])){
 
//check data success to add or not
if(edit1($_POST)>0){
    echo 
    "<script>
        alert('DATA SUCCESSFULLY UPDATE!!');
        document.location.href= 'tenant.php';
    </script>";
}else{
    echo 
    "<script>
        alert('DATA WASN'T SUCCESSFULLY UPDATE!');
        document.location.href= 'tenant.php';
    </script>";
}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/t_edit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tenant</title>
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
                <label for="tenant_id">Tenant Id  </label>
                <input type="text" name="tenant_id" id="tenant_id" required value="<?= $tenant["tenant_id"]; ?>" style="margin-left: 160px;">
           
           <br><br>
                <label for="name">Tenant name </label>
                <input type="text" name="tenant_name" id="tenant_name"required value="<?= $tenant["tenant_name"]; ?>" style="margin-left: 130px;">
           
           <br><br>
                <label for="gender">Tenant address </label>
                <input type="text" name="tenant_address" id="tenant_address" value="<?= $tenant["tenant_address"]; ?>" style="margin-left: 113px;">
           
           <br><br>
                <label for="email">Tenant no.KTP  </label>
                <input type="text" name="tenant_ktp_no" id="tenant_ktp_no"required value="<?= $tenant["tenant_ktp_no"]; ?>" style="margin-left: 121px;">
           
           <br><br>
                <label for="id_card">Tenant phone  </label>
                <input type="text" name="tenant_phone" id="tenant_phone"required value="<?= $tenant["tenant_phone"]; ?>" style="margin-left: 125px;">
           
           <br><br>
                <label for="id_card">Tenant email  </label>
                <input type="text" name="tenant_email" id="tenant_email" value="<?= $tenant["tenant_email"]; ?>" style="margin-left: 132px;">
           
           <br><br>
                <label for="id_card">Tenant emergcp </label>
                <input type="text" name="tenant_emergcp" id="tenant_emergcp"required value="<?= $tenant["tenant_emergcp"]; ?>" style="margin-left: 106px;">
           
           <br><br>
           <label for="id_card">Tenant emergcp phone </label>
                <input type="text" name="tenant_emergcp_phone" id="tenant_emergcp_phone"required value="<?= $tenant["tenant_emergcp_phone"]; ?>" style="margin-left: 54px;">
           
           <br><br>
           <label for="id_card">Tenant emergcp email </label>
                <input type="text" name="tenant_emergcp_email" id="tenant_emergcp_email" value="<?= $tenant["tenant_emergcp_email"]; ?>" style="margin-left: 60px;">
           
           <br><br>
           <label for="id_card">Tenant bank account </label>
                <input type="text" name="tenant_bankaccount" id="tenant_bankaccount"required value="<?= $tenant["tenant_bankaccount"]; ?>" style="margin-left: 70px;">
           
           <br><br>
           <label for="id_card">Tenant bank account number </label>
                <input type="text" name="tenant_bankaccount_no" id="tenant_bankaccount_no"required value="<?= $tenant["tenant_bankaccount_no"]; ?>" style="margin-left: 7px;">
           
           <br><br>
                <button type="submit" name="submit">Update data</button>
           
        </ul>
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