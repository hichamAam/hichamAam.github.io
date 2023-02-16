<?php
include ("connection.php");
session_start();

if( empty($_POST["username"]) || empty($_POST["password"]) ){
     
    header("location: ../index.php?r=1");
    
}else{

    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM userLogin WHERE username = '$user';";
    $result = mysqli_query($db_con,$sql);

    if(mysqli_num_rows($result) == 1){

        $sql = "SELECT * FROM userLogin WHERE username = '$user' AND password = '$pass';";
        $results = mysqli_query($db_con,$sql);

        if(mysqli_num_rows($results) == 1){

            $row = mysqli_fetch_assoc($results);

            // Check if the user is an administrator
            $query = "SELECT * FROM admin WHERE useradmin='$row[username]'";
            $results = mysqli_query($db_con, $query);
            if (mysqli_num_rows($results) == 1) {
                if( !isset($_POST['rememberMe']) ){    
                    $_SESSION["usertype"] = "admin";
                    $_SESSION["username"] = $user;
                    header("location: ../admin-dashboard.php");
                }else{
                    $coockietype_name = "usertype";
                    $coockietype_value = "admin";

                    $coockieuser_name = "username";
                    $coockieuser_value = $user;
                    
                    $expiry_time = time() + (14 * 24 * 60 * 60); // 14 days

                    setcookie($coockietype_name, $coockietype_value, $expiry_time, "/");

                    setcookie($coockieuser_name, $coockieuser_value, $expiry_time, "/");

                    header("location: ../admin-dashboard.php");
                }
            }

            // Check if the user is a professor
            $query = "SELECT * FROM prof WHERE userprof='$row[username]'";
            $results = mysqli_query($db_con, $query);
            if (mysqli_num_rows($results) == 1) {
                if( !isset($_POST['rememberMe']) ){
                    $_SESSION["usertype"] = "prof";
                    $_SESSION["username"] = $user;
                    header("location: ../prof-dashboard.php");
                }else{
                    $coockietype_name = "usertype";
                    $coockietype_value = "prof";

                    $coockieuser_name = "username";         
                    $coockieuser_value = $user;
                    
                    $expiry_time = time() + (14 * 24 * 60 * 60); // 14 days

                    setcookie($coockietype_name, $coockietype_value, $expiry_time, "/");
                    setcookie($coockieuser_name, $coockieuser_value, $expiry_time, "/");

                    header("location: ../prof-dashboard.php");
                }
            }

            // Check if the user is a student
            $query = "SELECT * FROM etudiant WHERE useretud='$row[username]'";
            $results = mysqli_query($db_con, $query);
            if (mysqli_num_rows($results) == 1) {
                if( !isset($_POST['rememberMe']) ){    
                    $_SESSION["usertype"] = "etudiant";
                    $_SESSION["username"] = $user;
                    header("location: ../student-dashboard.php");
                }else{
                    $coockietype_name = "usertype";
                    $coockietype_value = "etudiant";

                    $coockieuser_name = "username";
                    $coockieuser_value = $user;
                    
                    $expiry_time = time() + (14 * 24 * 60 * 60); // 14 days

                    setcookie($coockietype_name, $coockietype_value, $expiry_time, "/");
                    setcookie($coockieuser_name, $coockieuser_value, $expiry_time, "/");

                    header("location: ../student-dashboard.php");
                }
            }
        }else{
            header("location: ../index.php?error=2?user='$user'");
        }

    }else{
        header("location: ../index.php?error=1");
    }
}
?>

