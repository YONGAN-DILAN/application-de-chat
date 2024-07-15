<?php
//demarer la sessin
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion | chat</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <?php
        if (isset($_POST['button_con'])) {
            //si le formulaire est envoyer
            //se connecter a la base de donnee
        include "connexion_bd.php";
        //extraire les infos du formulaire
        extract($_POST);
        //verifions si les champs sont vides
        if(isset($mail) && isset($mdp1) &&$mail !="" && $mdp1 != ""){
            //verifions si les identifiants sont justes
        $req = mysqli_query($con, "SELECT*FROM utilisateur WHERE mail = '$mail' AND mdp = '$mdp1'");
        if(mysqli_num_rows($req) > 0){
            //si les ids sont juste
            //creation d'une session qui contiend l'email
            $_SESSION['user'] = $mail;
            //redirection ver la page chat
            header("location:chat.php");
            //detruire la variable du message d'instruction
            unset($_SESSION['message']);


        }else{
            //si non
            $error = "email ou mots de passe incorrecte(s) !";
        }
        }else{
            $error = "veuillez remplir tous les champs !";
        }
         }
    ?>
    <form action="#" method="post" class="formulaire" >
            <h1>Connexion</h1>
            <?php
            //affichons le message qui dit qu'un compte a ete creer
                if(isset($_SESSION['message'])){
                    echo  $_SESSION['message'];
                }
                ?>
            <p class="message_erreur">
                <?php
                //affichons le message d'erreur
                if(isset($error)){
                    echo $error ;
                }
                ?>
            </p>

            <label > adresse mail</label>
            <input type="email" name="mail">
            <label> mots de passe </label>
            <input type="password" name="mdp1">

            <input type="submit" value="connexion" name="button_con">
            <p class="link">vous n'avez pas de compte? <a href="inscription.php">creer un compte</a></p>
    </form>  
</body>
</html>