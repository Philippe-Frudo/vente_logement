//OUVRIR NAVBAR AJOUTER ET CLOSE



//===========================================

let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.addEventListener('click', ()=>{
    navigation.classList.toggle('active');
    main.classList.toggle('active');
})


// HOVER TABLEAU
var hovered = document.querySelectorAll(".tr");

function activeLink(){
    hovered.forEach((item) =>{
        item.classList.remove('hovered');
    })
    this.classList.add('hovered');
}

hovered.forEach((item)=>item.addEventListener('mouseover', activeLink));