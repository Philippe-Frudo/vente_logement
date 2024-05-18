import { msgSucces, srcChange, updateForm ,openWindow  ,createElement, fetchData, getDataForm, validChammps, regexNumber, getsDataForm, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

const urlLog = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurLogement.php`;
const urlTer = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurTerrain.php`
const urlCite = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurCite.php`

let price = document.querySelector('#formAddLog input[name="prixLog"]')


//============== DELETE PRODUIT=====================

//DELETE produits
    // var Delete_prod = document.querySelector(".delete_log");
    // var FenModales = document.querySelector(".confirmater_supp_pro");
    // var cancel = document.querySelector(".anul_del");

    // // console.log(BtnEditCom)
    // for(var i = 0; i<Delete_prod.length;i++){
    //     var button = Delete_prod[i];
    //     var FenModale = FenModales[i];
    //     // var Cancel = cancel[i];
    //     button.addEventListener('click' , DeleteProduits);
    //     cancel.addEventListener('click', AnnulerDel);
    // }

    // //Afficher ajustement produits
    // function DeleteProduits(){
    //     FenModale.classList.add("active");
    // }

    // function AnnulerDel(){
    //     FenModale.classList.remove("active");
    // }



//DATA LOGEMENT
fetchData(urlLog, "getAllLog", "GET").then(data => { datasLogement(data) });

const openWindowUpdateLog = (id, data) => {
    const c = data;
    if (c.numLog == id) {
        document.getElementById("formUpdateLog").innerHTML = `
            <div id="imgChange" class="photo_logement_ajo">
                <div>
                    <img src="../${c.photoLog}">
                </div>
                <div>
                    Télecharger image
                    <input class="inputData" name="photoLog" type="file" placeholder="Clique pour selectionner de photo" value="${c.photoLog}">
                </div>
            </div>
            <div class="input">
                <div class="group_input">
                    <label for="#">Prix</label>
                    <input class="inputData prixLog" name="prixLog" type="text" value="${c.prixLog}">  
                </div>
                </div>
                <div class="group_input">
                    <label for="#">Désription</label>
                    <textarea  rows="5" class="inputData" name="descLog" type="text" value="${c.descLog}" placeholder="mesure, nombre de piece, ..."></textarea>
                </div>
            </div>
            <div class="button_ajout_log">
                <button type="reset" class="reset">Annuler</button>
                <button type="submit" class="modifier">Modifier</button>
            </div>
        `  
        document.querySelector("form input[type='file']").addEventListener("change", (e)=>{
            alert()
            srcChange(e.target);
        })

        document.querySelector(".modifier").addEventListener("click", (e)=>{
            e.preventDefault();

            const inputs = document.querySelectorAll("#fenetreUpdate .inpData");
            let prix = document.querySelector(".prixLog"); 

            if ( validField(inputs) && validPrice(prix) ) {
                const data = getsDataForm(inputs);
                fetchData(urlLog, "updateLog", data).then(data => { res(data) });  
                function res(res) {
                    if (res) {
                        msgSucces(`Logement N: ${id} est modifie`);
                        setTimeout(function () {location.reload() }, 2000)

                    }else{
                       msgError(`Erreur lors de la requete`);
                    }
                }       
            }else{
                alertErreur(inputs);
            }
        })

    }

};


const showDataLog = (data) => {
    const c = data;

    let img = createElement("img", { src: c.photoLog !== null ?  c.photoLog:"../../publics/images/1681933872284.jpg" });
    let divImg = createElement("div", {}, '');
    let tdImg = createElement("td", {class: "photo_log"}, '');
    tdImg.appendChild(divImg).appendChild(img);

    let num = createElement("td", {},  c.numLog);
    let desc = createElement("td", {},  c.descLog);
    let superficie = createElement("td", {},  c.superficieTer);
    let prix = createElement("td", {},  c.prixLog);
    let cite = createElement("td", {},  (c.codeCite, c.libCite));
    let province = createElement("td", {},  c.Province);
    let libele = createElement("td", {},  c.libAg);
    let tr = createElement("tr", {class: "tr"},  "");

    let update = createElement("td", {id: c.numLog}, "");
    let imgUpdate = createElement("img", {src:"../../publics/icon/icons8_edit_48px_1.png", 
        class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
        , "");
    update.append(imgUpdate);

    imgUpdate.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        openWindowUpdateLog(id, c);
        openWindow(updateForm);
    });

    let supp = createElement("td", {id: c.numLog}, "");
    let imgSupp = createElement("img", {src:"../../publics/icon/icons8_trash_can_48px.png", 
        class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
        , "");
    supp.append(imgSupp);

    supp.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        const data = {"numLog":id}

        if ( confirm(`Confirmez-vous la suppression de c N: ${id}`) ) {

            fetchData(urlLog, "deleteLog", data).then(res => {result(res)});

            function result(res) {
                if (res) {
                    msgSucces(`Logement N: ${id} a supprime`);
                    setTimeout(function () {location.reload() }, 1500)
                }else{
                    msgError(`Verifier l'erreur`);
                }
            }
        }

    });

    tr.append(tdImg);
    tr.append(num);
    tr.append(desc);
    tr.append(superficie);
    tr.append(prix);
    tr.append(cite);
    tr.append(province);
    tr.append(libele);
    tr.append(update);
    tr.append(supp);

    document.getElementById("listeLogement").append(tr);
}
function datasLogement(datas){
    let nombreLog = 0;
    datas.forEach(data => {
        showDataLog(data);
        nombreLog++;
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
        const data = getsDataForm( inputsData );
        fetchData(urlLog, "insertLog", "POST", data).then(res => response(res));
        function response(res) {
            if (res) {
                msgSucces(`Ajout logement succes`);
                setTimeout(function () {location.reload() }, 2000)

            }else{
               msgError(`Erreur lors de la requete`);
            }
        }       

    } else {
        validChammps(inputsData)
    }
})


