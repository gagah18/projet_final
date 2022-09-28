<?php
    $conn= mysqli_connect("mysql-gaga.alwaysdata.net","gaga","lovelinam","gaga_mstic");
    if($conn){
        echo "Connect to db";
    } else{
        echo "Failed to Connect to db";

    }
?>