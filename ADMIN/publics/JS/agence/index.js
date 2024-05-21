import { updateForm ,openWindow ,createElement ,msgSucces ,getsDataForm, fetchData, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

const urlAg = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAgence.php`;
const urlProv = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurProvince.php`;


//GET PROVINCE
fetchData(urlProv, "getAllProv", "GET").then(data => { datasProv(data) });
const showDataProv = (data) => {
    const c = data;
    return( `<option value=${c.codeProvince}>${c.nomProvince}</option>`); 
}
function datasProv(datas){
    datas.forEach(data => {
        document.getElementById("codeProvince").innerHTML += showDataProv(data);
    });

}
//GET PROVINCE




const openWindowUpdate = (id, data)=>{
    const c = data
    if(c.codeAg == id){
    document.getElementById("formUpdateAg").innerHTML = `
        <div class="group_input">
            <label for="">Code</label>
            <input class="inputData" name="codeAg" type="text" value="${c.codeAg}" disabled>
        </div>
        <div class="group_select">
            <div class="element_select">
                <span>Province</span>
                <select class="inputData" name="codeProvAg" id="codeProvince">
                    <option value="${c.codeProvince}">${c.nomProvince}</option>
                    <option value="${c.codeProvince}">${c.nomProvince}</option>
                    <option value="${c.codeProvince}">${c.nomProvince}</option>
                </select>
            </div>
            <div>
                <p></p>
            </div>
        </div>
        <div class="group_input">
            <label for="">Libelle</label>
            <input class="inputData" name="libAg" type="text" value="${c.libAg}">
        </div>
        <div class="group_input">
            <label for="">Adresse</label>
            <input class="inputData" name="adrsAg" type="text" value="${c.adresseAg}">
        </div>
        <div class="group_input">
            <label for="">Telephone</label>
            <input id="tel" class="inputData tel" name="telAg" type="text" value="${c.telAg}">
        </div>
        <div class="group_input">
            <label for="">Mot de passe</label>
            <input id="password" class="inputData password" name="passwordAg" type="password" value="${c.passwordAg}">
        </div>
        <div class="button_ajout_log">
            <button type="reset">Annuler</button>
            <button class="modifier" type="submit" class="creer_terr">Créer</button>
        </div>
        `

        document.querySelector(".modifier").addEventListener("click", (e)=>{
            e.preventDefault();
            const inputs = document.querySelectorAll("#fenetreUpdate .inputData");
            
            let tel = document.querySelector("#fenetreUpdate #tel");
            let passw = document.querySelector("#fenetreUpdate #password");

            if ( validField(inputs) && validPassword(passw) && validPhone(tel)) {
                const data = getsDataForm(inputs);
                
                fetchData(urlAg, "updateAg", data).then(res => { response(res) });  
                function response(res) {
                    if (res) {
                        msgSucces(`Agence N: ${id} est modifie`);
                        setTimeout(function () {location.reload() }, 1500);
                    }else{
                    msgError(`Verifier l'erreur`);
                    }
                }       
            }else{
                alertErreur(inputs);
            }
        })

        // document.querySelector('.tel').addEventListener("input", (e)=>{ 
        //     console.log("input");
        //     tel(e.target);
        // })
        
        // document.querySelector('.password').addEventListener("input", (e)=>{ 
        //     console.log("input");
        //     tel(e.target);
        // })

    }

}



//GET AGENCE
fetchData(urlAg, "getAllAg", {}).then(data => { datasAg(data) });
const showDataAg = (data) => {

    let codeAg = createElement("td", {id: data.codeAg },  data.codeAg );
    let libAg = createElement("td", {},  data.libAg);
    let adresseAg = createElement("td", {},  data.adresseAg);
    let telAg = createElement("td", {},  data.telAg);
    let nomProvince = createElement("td", {},  data.nomProvince);
    let tr = createElement("tr", {class: "tr"},  "");

    let update = createElement("td", {id: data.codeAg }, "");
    let imgUpdate = createElement("img", {src:"../../publics/icon/icons8_edit_48px_1.png", 
        class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
        , "");
    update.append(imgUpdate);

    imgUpdate.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        openWindowUpdate(id, data);
        openWindow(updateForm);
    });


    let supp = createElement("td", {id: data.codeAg }, "");
    let imgSupp = createElement("img", {src:"../../publics/icon/icons8_trash_can_48px.png", 
        class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
        , "");
    supp.append(imgSupp);

    supp.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        const data = {"codeAg":id}

        if ( confirm(`Confirmez-vous la suppression d'Agence N: ${id}`) ) {

            fetchData(urlAg, "deleteAg", data).then(res => { response(res)} );

            function response(res) {
                if (res) {
                    msgSucces(`Agent N: ${id} a supprime`);
                    setTimeout(function () {location.reload() }, 1500)
                }else{
                    msgError(`Verifier l'erreur`);
                    setTimeout(function () {location.reload() }, 1500)
                }
            }
        }
    });
    tr.append(codeAg);
    tr.append(libAg);
    tr.append(adresseAg);
    tr.append(telAg);
    tr.append(nomProvince);
    tr.append(update);
    tr.append(supp);
    
    document.getElementById("listeAg").append(tr);
}

function datasAg(datas){
    let nombreAg = 0;
    datas.forEach(data => {
        showDataAg(data);
        nombreAg++;
    });
    document.getElementById("nombreAgence").innerHTML = nombreAg;
}
//GET AGENCE


const phone = document.querySelector("#formAddAg .tel");
const passw = document.querySelector("#formAddAg .password");

phone.addEventListener("input", (e)=>{
    if ( !validPhone(e.target) ) {
        styleErrorInput(e.target)
    }else{
        styleSuccesInput(e.target)
    }
})
passw.addEventListener("input", (e)=>{
    if ( !validPassword(e.target) ) {
        styleErrorInput(e.target)
    }else{
        styleSuccesInput(e.target)
    }
})


document.querySelector("#formAddAg").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputsData =  e.target.querySelectorAll(".inputData");
    const valid = validField(inputsData);

    if ( valid && validPhone(phone)  && validPassword(passw) ) {
        const data = getsDataForm(inputsData);
        
        fetchData(urlAg, "insertAg", data ).then(res => { response(res)} );
        function response(res) {
            if (res) {
                msgSucces(`Un nouveau agence enregistre`);
                setTimeout(function () { location.reload() }, 1500)
            }else{
                msgError(`Verifier l'erreur`);
            }
        }
    }else{
        alertErreur(inputsData);
    }


});



