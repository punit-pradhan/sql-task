<?php

$server="localhost";
$username="root";
$password="root";
$database = "IPLfixture";

$connect=new mysqli($servername,$username,$password,$database);

/* Check the connection is created properly or not */
if($connect->connect_error)
    echo "Connection error:" .$connect->connect_error;
else
    echo "Connection is created successfully";     
?>
