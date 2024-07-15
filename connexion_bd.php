<?php
$con = mysqli_connect("localhost","root","","chat_youtube");
$req = mysqli_query($con, 'SET NAMES UTF8');
if(!$con){
    echo "connexion échouéé";
}

?>
