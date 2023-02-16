<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbName = "centre";


$db_con = mysqli_connect($host,$user,$pass,$dbName);

if( !$db_con ){
    die("Connection failed: " . mysqli_connect_error());
}




?>