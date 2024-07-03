import { getsDataForm, fetchData, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

const urlAg = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAgence.php`;
const urlProv = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurProvince.php`;


//GET AGENCE
fetchData(urlAg, "getAllAg", "GET").then(data => { datasAg(data) });
const showDataAg = (data) => {
    let c = data;
    return( `
            <tr class="tr liste_terrain">
                <td id="${c.codeAg}">${c.codeAg}<td>
                <td>${c.libAg}</td>
                <td>${c.adresseAg}</td>
                <td>${c.telAg}</td>
                <td>${c.nomProvince}</td>
                <td class="action">
                    <div class="tr_hover">
                        <a href="#" ><img src="../../publics/icon/icons8_eye_60px_4.png" ></a>
                        <a href="#" ><img src= "../../publics/icon/icons8_edit_48px_1.png" ></a>
                        <a href="#" ><img src= "../../publics/icon/icons8_trash_can_48px.png" ></a>
                    </div>  
                    <div class="tr_dishover">
                        <a href="#" ><img src= "../../publics/icon/icons8_eye_60px_5.png" ></a>
                        <a href="#" ><img src= "../../publics/icon/icons8_edit_48px_2.png" class="edit_log" ></a>
                        <a href="#" ><img src= "../../publics/icon/icons8_remove_48px_2.png"  class="delete_log" ></a>

                    </div>
                </td>
            </tr>
            
            `); 

}
function datasAg(datas){
    datas.forEach(data => {
        document.getElementById("listeAg").innerHTML += showDataAg(data);
    });
}
//GET AGENCE


//GET PROVINCE
fetchData(urlProv, "getAllProv", "GET").then(data => { datasProv(data) });
const showDataProv = (data) => {
    const c = data;
    return( ` <option value=${c.codeProvince}>${c.nomProvince}</option>`); 
}
function datasProv(datas){
    let nombreAg = 0;
    datas.forEach(data => {
        document.getElementById("codeProvince").innerHTML += showDataProv(data);
        nombreAg++;
    });
    document.getElementById("nombreAgence").innerHTML = nombreAg;

}
//GET PROVINCE


//INSERTION
//FETCH START

document.querySelector("#formAddAg").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputsFields =  e.target.querySelectorAll(".group_input input");
    const inpFileImg =  e.target.querySelectorAll(".group_input_file input");
    const inpSelect =  e.target.querySelector("select");
    
    
    const valid = validField(inputsFields);
    const validP = validPhone(document.querySelector("#formAddAg .tel")) 
    const validPass = validPassword(document.querySelector("#formAddAg .password"));
    
    if ( valid && validP && validPass && inpSelect.value !== "" ) {
    
        let data = getsDataForm(inputsFields, inpFileImg, inpSelect);
        
        fetchData(urlAg, "insertAg", "POST", data ).then(res => {console.log(res);});

    }else{
        
        const alertErreurs = alertErreur(inputsFields);
        console.log("Invalid");
    }


});



