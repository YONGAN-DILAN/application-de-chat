<?php
//demarer la sessin
session_start();
if(!isset($_SESSION['user'])){
    //si l'utilisateur n'est pas connecter
    //redirection ver la page de connecxion
 header("location:id.php");
}
$user = $_SESSION['user']//email de l'utilisateur
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$user?> | chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat">
        <div class="button-email">
            <span><?=$user?></span>
            <a href="deconnexion.php" class="deconnexion_btn">deconnexion</a>
        </div>
        <div class="message_box">
        <?php
        //inclure la page message.php
        include "message.php"
        ?>
        </div>
    
        <!--messages
        <div class="message_box">
            <div class="message your_message">
                <span>vous</span>
                <p>comment ca vas??</p>
                <p class="date">26-12-01 00:25:26</p>
            </div>
            <div class="message others_message">
                <span>azerty@gmail.com</span>
                <p>oui ca vas merci</p>
                <p class="date">26-12-01 00:25:26</p>
            </div>
        </div>
        fin messages-->
        <?php
        //envoie de message
        if(isset($_POST['send'])){
             //recuperons le message
             $message = $_POST['message'];
           //connexion a la base donnee
           include ("connexion_bd.php");
           //verifions si le champs n'est pas vide
           if(isset($message) && $message != ""){
               //inserer le message dans la base de donnees
               $req = mysqli_query($con ,"INSERT INTO messages VALUES(NULL,'$user','$message',NOW())");
               //on actualise la page
               header('location:chat.php');
           }else{
               //si le message est vide on actualise la page
               header('location:chat.php');


           }
         

        }
        ?>
        <form action="" method="POST" class="send_message" >
            <textarea name="message" cols="30" rows="2" placeholder="votre message"></textarea>
            <input type="submit" value="envoyé" name="send">
        </form>
    </div>

</body>
</html>
