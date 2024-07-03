import {fetchData, getDataForm, validChammps, regexNumber, getsDataForm, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

const urlLog = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurLogement.php`;
const urlTer = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurTerrain.php`
const urlCite = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurCite.php`

let price = document.querySelector('#formAddLog input[name="prixLog"]')


//============== DELETE PRODUIT=====================


//DATA LOGEMENT
fetchData(urlLog, "getAllLog", "GET").then(data => { datasLogement(data) });
const showDataLog = (data) => {
    let c = data;
    let tr = ( `
            <tr class="tr">
                <td class="photo_log">
                    <div>
                        <img src=${c.photoLog !== null ?  c.photoLog:"../../publics/images/1681933872284.jpg" } >
                    </div>
                </td>
                <td>${c.numLog}</td>
                <td>${c.descLog}</td>
                <td>${c.superficieTer}</td>
                <td>${c.prixLog} Km<sup>2</sup></td>
                <td>${c.codeCite, c.libCite}</td>
                <td>${c.Province}</td>
                <td>${c.libAg}</td>
                <td><span class="status delivered">Delivered</span></td>
                <td class="action">
                    <div class="tr_hover">
                        <a href="#"><img src="../../publics/icon/icons8_eye_60px_4.png" ></a>
                        <a href="#"><img src="../../publics/icon/icons8_edit_48px_1.png" ></a>
                        <a href="#"><img src="../../publics/icon/icons8_trash_can_48px.png" ></a>
                    </div>  
                    <div class="tr_dishover">
                        <a href="#"><img src="../../publics/icon/icons8_eye_60px_5.png" ></a>
                        <a href="#"><img src="../../publics/icon/icons8_edit_48px_2.png" class="edit_log" ></a>
                        <a href="#"><img src="../../publics/icon/icons8_remove_48px_2.png"  class="delete_log" ></a>
                    </div>
                </td>
            </tr>
            `); 

    return tr;
}
function datasLogement(datas){
    let nombreLog = 0;
    datas.forEach(data => {
        document.getElementById("listeLogement").innerHTML += showDataLog(data);
        nombreLog++;
        
        document.querySelector(".tr_dishover .edit_log").addEventListener("click", (e)=>{
            console.log(e.target.id);
        });
    });
    document.getElementById("nombreLog").innerHTML = nombreLog;
}
//GET LOGEMENT



//DATA TERRAIN
fetchData(urlTer, "getAllTer", "GET").then(data => { datasTerrrain(data) })
const showDataTer = (data) => {
    const c = data;
    return(` <option value=${c.numTer}>${c.numTer}</option>`); 
}
function datasTerrrain(datas){
    datas.forEach(data => {
        document.getElementById("terrainLog").innerHTML += showDataTer(data);
    });
}
//DATA TERRAIN


//DATA CITE
fetchData(urlCite, "getAllCite", "GET").then(data => { console.log(data); datasCite(data) })
const showDataCite = (data) => {
    const c = data;
    return(` <option value=${c.codeCite}>${c.libCite}</option>`); 
}
function datasCite(datas){
    datas.forEach(data => {
        document.getElementById("citeLog").innerHTML += showDataCite(data);
    });
}
//DATA CITE


price.addEventListener("input", (e)=>{
        if ( !regexNumber(e.target.value) ) {
            styleErrorInput(e.target);
        }
        else if ( regexNumber(e.target.value) ) {
            styleSuccesInput(e.target);
        }
    })

const validPrice = (val) => {
    return regexNumber(val.value);
}


document.querySelector("#formAddLog").addEventListener("submit", (e)=>{
    e.preventDefault();
    const inputsData = e.target.querySelectorAll(".inputData");

    const validLog = validField(inputsData);

    if ( validLog && validPrice(price) ) {
        
        const data = getDataForm( inputsData );
        const res = fetchData(urlLog, "insertLog", "POST", data);
        console.log(res, "bonjour");

    } else {
        validChammps(inputsData)
    }
});