export function fetchJSON(url_p, action, methode_p, data_p = {}) {
    let url = `${url_p}?action=${encodeURIComponent(action)}`;
    
    const formData = new FormData();
    for( let [key, val] of Object.entries(data_p) ) {
        formData.append(key, val);
    }

    fetch(url, {
        method: methode_p,
        headers : {"contentType":"application/json"},
        // contentType: false,
        processData: false,
        body: formData
    })
    .then(res => {
        if (!res.ok) {
            throw new Error("Erreur lors de la requete")
        }
        return res.json();
        
    })
    .then(response => {
        console.log(response);
        //location.reload();
        return response;
    })
    .catch( e => console.log(e.Error, {cause : e}) );

}




export function styleErrorInput(val){
    val.style.border = "1px solid red";

}


export function styleSuccesInput(val){
    val.style.border = "1px solid green";
}


export function styleAllinputsNormal(k){
    const inps = document.querySelectorAll(k)
    inps.forEach(inp =>{
            inp.style.border = "0 solid black";
    })
}


//ALERT D'ENVOYE
export function alertSucces(el, msg) {
    el.innerHTML = msg;
    el.style.display= "block"
    el.style.background= "rgb(64, 156, 52, 0.7)";
    setTimeout(function () {el.style.display= "none"; el.innerHTML = ""; }, 1000)
}

export function alertError(el, msg) {
    el.innerHTML = msg;
    el.style.display= "block"
    setTimeout(function () { el.style.display= "none"; el.innerHTML = ""; }, 1000)
}

export function alertInput(val){
    val.style.border = "1px solid red";
}


export function alertChamps(champs){
    document.querySelectorAll(champs).forEach(inp =>{
            if(inp.value.trim() == '') {
                styleErrorInput(inp);
            }
            else{
                styleSuccesInput(inp);
            }
    })
}



//REGEX
export const regexEmail = (email)=>{
    // const regex /^[\w-\.]+@([\w-]+\.)]+[\w-]{2,4}$/.test(email);
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

export const regexPassword = (code)=>{
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/;
    return regex.test(code);
}


export const regexPhone = (phone)=>{
    const regex = /^(034|038|032|033)\d{7}$/;
    return regex.test(phone);
}

export const regexCIN = (phone)=>{
    const regex = /^\d{12}$/;
    return regex.test(phone);
}
export const regexNumber = (num)=>{
    const regex = /^\d{1,10}$/;
    return regex.test(num);
}


function inputNormal(val){
    val.style.border = "1px solid black";
}

function inputsKeyup(k){
    const inps = document.querySelectorAll(k)
    inps.forEach(inp =>{
         inp.addEventListener("keypress", (inp) =>{
            inputNormal(inp);
        })
    })
}

export const alertErreur = (inputs) => {
 
    for (let i = 0; i < inputs.length; i++) {
        let nameClass = inputs[i].name;
        let value = inputs[i].value.trim();
        let clas = inputs[i].className;
        if(value == "" &&  nameClass !== "prenomCli"){
            styleErrorInput(inputs[i]);

        }else if(value !== "" && nameClass !== "prenomCli"){
          
                if(clas == "tel" && regexPhone(value) == false){
                    styleErrorInput(inputs[i]);
                }

                else if(clas == "email" && regexEmail(value) == false){
                    styleErrorInput(inputs[i]);
                }

                else if(clas == "CIN" && regexCIN(value) == false){
                    styleErrorInput(inputs[i]);
                }

                else if(clas == "password" && regexPassword(value) == false){
                    styleErrorInput(inputs[i]);

                }else if(clas == "password" && regexPassword(value) == false){
                    styleErrorInput(inputs[i]);

                }else{
                    styleSuccesInput(inputs[i]);
                }
        }
    }
    
}



// document.querySelector(".email").addEventListener("keyup", (e)=>{
//         if (regexEmail(e.target.value) == false) { 
//             styleErrorInput(e.target); 
//         }
//         else{ 
//             styleSuccesInput(e.target);
//         }
// });


// document.querySelector(".password").addEventListener("keyup", (e)=>{
//         if (regexPassword(e.target.value) == false) { 
//             styleErrorInput(e.target); 
//         }
//         else{ 
//             styleSuccesInput(e.target);
//         }
// });







// document.querySelector("#deconnexion").addEventListener("click", (e)=>{
//     window.location.href = "http://localhost/gestion_vente_logement/ADMIN/vues/login/index.php";
// })
