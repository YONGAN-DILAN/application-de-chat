<?php
//demarer la sessin
session_start();
if(!isset($_SESSION['user'])){
    //si l'utilisateur n'est pas connecter
    //redirection ver la page de connection
 header('location:id.php');
}
//destruction de toute les session
session_destroy();
//redirection vers la page de connection
header('location:id.php')
?>