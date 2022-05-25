document.addEventListener('DOMContentLoaded', init,false);
console.log("Lancement du programme 'main.js'")

function init(){
    document.getElementById('ouverture_menu').addEventListener("click", ouverture); 	                    // Initialisation du bouton de l'ouverture du menu.
    document.getElementById('fermeture_menu').addEventListener("click", ouverture);		                // Initialisation du bouton de la fermeture du menu.
}



function ouverture(){	                                                                                                // Ouvre le menu ou le ferme.
    if (document.querySelectorAll("#fermé").length > 0){ 			                                            // On vérifie si il y a bien un id "fermé" dans le html.
        document.getElementsByClassName("menu")[0].id = "ouvert";	                                        // On change l'id par "ouvert" en cherchant l'id via la classe "menu".
        console.log("Ouverture du menu.");
    }

    else{															                                                    // Si le menu n'est pas fermé alors il est ouvert.
        document.getElementsByClassName("menu")[0].id = "fermé";	                                            // On change l'id par "fermé" en cherchant l'id via la classe "menu".
        console.log("Fermeture du menu.");
    }
}