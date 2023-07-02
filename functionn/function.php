<?php 

//connect to database
$conn= mysqli_connect("localhost", "root", "", "room"); 


function query($query){
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows= [];
    while ($row= mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    return $rows;

}

function add($data){
    global $conn;
    //collect data 
    $room_id = htmlspecialchars($data["room_id"]);
    $room_label = htmlspecialchars($data["room_label"]);
    $room_location = htmlspecialchars($data["room_location"]);
    $room_window = htmlspecialchars($data["room_window"]);
    $room_monthly_price = htmlspecialchars($data["room_monthly_price"]);
    $room_availability = htmlspecialchars($data["room_availability"]);
    $room_description = htmlspecialchars($data["room_description"]);

    $query= "INSERT INTO myroom VALUES('$room_id', '$room_label', '$room_location', '$room_window', '$room_monthly_price', '$room_availability', '$room_description')";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);

}

function delete($room_id){
    global $conn;
    $del="DELETE FROM myroom WHERE room_id='$room_id'";
    mysqli_query($conn, $del);


    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    //collect data 
    $room_id = htmlspecialchars($data["room_id"]);
    $room_label = htmlspecialchars($data["room_label"]);
    $room_location = htmlspecialchars($data["room_location"]);
    $room_window = htmlspecialchars($data["room_window"]);
    $room_monthly_price = htmlspecialchars($data["room_monthly_price"]);
    $room_availability = htmlspecialchars($data["room_availability"]);
    $room_description = htmlspecialchars($data["room_description"]);

    $query= "UPDATE myroom SET
            room_id= '$room_id',
            room_label= '$room_label',
            room_location= '$room_location',
            room_window= '$room_window',
            room_monthly_price= '$room_monthly_price',
            room_availability= '$room_availability',
            room_description= '$room_description'
            
            WHERE room_id= '$room_id'";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function search($keyword){
    $query= "SELECT * FROM myroom WHERE
    room_id LIKE '%$keyword%' OR
    room_availability LIKE '%$keyword%' OR
    room_location LIKE '%$keyword%' OR
    room_description LIKE '%$keyword%' OR
    room_window LIKE '%$keyword%'";

    return query($query);
}

function add1($data){
    global $conn;
    //collect data 
    $tenant_id = htmlspecialchars($data["tenant_id"]);
    $tenant_name = htmlspecialchars($data["tenant_name"]);
    $tenant_address= htmlspecialchars($data["tenant_address"]);
    $tenant_ktp_no = htmlspecialchars($data["tenant_ktp_no"]);
    $tenant_phone = htmlspecialchars($data["tenant_phone"]);
    $tenant_email = htmlspecialchars($data["tenant_email"]);
    $tenant_emergcp = htmlspecialchars($data["tenant_emergcp"]);
    $tenant_emergcp_phone = htmlspecialchars($data["tenant_emergcp_phone"]);
    $tenant_emergcp_email = htmlspecialchars($data["tenant_emergcp_email"]);
    $tenant_bankaccount = htmlspecialchars($data["tenant_bankaccount"]);
    $tenant_bankaccount_no = htmlspecialchars($data["tenant_bankaccount_no"]);
    

    $que= mysqli_query($conn,"INSERT INTO tenant VALUES('$tenant_id', '$tenant_name', '$tenant_address', 
                                        '$tenant_ktp_no', '$tenant_phone', '$tenant_email', 
                                        '$tenant_emergcp', '$tenant_emergcp_phone', '$tenant_emergcp_email', 
                                        '$tenant_bankaccount', '$tenant_bankaccount_no')");
    


    return mysqli_affected_rows($conn);

}

function delete1($tenant_id){
    global $conn;
    $del="DELETE FROM tenant WHERE tenant_id='$tenant_id'";
    mysqli_query($conn, $del);


    return mysqli_affected_rows($conn);
}

function edit1($data){
    global $conn;
    //collect data 
    $tenant_id = htmlspecialchars($data["tenant_id"]);
    $tenant_name = htmlspecialchars($data["tenant_name"]);
    $tenant_address= htmlspecialchars($data["tenant_address"]);
    $tenant_ktp_no = htmlspecialchars($data["tenant_ktp_no"]);
    $tenant_phone = htmlspecialchars($data["tenant_phone"]);
    $tenant_email = htmlspecialchars($data["tenant_email"]);
    $tenant_emergcp = htmlspecialchars($data["tenant_emergcp"]);
    $tenant_emergcp_phone = htmlspecialchars($data["tenant_emergcp_phone"]);
    $tenant_emergcp_email = htmlspecialchars($data["tenant_emergcp_email"]);
    $tenant_bankaccount = htmlspecialchars($data["tenant_bankaccount"]);
    $tenant_bankaccount_no = htmlspecialchars($data["tenant_bankaccount_no"]);

    $query= "UPDATE tenant SET 
            tenant_id= '$tenant_id',
            tenant_name= '$tenant_name',
            tenant_address= '$tenant_address',
            tenant_ktp_no= '$tenant_ktp_no',
            tenant_phone= '$tenant_phone',
            tenant_email = '$tenant_email',
            tenant_emergcp= '$tenant_emergcp',
            tenant_emergcp_phone= '$tenant_emergcp_phone',
            tenant_emergcp_email= '$tenant_emergcp_email',
            tenant_bankaccount= '$tenant_bankaccount',
            tenant_bankaccount_no= '$tenant_bankaccount_no'

            WHERE tenant_id= '$tenant_id'";
    
    
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
function search1($keyword){
    $query= "SELECT * FROM tenant WHERE
    tenant_id LIKE '%$keyword%' OR
    tenant_name LIKE '%$keyword%' OR
    tenant_address LIKE '%$keyword%'";

    return query($query);
}


function registration($data){
    global $conn;

    $username= strtolower($data["username"]);
    $password= mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn, $data["password2"]);

    //check username
    $result= mysqli_query($conn, "SELECT username FROM myadmin WHERE username= '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('Username already exists!')
        </script>";

        return false;
    }

    //check confirm password
    if($password !== $password2){
            echo "<script>
            alert('The confirmation password is wrong!')
            </script>";

            return false;
        } 
    //encryption password
    $password= password_hash($password, PASSWORD_DEFAULT);

    //add new user to database
    mysqli_query($conn, "INSERT INTO myadmin VALUES ('', '$username', '$password')");
   return mysqli_affected_rows($conn);
}   

