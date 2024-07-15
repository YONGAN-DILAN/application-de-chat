
<?php if(isset($_SESSION['user'])){//si l'utilisateur est connecter
    //connection a la base de donnees
    include "connexion_bd.php";
    //requet pour afficher les messages
    $req = mysqli_query($con , "SELECT * FROM messages ORDER BY id_m  DESC");
    if(mysqli_num_rows($req) == 0){
        //si y'a pas encore de message
        echo "message vide";
    }else{
        //si oui
        while($row = mysqli_fetch_assoc($req)){
            //si c'est vous qui avez envoyer le message on utilise le message:
            if($row['mail'] == $_SESSION['user']){
                ?>
                  <div class="message your_message">
                <span>vous</span>
                <p><?=$row['msg']?></p>
                <p class="date"><?=$row['date']?></p>
            </div>
                <?php
            }else{
                //si vous n'ete pas l'auteur
                ?>
                 <div class="message others_message">
                <span><?=$row['mail'] ?></span>
                <p><?=$row['msg']?></p>
                <p class="date"><?=$row['date']?></p>
            </div>
                <?php
            }
        }
    }
}
?>

