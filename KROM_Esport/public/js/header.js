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


const carousel = ["img/header/carousel/911_RSR_shooting_13.webp", "img/header/carousel/BMW_M_Hybrid_6.webp", "img/header/carousel/M4GT3_2209222258.webp", "img/header/carousel/VRC_Spa_1.webp"];
let num = 0;
const img = document.getElementById("img_header_pc");
const background = document.getElementById("background_header_index");

function ChangeSlide() {
    if (navigator.userAgent.includes("Firefox")){}

    else{
        num = num + 1;
        if (num < 0)
            num = carousel.length - 1;
        if (num > 3)
            num = 0;

        img.src = carousel[num];
        background.style.backgroundImage = 'url(' + carousel[num] + ')';
    }
}

setInterval("ChangeSlide()", 5000);


function deleteBackground(){
    if("matchMedia" in window) {
        if(window.matchMedia("(min-width:1000px)").matches) {}
        else{
            background.style.removeProperty('background-image');
            console.log('Téléphone');
        }
    }
}

background.addEventListener("load", deleteBackground());