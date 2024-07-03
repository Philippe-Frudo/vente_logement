let ElInput = document.getElementsByClassName("input");
let fieldests = document.querySelector(".fieldset");
let legends = document.querySelector(".legend");


for(i=0; i < ElInput.length; i++){
    Inputs = ElInput[i];
    button = fieldests[i];
    texte = legends[i];
    Inputs.addEventListener("focus", focuse);
    Inputs.addEventListener("blur", blure);
}

function focuse(){
    button.style.border="2px solid blue";
    legends.style.color="blue";
}

function blure(){
    button.style.border="2px solid gray";
    texte.style.color="black";
}