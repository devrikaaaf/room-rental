<?php

require 'functionn/function.php';

$name = mysqli_query($conn, "SELECT tenant_id, tenant_name FROM tenant ORDER BY tenant_name");

$room = mysqli_query($conn, "SELECT room_id, room_label, room_monthly_price FROM myroom ORDER BY room_label");

date_default_timezone_set('Asia/Jakarta');

?>
<!-- Make form for booking -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/booking.css" />

    <title>Booking new room</title>
    
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

<div class="wrapper">
    <h2>BOOKING FORM</h2>
    <form class="label" action="booking.php" method="POST">
      <table>
        <tr>
          <td>Tenant Name </td>
          <td><select name="tenant_name">
          <option value="">-----Select Tenant Name-----</option>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($name)) {
            ?>
            <option value="<?=$row["tenant_name"];?>"><?=$row["tenant_name"];?></option>
            <?php
            $i++;
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
          <td>Room  </td>
          <td><select name="room_id" id="room_id">
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($room)) {
            ?>
            <option value="<?=$row["room_id"] ;?>"><?=$row["room_label"];?></option>
            <?php
            $i++;
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
          <td>Duration  </td><td><input type="text" name="duration_month" id="duration_month" ></td><td>Month(s) </td>
        </tr>
        <tr>
          <td>Book start date </td><td><input type="date" name="book_start_date" ></td>
        </tr>
        <tr>
          <td>Book end date </td><td><input type="date" name="book_end_date" ></td>
        </tr>
      </table>
      <button class="button" type="submit" name="submit">Booking now</button>
    </form> 
</div> 
  
  <?php
    if (isset($_POST['submit'])) {
      $tenant_name = $_POST['tenant_name'];
      $room_id= $_POST['room_id'];
      $duration_month = $_POST['duration_month'];
      $book_start_date = date("Y-m-d", strtotime($_POST["book_start_date"]));
      $book_end_date =  date("Y-m-d", strtotime($_POST["book_end_date"]));
      $start_due_date = date("2022-05-10");
      $room_monthly_price= 1250000;
      $payment= $_POST["duration_month"] * 1250000;
  
      $month_name =[
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
      ];
      //Check the the room was booked or not
      $check = mysqli_query($conn, "SELECT room_id FROM booking WHERE room_id = '$room_id'");

      if(mysqli_fetch_assoc($check)){
        echo "<script>
        alert('ROOM NOT AVAILABLE!')
        </script>";
        
       }else {
        $result = mysqli_query($conn, "INSERT INTO booking (tenant_name, room_id, duration_month, book_start_date, book_end_date, payment ) 
                                       VALUES ( '$tenant_name', '$room_id', '$duration_month', '$book_start_date', '$book_end_date', '$payment')");
            if(($_POST)>0){
                
                echo
              "<script>
                  alert('ROOM SUCCESSFULLY BOOKED!');
                  document.location.href= 'booked_room.php';
              </script>";

              //Update the availability room into NOT AVAILABLE
              $up="UPDATE myroom SET room_availability= 'NOT AVAILABLE' WHERE room_id='$room_id'";
              mysqli_query($conn, $up);
              
              //Update the tenant status into ACTIVE
              $td="UPDATE tenant SET status= 'Active' WHERE tenant_name='$tenant_name'";
              mysqli_query($conn, $td);

                //Looping for the transaction table
                for ($i=0 ; $i<$duration_month;$i++){
                  //Due date
                  $due_date = date("Y-m-d" , strtotime("+$i month" , strtotime($book_start_date)));
                  $the_month    = $month_name[date('m' ,strtotime($due_date))]."  ".date('Y', strtotime($due_date));
                  //Insert data into database
                  $add = mysqli_query($conn,"INSERT INTO trans (tenant_name , due_date, the_month, monthly_price) 
                                      VALUES ('$tenant_name','$due_date','$the_month',' $room_monthly_price')");
                }

            }else{
            echo
            "<script>
                alert('ROOM FAIL TO BOOK!!');
                document.location.href= 'booked_room.php';
            </script>";
            }
      }

    }

	?>

  </body>
 <style>
   body {
    margin: 0;
    padding: 0;
    background-image: url(img/loginp3.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}
   </style>
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
