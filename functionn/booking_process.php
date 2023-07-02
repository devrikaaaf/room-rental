<?php
require 'functionn/function.php';

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