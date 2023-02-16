<?php 
include("connection.php");
session_start();

if( empty($_POST['username']) || empty($_POST['password'])){
    header("location: ../login.html?r=1");
}else{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM userlogin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db_con,$query);
    $count = mysqli_num_rows($result);
    
    if($count == 1){
        // $userRow = mysqli_fetch_assoc($result);

        // check is admin
        $adQuery = "SELECT * FROM admin WHERE useradmin = '$username'";
        $adCheck = mysqli_query($db_con,$query);
        $adCount = mysqli_num_rows($adCheck);
        if($adCount == 1){
            echo "you are admin!";
        }

    }
    

}


?>