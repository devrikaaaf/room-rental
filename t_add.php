<?php 
require 'functionn/function.php';
    //button check
    if(isset($_POST["submit"])){
 
//check data success to add or not
if(add1($_POST)>0){
    echo 
    "<script>
        alert('TENANT SUCCESSFULLY ADDED!');
        document.location.href= 'tenant.php';
    </script>";
}else{
    echo 
    "<script>
        alert('TENANT FAIL TO ADDED!');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/t_add.css" />


    <title>Add new Tenant</title>
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

<div id="addTenant">
     <div id="input">
     <h1 ><img src="https://see.fontimg.com/api/renderfont4/1GMVL/eyJyIjoiZnMiLCJoIjo4MSwidyI6MTUwMCwiZnMiOjU0LCJmZ2MiOiIjRjZFQUVBIiwiYmdjIjoiI0YyRjJGMiIsInQiOjF9/YWRkIG5ldyB0ZW5hbnQ/game-of-squids.png"></h1>
    <form action="" method="post">
        <ul>
           <br>
                <label for="tenant_id">Tenant Id  </label>
                <input type="text" name="tenant_id" id="tenant_id" style="margin-left: 165px;">
           
           <br>
                <label for="tenant_name">Tenant name </label>
                <input type="text" name="tenant_name" id="tenant_name" style="margin-left: 136px;"required>
           
           <br>
                <label for="tenant_address">Tenant address </label>
                <input type="text" name="tenant_address" id="tenant_address" style="margin-left: 120px;">
           
           <br>
                <label for="tenant_ktp_no">Tenant no.KTP  </label>
                <input type="text" name="tenant_ktp_no" id="tenant_ktp_no" style="margin-left: 128px;"required>
           
           <br>
                <label for="tenant_phone">Tenant phone  </label>
                <input type="text" name="tenant_phone" id="tenant_phone" style="margin-left: 133px;"required>
           
           <br>
                <label for="tenant_email">Tenant email  </label>
                <input type="text" name="tenant_email" id="tenant_email" style="margin-left: 138px;">
           
           <br>
                <label for="tenant_emergcp">Tenant emergcp </label>
                <input type="text" name="tenant_emergcp" id="tenant_emergcp" style="margin-left: 113px;"required>
           
           <br>
           <label for="tenant_emergcp_phone">Tenant emergcp phone</label>
                <input type="text" name="tenant_emergcp_phone" id="tenant_emergcp_phone" style="margin-left:61px;"required>
           
           <br>
           <label for="tenant_emergcp_email">Tenant emergcp email </label>
                <input type="text" name="tenant_emergcp_email" id="tenant_emergcp_email"style="margin-left: 67px;">
           
           <br>
           <label for="tenant_bankaccount">Tenant bank account </label>
                <input type="text" name="tenant_bankaccount" id="tenant_bankaccount" style="margin-left: 78px;"required>
           
           <br>
           <label for="tenant_bankaccount_no">Tenant bank account number </label>
                <input type="text" name="tenant_bankaccount_no" id="tenant_bankaccount_no" style="margin-left: 15px;"required>
           
           
                <br><br><br>
                <button type="submit" name="submit">Add data</button>
           
        </ul>
</div>
</div>
</body>
<script>
    const toggleBtn = document.querySelector('.toggleBtn input');
    const sidebar = document.querySelector('.sidebar ul');
    const addTenant= document.querySelector('#addTenant');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('slide');
        addTenant.classList.toggle('move');
    });

</script> 
</html>