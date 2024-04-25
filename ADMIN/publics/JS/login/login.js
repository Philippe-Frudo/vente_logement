let Input1 = document.querySelector(".input1");
let Fieldest1 = document.querySelector(".fieldset1");
let Legend1 = document.querySelector(".legend1");

Input1.addEventListener("focus", ()=>{
    console.log("focus");
    Fieldest1.style.border="2px solid blue";
    Legend1.style.color="blue";
})

Input1.addEventListener("blur", ()=>{
    console.log("blur");
    Fieldest1.style.border="2px solid gray";
    Legend1.style.color="black";
})

let Input2 = document.querySelector(".input2");
let Fieldest2 = document.querySelector(".fieldset2");
let Legend2 = document.querySelector(".legend2");

Input2.addEventListener("focus", ()=>{
    console.log("focus");
    Fieldest2.style.border="2px solid blue";
    Legend2.style.color="blue";
})
Input2.addEventListener("blur", ()=>{
    console.log("blur");
    Fieldest2.style.border="2px solid gray";
    Legend2.style.color="black";
})