const addForm = document.querySelector(".fenetre_modale_ajout_log");
export const updateForm = document.querySelector("#fenetreUpdate");

const btnOpenWindow = document.querySelector(".btn");
const btnCloseWindow = document.querySelectorAll(".close");

const message = document.querySelector("#contentMessage");
const imgChange = document.querySelector("#imgChange img");
const getFile = document.querySelector("form input[type='file']");


export function openWindow(form) {
    form.classList.add("ajout");
}

export function closeWindow(form) {
    form.classList.remove("ajout");
}

btnOpenWindow.addEventListener("click" , ()=>{
    openWindow(addForm);
});


btnCloseWindow.forEach(btn =>{
    btn.addEventListener("click" , ()=>{
        closeWindow(addForm);
        closeWindow(updateForm);
        document.querySelector("form").reset();
    });
})

export function clearInputs(){
    document.querySelectorAll("form .inpData").forEach(inp =>{
        inp.style.borderColor = "#000";
    });
}


export const srcChange = (inptut)=>{
    imgChange.src = URL.createObjectURL(inptut.files[0]);
}

getFile.addEventListener("change", (e)=>{
    srcChange(e.target)
});

// document.querySelector('form .reset').addEventListener("click", ()=>{ 
//     clearInputs();
//     alert()
// })


export function fetchData(url_p, action, data_p = {}) {
    
    const url = `${url_p}?action=${encodeURIComponent(action)}`;

    const formData = new FormData();
    for( let [key, val] of Object.entries(data_p) ) {
        formData.append(key, val);
    }
    return fetch(url, {
            method: "POST",
            contentType:false,
            processData: false,
            body: formData
        }).then(res => {
            if (!res.ok) { 
                throw new Error("Erreur lors de la requete") 
            }
            return res.json(); 

        }).then(response => {
            console.log(response);
            return response
        })
        // .catch(error => {
        //     console.log(error);
        // })
}

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

export const validChammps = (inpData) => {
    inpData.forEach(ip => {
        let ipAttrName = ip.name;
        let ipValue = ip.value;
        let ipType = ip.type

        if( ipAttrName == "prixLog"  && ipValue.trim() !== "" ){
            if ( !regexNumber(ipValue) ) {
                console.log(ip.name);
                styleErrorInput(ip);
            }
        }
        else if( ipValue.trim() == "" ){
            styleErrorInput(ip);
        }
        else if( ipValue.trim() !== "" ){
            styleSuccesInput(ip);
        }

    })
}


export const getDataForm = (inpData) => {
    const data = {}
    inpData.forEach(ip => {
        let ipAttrName = ip.name;
        let ipValue = ip.value;
        let ipType = ip.type

        if(ipType == "file"){
            let file = ip.files[0];
            data[ipAttrName] = file;
            console.log(file);
        }
        data[ipAttrName] = ipValue;

    });
    console.log(data);
    return data;
}


export const validField = (inputs) => {

    for (let i = 0; i < inputs.length; i++) {
        let nameClass = inputs[i].name;
        let value = inputs[i].value;

        if(nameClass !== "prenomCli"){
            if (value.trim() == "") {
                return false;
            } 
        }
    }
    return true
    
}


//VALIDATION DES CHAMPS PARTICULIER 
export function validPhone(e) {
    return regexPhone(e.value);
}

export function validPassword(e) {
    return regexPassword(e.value);
}

export function validCIN(e) {
    return regexCIN(e.value);
}




//RECUPERER DONNE DANS LE CHAMPS 
export const getsDataForm = (inputs) => {
    const data = {};
    inputs.forEach(input => {

        let inpName = input.name.trim();
        let inpValue = input.value.trim();
        
        if(input.type == "text"){
            data[inpName]= inpValue;
        }    
        else if(input.type == "radio"){
            if (input.checked == true) {
                data[inpName]= inpValue;
            }
        }   
        else if(input.type == "file"){
            // let inpNameFile = input.name;
            let fileIMG = input.files[0];
            console.log(fileIMG);
            data[inpName]= fileIMG;
        }    
    }); 
    
    // if(inpSelect !== ""){
    //     data[inpSelect.name]= inpSelect.value;
    // }

    console.log(data);
    return data;

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
export function msgSucces(msg) {
    message.innerHTML = msg;
    message.style.display= "block"
    message.style.background= "rgb(64, 156, 52, 0.7)";
    setTimeout(function () {message.style.display= "none"; message.innerHTML = ""; }, 2000)
}

export function msgError(msg) {
    message.innerHTML = msg;
    message.style.display= "block"
    setTimeout(function () { message.style.display= "none"; message.innerHTML = ""; }, 2000)
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
        let id = inputs[i].id;
        //console.log(clas);

       if(value !== "" && nameClass !== "prenomCli"){
          
                if(id == "tel" && regexPhone(value) == false){
                    styleErrorInput(inputs[i]);
                }

                else if(id == "email" && regexEmail(value) == false){
                    styleErrorInput(inputs[i]);
                }

                else if(id == "CIN" && regexCIN(value) == false){
                    styleErrorInput(inputs[i]);
                }
                else if(id == "password" && regexPassword(value) == false){
                    styleErrorInput(inputs[i]);
                }
                else{
                    styleSuccesInput(inputs[i]);
                }
        } 
        else if( value == "" &&  nameClass !== "prenomCli"){
            styleErrorInput(inputs[i]);
        }
        // else{
        //     styleSuccesInput(inputs[i]);
        // }
    }
    
}




// document.querySelector("#deconnexion").addEventListener("click", (e)=>{
//     window.location.href = "http://localhost/gestion_vente_logement/ADMIN/vues/login/index.php";
// })
