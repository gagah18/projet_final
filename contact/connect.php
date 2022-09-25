<?php
    $conn= mysqli_connect("localhost","root","","mstic_userdb");
    if($conn){
        echo "Connect to db";
    } else{
        echo "Failed to Connect to db";

    }
?>