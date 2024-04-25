import { alertErreur, regexNumber, styleErrorInput, styleSuccesInput } from "../default/functions.js";

const urlTer = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurTerrain.php`;
const urlProv = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurProvince.php
`
//FETCH START
function fetchJSON(url_p, action, methode_p, data_p = {}) {
    const url = `${url_p}?action=${encodeURIComponent(action)}`;
    
    // const formData = new FormData();
    // for( let [key, val] of Object.entries(data_p) ) {
    //     formData.append(key, val);
    // }

    fetch(url, {
        method: methode_p,
        headers : {"contentType":"application/json"},
        // contentType: false,
        processData: false
        // body: formData
    })
    .then(res => {
        if (!res.ok) {
            throw new Error("Erreur lors de la requete")
        }
        return res.json();
        
    })
    .then(response => {
        console.log(response);
        printsDatas(response);
        //location.reload();
        return response;
    })
    //.catch( e => console.log(e.Error, {cause : e}) );

}

fetchJSON(urlTer, "getAllTer", "POST");

// fetchJSON(urlProv, "getAllProv", "POST");

const printClient = (data) => {
    let c = data;
    return( `
                <tr class="tr liste_terrain">
                                <td><span class="status delivered">${c.numTer}</span></td>
                                <td><span class="status delivered">${c.superficieTer}</span></td>
                                <td class="action">
                                    <div class="tr_hover">
                                    <a href="#" id=${c.numTer} ><img src="../../publics/icon/icons8_eye_60px_4.png" ></a>
                                    <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_edit_48px_1.png" ></a>
                                    <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_trash_can_48px.png" ></a>
                                    </div>  
                                    <div class="tr_dishover">
                                        <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_eye_60px_5.png" ></a>
                                        <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_edit_48px_2.png" class="edit_log" ></a>
                                        <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_remove_48px_2.png"  class="delete_log" ></a>
                
                                    </div>
                                </td>
                            </tr>
            
            `); 

    document.querySelector(".tr_dishover .edit_log").addEventListener("click", (e)=>{
        console.log(e.target.id);
    });
}

function printsDatas(dataClient){
    dataClient.forEach(client => {
        document.getElementById("liste_terrain").innerHTML += printClient(client);
    });
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

const getsDataForm = (inputsFields, inpFileImg) => {
    const data = {};
    inputsFields.forEach(input => {

        let inpName = input.name.trim();
        let inpValue = input.value.trim();
        
        if(input.type !== "file"){
            data[inpName]= inpValue;
        }    
        else if(input.type == "file"){
            let inpFileName = inpFileImg[0].name;
            let fileIMG = inpFileImg[0].files[0];
            data[inpFileName]= fileIMG;
        }    
    });    

    // console.log(data);
    return data;

}


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

const validSuper = (v)=>{
    return regexNumber(v);
}


document.querySelector("#formAddTer").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputsFields =  e.target.querySelectorAll(" input");
    const superficie =  e.target.querySelector('input[name="superficieTer"]').value;
    const inpFileImg =  e.target.querySelectorAll(".group_input_file input");

    const valid = validField(inputsFields);

    if ( valid && validSuper()) {

        let d = getsDataForm(inputsFields, inpFileImg);
        // console.log(d);
        fetchJSONPost(urlTer, "insertTer", "POST", d );
        // location.reload();

    }else{
        
        const alertErreurs = alertErreur(inputsFields);
        console.log("Invalid");
    }


});
//FETCH END

document.querySelector(".superficieTer").addEventListener("keyup", (e)=>{
        if (regexNumber(e.target.value) == false) { 
            styleErrorInput(e.target);
        }
        else{ 
            styleSuccesInput(e.target);
        }
});

document.querySelector(".paragraphe .close").addEventListener("click", (e)=>{
    if (e.target == "IMG") {
        e.target.querySelector("img")
    }
    const m = e.target;
    console.log(e.target);
});





// var cartShopBox = document.createElement("div");
// cartShopBox.classList.add("card-box");

// var tableHead = document.querySelector(".formulaire table tbody");


// var cartBoxContent = `
//                         <tr>
//                             <td>
//                                 <div>
//                                     <img src="../../icon/icons8_menu_rounded_100px.png">
//                                 </div>
//                             </td>
//                             <td>
//                                 <div>
//                                     <input type="text">
//                                 </div>
//                             </td>
//                             <td>
//                                 <div class="cart_remove">
//                                     <img src="../../icon/icons8_delete_60px.png">
//                                 </div>
//                             </td>
//                         </tr>
//                     `;
//     cartShopBox = cartBoxContent.innerHTML;

// var creer_terr = document.querySelector(".creer_terr");
//     creer_terr.addEventListener("click", ()=>{
//         console.log("CLICK");
//         tableHead.innerHTML += cartBoxContent;
// })

// var button = document.querySelector(".cart_remove");
// button.addEventListener("click", ()=>{
//     console.log("MOVE");
// })