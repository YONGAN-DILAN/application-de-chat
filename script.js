//confirmation du mot de passe
//verifions si le mot de passe et la confirmation sont conforme
var mdp1 = document.querySelector('.mbp1');
var mdp2 = document.querySelector('.mdp2');
mdp2.onkeyup = function(){
    //evenement lorsqu'on ecrit dans le champ:confirmation du mot de passe
    message_erreur = document.querySelector('.message_erreur');
    if(mdp1.value != mdp2.value){//s'il ne sont pas egaux
        //on affiche un message d'erreur
    message_erreur.innerText = " les mots de passes ne sont pas conforme";
    }else{//si non
        //on ecrit rien dans le message d'erreur 
        message_erreur.innerText=""
    }
}

  