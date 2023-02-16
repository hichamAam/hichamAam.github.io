
<?php
include("php/connection.php");
session_start();

if( !empty($_COOKIE["usertype"]) || !empty($_COOKIE["username"]) ){

    switch ($_COOKIE["usertype"]) {
        case 'admin':
            header("location: admin-dashboard.php");
            break;
        
        case 'prof':
            header("location: prof-dashboard.php");
            break;
        
        case 'etudiant':
            header("location: student-dashboard.php");
            break;
    }

}elseif( !empty($_SESSION['usertype']) || !empty($_SESSION['username']) ){

    switch ($_SESSION['usertype']) {
        case 'admin':
            header("location: admin-dashboard.php");
            break;
        
        case 'prof':
            header("location: prof-dashboard.php");
            break;
        
        case 'etudiant':
            header("location: student-dashboard.php");
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login-style.css">
    <script defer src="js/index.js"></script>
    <title>Se Connecter</title>
</head>
<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">    
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center fs-2">Se Connecter</h5>
                                        <P class="text-center small fs-6">Saisir votre nom d'utilisateur et Mot de passe</P>
                                    </div>
                                    <form class="row g3 needs-validation" id="loginFrom" action="php/login.php" method="post" novalidate>
                                        
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend" >@</span>
                                                <input type="text" name="username" class="form-control" id="Username" required>
                                                <div class="invalid-feedback" id="userInvalid" >Entrez votre nom d'utilisateur</div>
                                                <div class="invalid-feedback" id="userPasTrouver" >Utilisateur non trouver!</div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" name="password" id="Password" required>
                                            <div class="invalid-feedback" id="passInvalid" >Entrez votre Mot de passe</div>
                                            <div class="invalid-feedback" id="passIncorrect" >Mot de passe incorrect!</div>
                                            
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="rememberMe" value="true" id="rememberMe"   >
                                                <label class="form-check-label" for="rememberMe" name="remeberme">Souvient Moi</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" onclick="return validateForm()" >Se Connecter</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0 text-center fs-6">Mot de passe oublié? <a href="#">Réinitialiser</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </section>
        </div>
    </main>
    <?php if(isset($_GET['error'])){ 
    $error = $_GET['error'];
    if($error == 1){ ?>
    <script>
        document.getElementById("Username").style.borderColor = "red";
        document.getElementById("Username").style.backgroundColor = "#ffdddd";
        document.getElementById("userPasTrouver").style.display = "unset";
        ocument.getElementById("Password").style.borderColor = "red";
        document.getElementById("Password").style.backgroundColor = "#ffdddd";
    </script>
    <?php }elseif($error == 2){ $user=$_GET['user'];?>
    <script>
        document.getElementById("Username").value = '<?php echo $user;?>';
        document.getElementById("Password").style.borderColor = "red";
        document.getElementById("Password").style.backgroundColor = "#ffdddd";
        document.getElementById("passIncorrect").style.display = "unset";
    </script>
    <?php }} ?>
    <script src="js/main.js"></script>
    
</body>
</html>