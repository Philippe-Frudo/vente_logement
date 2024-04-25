import { alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

let selectQuery = (variable) =>  document.querySelector(variable);
let selectQueryAll = (variable) =>  document.querySelectorAll(variable);


const url = "http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurClient.php";

//FETCH START
function fetchJSON(url_p, action, methode_p, data_p = {}) {
    const url = `${url_p}?action=${encodeURIComponent(action)}`;
    
    const formData = new FormData();
    for( let [key, val] of Object.entries(data_p) ) {
        formData.append(key, val);
    }

    fetch(url, {
        method: methode_p,
        headers : {"contentType":"application/json"},
        // contentType: false,
        processData: false,
        // body: formData
    })
    .then(res => {
        if (!res.ok) {
            throw new Error("Erreur lors de la requete")
        }
        return res.json();
        
    })
    .then(response => {
        printsClients(response);
        //location.reload();
        return response;
    })
    .catch( e => console.log(e.Error, {cause : e}) );

}


//FETCH START
function fetchJSONPost(url_p, action, methode_p, data_p = {}) {
    const url = `${url_p}?action=${encodeURIComponent(action)}`;
    
    const formData = new FormData();
    for( let [key, val] of Object.entries(data_p) ) {
        formData.append(key, val);
    }

    fetch(url, {
        method: methode_p,
        // headers : {"contentType":"application/json"},
        contentType: false,
        processData: false,
        body: formData
    })
    .then(res => {
        if (!res.ok) {
            throw new Error("Erreur lors de la requete")
        }
        return res;
        
    })
    .then(response => {
        console.log(response);
        //location.reload();
        return response;
    })
    //.catch( e => console.log(e.Error, {cause : e}) );

}
fetchJSON(url, "getAllCli", "POST");

const printClient = (client) => {
    let c = client;
    return( `
                <tr class="tr">
                <td class="photo_log">
                    <div>
                        <img src=${ c.photoCli == null  ? "../../publics/icon/icons8_user.ico": c.photoCli.trim() }> >
                    </div>
                </td>
                <td>${c.nomCli}</td>
                <td>${c.prenomCli}</td>
                <td>${c.CINCli}</td>
                <td>${c.professionCli}</td>
                <td>${c.adrsCli}</td>
                <td>${c.telCli}</td>
                <td><span class="status delivered">Delivered</span></td>
                <td class="action">
                    <div class="tr_hover">
                        <a href="#" id=${c.codeCli} ><img src="../../publics/icon/icons8_eye_60px_4.png" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_edit_48px_1.png" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_trash_can_48px.png" ></a>
                    </div>  
                    <div class="tr_dishover">
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_eye_60px_5.png" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_edit_48px_2.png" class="edit_log" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_remove_48px_2.png"  class="delete_log" ></a>

                    </div>
                </td>
            </tr>
            
            `); 

    document.querySelector(".tr_dishover .edit_log").addEventListener("click", (e)=>{
        console.log(e.target.id);
    });
}

function printsClients(dataClient){
    dataClient.forEach(client => {
        document.getElementById("allClients").innerHTML += printClient(client);
    });
}
//FETCH END


function validPhone(e) {
    return regexPhone(e.value);
}

function validCIN(e) {
    return regexCIN(e.value);
}


// *************VALIDATION DES CHAMPS ***********




const validField = (inputs) => {

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

document.querySelector(".tel").addEventListener("keyup", (e)=>{
    if (regexPhone(e.target.value) == false) { 
        styleErrorInput(e.target); 
    }
    else{ 
        styleSuccesInput(e.target);
    }
});


document.querySelector(".CIN").addEventListener("keyup", (e)=>{
    if (regexCIN(e.target.value) == false) {
        styleErrorInput(e.target); 
    }
    else{ 
        styleSuccesInput(e.target);
    }
});


const getsDataForm = (inputsFields, inpFileImg) => {
    let data = {};
    inputsFields.forEach(input => {
        let inpName = input.name.trim();
        let inpValue = input.value.trim();
        
        data[inpName]= inpValue;
    });

    let inpFileName = inpFileImg[0].name;
    let fileIMG = inpFileImg[0].files[0];
    data[inpFileName]= fileIMG;


    console.log(data);
    return data;

}


document.querySelector("#formAddClient").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputsFields =  e.target.querySelectorAll(".group_input input");
    const inpFileImg =  e.target.querySelectorAll(".group_input_file input");

    const valid = validField(inputsFields);

    console.log(valid, validPhone(document.querySelector("#formAddClient .tel")), validCIN(document.querySelector("#formAddClient .CIN")));
    if ( valid && validPhone(document.querySelector("#formAddClient .tel")) && validCIN(document.querySelector("#formAddClient .CIN"))) {

        let dCli = getsDataForm(inputsFields, inpFileImg);
        fetchJSONPost(url, "insertCli", "POST", dCli );
        // location.reload();

    }else{
        
        const alertErreurs = alertErreur(inputsFields);
        console.log("Invalid");
    }


});


