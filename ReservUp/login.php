<?php

session_start();
if(isset($_SESSION['testsio444'])){
    if(!empty($_SESSION['testsio444'])){
        header("Location: admin/");
       }  
   }
   
   

include "config/modele.php";

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - ReservUp</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            .form-control {
                border: 2px solid  #000000;
                border-radius: 0.25rem;
                background-color:aquamarine;
                color: #212529;
            }
            .img{
                position:absolute;
                left: 40px;;
            }
        </style>
        <img src="https://cdn.onlinewebfonts.com/svg/img_241918.png" 
        style="width: 100PX;" >
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <form method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" name="email" style="width:50%">
                        </div>
                        <div class="mb-3">
                            <label for="motdepasse" class="form-label">Mot de passe :</label>
                            <input type="password" class="form-control" name="motdepasse" style="width:50%">
                        </div>
                        <input type="submit" class="btn btn-danger" name="envoyer" value="Se connecter">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>

<?php

if(isset($_POST['envoyer'])){
    if(!empty($_POST['email'])AND !empty($_POST['motdepasse'])){
        $email = htmlspecialchars ($_POST['email']);
        $motdepasse =htmlspecialchars ($_POST['motdepasse']);

        $admin = getAdmin($email,$motdepasse);
        
        if($admin){
            $_SESSION['testsio444']=$admin;

            header("Location: admin/");
        }else{
            echo"Il y a un problème!!!!";
        }
    }
}


