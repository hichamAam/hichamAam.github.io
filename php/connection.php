<?php

$host = "sql8.freemysqlhosting.net";
$user = "sql8598558";
$pass = "wc1NfERy3j";
$dbName = "sql8598558";


$db_con = mysqli_connect($host,$user,$pass,$dbName);

if( !$db_con ){
    die("Connection failed: " . mysqli_connect_error());
}




?>
