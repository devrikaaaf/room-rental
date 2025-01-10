<?php

require 'functionn/function.php';

$trans_id = $_GET['trans_id'];
$book_id = $_GET['book_id'];



if($_GET['act'] == 'pay'){

  echo  "<script>
          alert('SUCCESFUL PAYMENT !');
          document.location.href= 'trans.php?book_id=$book_id+trans_id=$trans_id';
          </script>";
    
      //Trans date
      date_default_timezone_set('Asia/Jakarta');
      $today= date("Y-m-d");

      //Trans month
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

      $tr_date = date("Y-m-d" , strtotime("m" , strtotime($today)));
      $tr_month    = $month_name[date('m' ,strtotime($tr_date))]."  ".date('Y', strtotime($tr_date));

      //Description
      $desc= "Paid"; 
      
      //Update data on database
      $opy="UPDATE trans SET trans_date= '$today' , trans_month = '$tr_month' , description='$desc' WHERE trans_id='$trans_id'";
      mysqli_query($conn, $opy);

      //Send to income table 
      $que= mysqli_query($conn ," SELECT * FROM trans WHERE trans_id = '$_GET[trans_id]'");

            while($q= mysqli_fetch_assoc($que)){
                  $rsl= "INSERT INTO income (trans_id, trans_month, trans_date, the_month, monthly_price) 
                         VALUES ('$q[trans_id]', ' $q[trans_month]',' $q[trans_date]', '$q[the_month]', '$q[monthly_price]')";
            mysqli_query($conn, $rsl);
            }

}
elseif($_GET['act']=='cancel'){
    echo  "<script>
            alert('CANCEL THE PAYMENT?');
            document.location.href= 'trans.php?book_id=$book_id';
          </script>";

        //Update data on database
        $opy="UPDATE trans SET trans_date= NULL, description= NULL WHERE trans_id='$trans_id'";
        mysqli_query($conn, $opy);

        //Delete data from income
        $d="DELETE FROM income  WHERE trans_id= '$trans_id'";
        mysqli_query($conn, $d);
}

?>