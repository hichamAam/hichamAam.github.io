<?php
include("php/connection.php");
session_start();

if( !empty($_COOKIE["usertype"]) && !empty($_COOKIE["username"])){

    $usertype = $_COOKIE["usertype"];

    if($usertype != "etudiant"){
        header("location: index.php?r=101");
    }else{

        $username = $_COOKIE["username"];
        $sql = "SELECT * FROM etudiant JOIN userlogin ON etudiant.useretud = userlogin.username WHERE username='$username'";
        $result = mysqli_query($db_con,$sql);
        $etudarray = mysqli_fetch_assoc($result);

        $prenom = $etudarray["prenom"];
        $nom = $etudarray["nom"];
        $notell = $etudarray["Notell"];
        $email = $etudarray["email"];
    
    
    }

}elseif( !empty($_SESSION["usertype"]) && !empty($_SESSION["username"])){

    $usertype = $_SESSION["usertype"];

    if($usertype != "etudiant"){
        header("location: index.php?r=101");
    }else{

        $username = $_SESSION["username"];
        $sql = "SELECT * FROM etudiant JOIN userlogin ON etudiant.useretud = userlogin.username WHERE username='$username'";
        $result = mysqli_query($db_con,$sql);
        $etudarray = mysqli_fetch_assoc($result);

        $prenom = $etudarray["prenom"];
        $nom = $etudarray["nom"];
        $notell = $etudarray["Notell"];
        $email = $etudarray["email"];
    
    
    }

}else{
    header("location: index.php?r=2");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dash-style.css">
    <title>MyCenter</title> 
</head>
<body>
    
<div class="wrapper d-flex align-items-stretch">
    <!-- SideBar -->
        <nav id="sidebar" class="active">
            <h1><a href="index.php" class="logo" id="title">MyCenter</a></h1>
            <img src="img/mycenter-logo.png" class="img-logo" id="logo">
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#home"><span class="fa fa-home"></span>Home</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-user"></span> About</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sticky-note"></span> Blog</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-cogs"></span> Services</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
                </li>
            </ul>

            
        </nav>
    <!-- End SideBar -->
    <!-- Page -->
        <div id="content" class="p-4 p-md-5">
            <!-- NavBar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary" >
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#profil">Mon Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paramètres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="php/logout.php">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>    
        <!-- End NavBar -->
        <!-- Content -->

            
        
        
        
        
        
        
        
        
        
        
        
        
        
        <?php echo $usertype;?>
        <!-- End Content -->
        <!-- End Page -->
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>  
</body>
</html>