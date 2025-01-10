<?php 

require 'functionn/function.php';

    $tenant_id= $_GET["tenant_id"];

    if(delete1($tenant_id) > 0){
        echo 
        "<script>
            alert('TENANT SUCCESSFULLY DELETE!');
            document.location.href= 'tenant.php';
        </script>";
    }else{
        echo 
        "<script>
            alert('TENANT FAILED TO DELETE!');
            document.location.href= 'tenant.php';
        </script>";
    }
?>