<?php

    session_start();

    include "../config/commandes.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Admin Page</title>
</head>
<body>
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <form method="POST">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Entrer l'email" style="width : 80%"> 
                    </div>
                    <div class="mb-3">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" class="form-control" name="motdepasse" placeholder="Votre mot de passe" style="width : 80%">
                    </div>
                    <input type="submit" class="btn btn-danger" name="envoyer" value="Se Connecter">
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']))
    {
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);

        $admin = getAdmin($email, $motdepasse);
        if($admin){
            
            $_SESSION['zWuppkgTToY44'] = $admin;

            header("Location: admin.php");

        }else{
            echo"Erreur d'e-mail ou de mot de passe !";
        }
    }
}
?>