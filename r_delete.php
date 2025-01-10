<?php 

require 'functionn/function.php';

    $room_id= $_GET["room_id"];

    if(delete($room_id) > 0){
        echo 
        "<script>
            alert('ROOM SUCCESSFULLY DELETE!');
            document.location.href= 'room.php';
        </script>";
    }else{
        echo 
        "<script>
            alert('ROOM FAILED TO DELETE!');
            document.location.href= 'room.php';
        </script>";
    }
?>