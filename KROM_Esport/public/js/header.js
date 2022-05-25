console.log("Lancement du programme 'header.js'")

// Changement de fond du header pour la page index.html.twig
const header = document.querySelector('.header_index');

// Quand le scrollY atteint 1100
// On ajoute la class "scroll" qui le rend visible
window.addEventListener('scroll', () => {
    if(window.scrollY > 1100){
        header.classList.add('scroll');
    }

    // Si on repasse sous les 1100, on enlève la classe
    // Le header devient transparent
    if(window.scrollY < 1100){
        header.classList.remove('scroll');
    }
})