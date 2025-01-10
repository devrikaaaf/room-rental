<?php 

$conn= mysqli_connect("localhost", "root", "", "room"); 

//retrieve data from url
$room_id= $_GET["room_id"];

$wrow= mysqli_query($conn, "SELECT * FROM booking WHERE room_id='$room_id'");
while($w= mysqli_fetch_assoc($wrow)){
//check data success to change or not
if($_GET["room_id"]){
    //Update the tenant status 
    $tup= "UPDATE tenant  SET status ='Moving Out' WHERE tenant_name='$w[tenant_name]'";
    mysqli_query($conn, $tup);
    //Set the data to update
    $rup= "UPDATE myroom  SET room_availability ='Available' WHERE room_id='$room_id'";
    mysqli_query($conn, $rup);
    //Delete tenant from booking table
    $tup1= "DELETE FROM booking WHERE tenant_name='$w[tenant_name]'";
    mysqli_query($conn, $tup1);

    //Delete the transaction history when the tenant was finish the rent
        $qrow= mysqli_query($conn, "SELECT * FROM trans  WHERE tenant_name='$w[tenant_name]'");
        while($srow= mysqli_fetch_assoc($qrow)){

            $d="DELETE FROM trans WHERE trans_id= '$srow[trans_id]'";
            mysqli_query($conn, $d);

        }
    //Give an alert to know the program was executed
    echo 
    "<script>
        alert('STATUS SUCCESSFULLY UPDATE!');
        document.location.href= 'booked_room.php';
    </script>";

}else{
    echo 
    "<script>
        alert('STATUS FAIL TO UPDATE!');
        document.location.href= 'booked_room.php';
    </script>";
}

}
?>
