<?php
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
   if(isset($_POST['button_ins'])){
      //si le formulaire est envoyer
     //se connecter a la base de donnee
    include "connexion_bd.php";
    //recuperer les donnees du formulaire
    extract($_POST);
    //verifions si les champs sont vides
    if(isset($mail) && isset($mdp1) && $mail !="" && $mdp1 !="" && isset($mdp2) && $mdp2 !=""){
        //verifions si les mots de passe sont conforme
        if($mdp2 != $mdp1){
            //s'ils sont different
            $error = "les mots de passe ne sont pas identique";
        }else{
            // si non verifions si l'email existe
            $req = mysqli_query($con,"SELECT*FROM utilisateur WHERE mail ='$mail'");
                if(mysqli_num_rows($req) == 0){
                    //si ca n'existe pas,creons le compte
                 $req =mysqli_query($con,"INSERT INTO utilisateur values(null,'$mail','$mdp1')");
                 if($req){
                    //si le compte a ete creer, creons une variable pour afficher un message dans la page de connexion
                    $_SESSION['message']="<p class='message_ins'> inscription reussit !</p>";
                    header("location:id.php");
                 }else{
                    //si non
                   
                    $error="inscription échouée !";
                 }
                  

                }else{
                     //si ca existe
                    $error= "l'email existe deja ";
                   
                }
           
        }

    }else{
        $error = "veuillez remplire tous les champs!";
    }
   }
    ?>
<form action="" method="POST" class="formulaire">
<h1>inscription</h1>
<p class="message_erreur">
    <?php
    if(isset($error)){
        echo $error;
    }
    ?>
</p>
<label > adresse mail</label>
<input type="email" name="mail" >
<label> mots de passe </label>
<input type="password" name="mdp1" class="mdp1">
<label> confirmation mots de passe </label>
<input type="password" name="mdp2" class="mdp2">
<input type="submit" value="inscription" name="button_ins">
<p class="link">vous avez un compte? <a href="id.php">se connecter</a></p>
</form>
    <!-- relié notre page a notre fichier javascript -->
 <script src="script.js"></script> 
</body>
</html>