let ElInput = document.getElementsByClassName("input");
let fieldests = document.querySelector(".fieldset");
let legends = document.querySelector(".legend");


for(i=0; i < ElInput.length; i++){
    Inputs = ElInput[i];
    button = fieldests[i];
    texte = legends[i];
    console.log(Inputs , i);
    // legendEl = document.getElementsByClassName("legend")[i];
    Inputs.addEventListener("focus", focuse);
    Inputs.addEventListener("blur", blure);
}


function focuse(){
    console.log("focus", i);
    button.style.border="2px solid blue";
    legends.style.color="blue";
}

function blure(){
    console.log("blur");
    button.style.border="2px solid gray";
    texte.style.color="black";
}