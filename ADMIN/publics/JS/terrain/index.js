import { openWindow ,createElement ,addForm ,validField ,getsDataForm ,msgSucces ,fetchData ,alertErreur, regexNumber, styleErrorInput, styleSuccesInput } from "../default/functions.js";

const urlTer = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurTerrain.php`;
const urlProv = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurProvince.php`

//FETCH START

const openWindowUpdate = (id, c) => {
    if (id == c.numTer) {
        document.getElementById("formUpdateTer").innerHTML = `
        <div class="hiddene">
            <table>
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Superficie en km<sup>2</sup></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <img src=<?php echo FOLDER_ICON . "icons8_menu_rounded_100px.png"; ?> >
                            </div>
                        </td>
                        <td>
                            <div>
                                <input class="inpData" name="numTer" type="text" placeholder="Numero terrain" ${c.numTer}>
                            </div>
                        </td>
                        <td>
                            <div class="cart_remove">
                                <img src=<?php echo FOLDER_ICON . "icons8_delete_60px.png"; ?> >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <img src=<?php echo FOLDER_ICON . "icons8_menu_rounded_100px.png"; ?> >
                            </div>
                        </td>
                        <td>
                            <div>
                                <input class=" inpData superficieTer" name="superficieTer" type="text" placeholder="Spurficie du terrain en m2" value="${c.superficieTer}">
                            </div>
                        </td>
                        <td>
                            <div class="cart_remove">
                                <img src=<?php echo FOLDER_ICON . "icons8_delete_60px.png"; ?> >
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>
                </div>
                <div class="button_ajout_log">
                    <button type="reset">Annuler</button>
                    <button type="submit" class="modifier creer_terr">Créer</button>
                </div>
        `
    }
    document.querySelector(".modifier").addEventListener("click", (e)=>{
        e.preventDefault();
        const inputs = document.querySelectorAll("#fenetreUpdateTer .inpData");

        if ( validField(inputs) ) {
            const data = getsDataForm(inputs); 
            fetchData(urlTer, "updateTer", data).then(res => { response(res) });  
            function response(res) {
                if (res) {
                    msgSucces(`Terrain N: ${id} est modifie`);
                    setTimeout(function () {location.reload() }, 1500);
                }else{
                msgError(`Verifier l'erreur`);
                }
            }       
        }else{
            alertErreur(inputs);
        }
    })
}

fetchData(urlTer, "getAllTer", {}).then(data =>{ dataTerrains(data) });
const showDataTer = (data) => {
    let c = data;

    let numTer = createElement("td", {},  c.numTer);
    let superficieTer = createElement("td", {}, c.superficieTer );

    let nouveau = createElement("td", {id: c.numTer}, "");
    let img = createElement("img", {src:"../../publics/icon/icons8_edit_48px_1.png", 
    class:"td_action btn", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}, "");
    nouveau.append(img);
    
    img.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        console.log(id);
        openWindowUpdate(id, data);
        openWindow(addForm);
    });

    let supp = createElement("td", {id: c.numTer}, "");
    let imgSupp = createElement("img", {src:"../../publics/icon/icons8_trash_can_48px.png", 
    class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
    , "");
    supp.append(imgSupp);

    let btnImprimer = createElement("button", {id: c.numTer, class:"td_action",
        style: "border: none; outline: none; padding: 0.5rem; background: #2a2185; cursor: pointer; color: #fff; display:none;"}, "Facture");
    let tdImprimer = createElement("td", {id: c.numLog }, "");
    tdImprimer.append(btnImprimer);

    let tr = createElement("tr", { class:"tr" },  "");

    supp.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        const data = {"numTer":id}

        if ( confirm(`Confirmez-vous la suppression du terrain N: ${id}`) ) {

            fetchData(urlTer, "deleteTer", data).then(res => {response(res)});

            function response(res) {
                if (res) {
                    msgSucces(`Terrain N: ${id} a supprime`);
                    setTimeout(function () {location.reload() }, 1500)
                }else{
                    msgError(`Verifier l'erreur`);
                }
            }
        }
    });

    tr.append(numTer);
    tr.append(superficieTer);
    tr.append(nouveau);
    tr.append(supp);

    document.getElementById("liste_terrain").append(tr);

}
function dataTerrains(datas) {
    let nombreTer = 0;
    datas.forEach(data => {
        showDataTer(data);
        nombreTer++;
    });
    document.getElementById("nombreTer").innerHTML = nombreTer;
}

const validSuper = (v)=>{
    return regexNumber(v.value);
}

document.querySelector("#formAddTer").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputsFields =  e.target.querySelectorAll(".inpData");
    const superficie =  e.target.querySelector('input[name="superficieTer"]');
    const inpFileImg =  e.target.querySelectorAll(".group_input_file input");

    if ( validField(inputsFields) && validSuper(superficie) ) {
        const data = getsDataForm(inputsFields);
        fetchData(urlTer, "insertTer", data ).then(res => response(res));
        function response(res) {
            if (res) {
                msgSucces(`Ajout success`);
                setTimeout(function () {location.reload() }, 1500);
            }else{
               msgError(`Erreur lors de la requete`);
            }
        }       
    }else{
        alertErreur(inputsFields);
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
