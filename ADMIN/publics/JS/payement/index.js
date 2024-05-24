import { close  ,validDateLimite ,formAcheter, updateForm ,openWindow  ,createElement, fetchData, getDataForm, validChammps, regexNumber, getsDataForm, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

const urlPay = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurPayement.php`

//DATA LOGEMENT
fetchData(urlPay, "getAllPayer", {}).then(data => { datasPayement(data) });
const openWindowUpdateLog = (id, data) => {
    const c = data;
    if (c.numLog == id) {
        // http://localhost/gestion_vente_logement/ADMIN/publics/images/logements/36e53bed85.png
        document.getElementById("formUpdateLog").innerHTML = `
            <div id="imgChange" class="photo_logement_ajo">
                <div>
                    <img src="${'../'+c.photoLog}">
                </div>
                <div>
                    Télecharger image
                    <input class="inputData" name="photoLog" type="file" placeholder="Clique pour selectionner de photo" value="${'../'+c.photoLog}">
                </div>
            </div>
            <div class="input">
            <div class="group_input">
                <label for="#">Numero</label>
                <input class="inputData" name="numLog" type="text" value="${c.numLog}" disabled>  
            </div>
            <div class="group_input">
                <label for="#">Prix</label>
                <input class="inputData prixLog" name="prixLog" type="text" value="${c.prixLog}">  
            </div>
            </div>
                <div class="group_input">
                    <label for="#">Désription</label>
                    <textarea  rows="5" class="inputData" name="descLog" type="text" placeholder="mesure, nombre de piece, ...">${c.descLog}</textarea>
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

            const inputs = document.querySelectorAll("#fenetreUpdate .inputData");
            const prix = document.querySelector(".prixLog"); 
            // console.log(validPrice(prix));
            
            if ( validField(inputs) ) {
                const data = getsDataForm(inputs);

                fetchData(urlLog, "updateLog", data).then(data => { response(data) });  
                function response(res) {
                    if (res) {
                        msgSucces(`Logement N: ${id} est modifie`);
                        setTimeout(function () {location.reload() }, 1500)

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

    let img = createElement("img", { src: c.photoLog !== null ?  "../"+c.photoLog:"../../publics/images/1681933872284.jpg" });
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
    
    let tdAcheter = createElement("td", {class: "tdAcheter", id: c.numLog }, "");
    let btnAcheter = createElement("button", {class: "acheter td_action", id: c.numLog, 
            style: "border: none; outline: none; padding: 0.5rem; background: #2a2185; cursor: pointer; color: #fff;"},  "Acheter");
    tdAcheter.append(btnAcheter)
    
    
    let update = createElement("td", {id: c.numLog}, "");
    let imgUpdate = createElement("img", {src:"../../publics/icon/icons8_edit_48px_1.png", 
    class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
    , "");
    update.append(imgUpdate);
    

    let supp = createElement("td", {id: c.numLog}, "");
    let imgSupp = createElement("img", {src:"../../publics/icon/icons8_trash_can_48px.png", 
    class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
    , "");
    supp.append(imgSupp);

    let tr = createElement("tr", {class: "tr"},  "");

    imgUpdate.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        openWindowUpdateLog(id, c);
        openWindow(updateForm);
    });

    supp.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        const data = {"numLog":id}

        if ( confirm(`Confirmez-vous la suppression du logement N: ${id}`) ) {

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

    btnAcheter.addEventListener("click", (e)=>{
        const id = e.target.id
        openWindowUpdateLog(id, c);
        openWindow(formAcheter);
        document.getElementById("getIdLog").value = id;
    })

    tr.append(tdImg);
    tr.append(num);
    tr.append(desc);
    tr.append(superficie);
    tr.append(prix);
    tr.append(cite);
    tr.append(province);
    tr.append(libele);
    tr.append(tdAcheter);
    tr.append(update);
    tr.append(supp);

    document.getElementById("listeLogement").append(tr);
}
function datasPayement(datas){
    let nombreLog = 0;
    datas.forEach(data => {
        showDataLog(data);
        nombreLog++;
    });
    document.getElementById("nombreLog").innerHTML = nombreLog;
}
//GET LOGEMENT
