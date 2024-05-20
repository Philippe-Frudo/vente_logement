import { msgSucces, addForm, openWindow ,createElement, fetchData, getDataForm, validChammps, regexNumber, getsDataForm, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

let montantP = document.querySelector("#formAddPayement input[name='montantPay']");
const urlPay = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurPayement.php`
const urlAchat = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAcheter.php`


//DETAILLE PAYEMENT

const showDataPayement = (d) => {
     return `
            <tr>
                <td>${d.codePayement}</td>
                <td>${d.modePayement}</td>
                <td>${d.montantPayer}</td>
                <td>${d.datePayement}</td>
            </tr>
            `
}
//DETAILLE PAYEMENT

fetchData(urlAchat, "getAllAchat", {} ).then(data => { datasAchat(data)  })
//FETCH START
const openWindowUpdatePyer = (id, data) => {
            const c = data;
            if (data.codeCli == id) {
        
                document.getElementById("formUpdate").innerHTML = `
                    <div id="imgChange" class="photo_logement_ajo">
                        <div>
                            <img src="../${data.photoCli}">
                        </div>
                        <div class="group_input_file">
                            <label for="photoCli">Télecharger image</label>
                            <input class="inpData photo" name="photoCli" type="file" value="../${data.photoCli}">
                        </div>
                    </div>

                    <div class="dispaly_input">
                        <div class="group_input">
                            <label for="#">Telephone</label>
                            <input id="tel" class="inpData tel" name="telCli" class="tel" type="text" value="${data.telCli}" placeholder="">
                        </div>
                        <div class="group_input">
                            <label for="#">Adresse</label>
                            <input class="inpData" name="adrsCli"  type="text" value="${data.adrsCli}" placeholder="">
                        </div>
                    </div>
                    <div class="dispaly_input">
                        <div class="group_input">
                            <label for="#">Sexe</label>
                            <div class="sexe">  
                                <label><input class="inpData" name="sexeCli" class="sexe" type="radio" value="F" ${data.sexeCli == "F" ? "checked":null} > Feminin</label>
                                <label><input class="inpData" name="sexeCli" class="sexe" type="radio" value="M" ${data.sexeCli == "M" ? "checked":null}  > Masculin</label>
                            </div>
                        </div>
                        <div class="group_input">
                            <label for="#">Id</label>
                            <input class="inpData" name="numCli"  type="text" value="${data.codeCli}" disabled>
                        </div>
                    </div>
                    <div class="button_ajout_log">
                        <button type="reset" class="reset">Annuler</button>
                        <button type="submit" class="modifier">Modifier</button>
                    </div>
                `  
        
                document.querySelector("form input[type='file']").addEventListener("change", (e)=>{
                    srcChange(e.target);
                    //alert()
                })
        
                document.querySelector(".modifier").addEventListener("click", (e)=>{
                    e.preventDefault();
                    const inputs = document.querySelectorAll("#fenetreUpdate .inpData");
                    
                    const tel = document.querySelector("#fenetreUpdate #tel");
                    const cin = document.querySelector("#fenetreUpdate #CIN");
        
                    if ( validField(inputs) && validCIN(cin) && validPhone(tel)) {
        
                        const data = getsDataForm(inputs)
                        fetchData(urlCli, "updateCli", data).then(data => { res(data) });  
                        function res(res) {
                            if (res) {
                                msgSucces(`c N: ${id} est modifie`);
                                setTimeout(function () {location.reload() }, 2000)
        
                            }else{
                               msgError(`Verifier l'erreur`);
                            }
                        }       
                    }else{
                        alertErreur(inputs);
                    }
                })
        
                document.querySelector('.tel').addEventListener("input", (e)=>{ 
                    alert()
                    console.log("input");
                    tel(e.target);
                })
                
                document.querySelector('.CIN').addEventListener("input", (e)=>{ 
                    alert()
                    console.log("input");
                    tel(e.target);
                })
           
            }
        
};
        
const showDataAchat = (data) => {
            const c = data;
        
            let nom = createElement("td", {},  c.nomCli);
            let prenom = createElement("td", {},  c.prenomCli);
            let phone = createElement("td", {},  c.telCli);
            let adresse = createElement("td", {},  c.adrsCli);
            let numLog = createElement("td", {},  c.numLog);
            let prixLog = createElement("td", {},  c.prixLog);
            let cite = createElement("td", {},  c.cite);
            let nomProvince = createElement("td", {},  c.nomProvince);
            let dateVente = createElement("td", {},  c.dateVente);
            let dateLimite = createElement("td", {},  c.dateLimite);
            let modePayement = createElement("td", {},  c.modePayement);
            let totalPay = createElement("td", {},  c.totalPay);
            let nombrePay = createElement("td", {},  c.nombrePay);
            let resteP = createElement("td", {},  c.reste == 0 ? "Complete":c.reste );
            
            let btnDetail = createElement("button", {id: c.numLog, class:"td_action",
                style: "border: none; outline: none; padding: 0.5rem; background: #2a2185; cursor: pointer; color: #fff;"}, "Detaille");
            let detaillePay = createElement("td", {id: c.numLog }, "");
            detaillePay.append(btnDetail);
            
            let nouveauPay = createElement("td", {id: c.numLog}, "");
            let imgPay = createElement("img", {src:"../../publics/icon/icons8_edit_48px_1.png", 
            class:"td_action btn", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}, "");
            nouveauPay.append(imgPay);
            
            imgPay.addEventListener("click", (e)=>{
                const id = e.target.parentElement.id
                document.querySelector(".getNumLog").value = id
                openWindow(addForm);
            });

            btnDetail.addEventListener("click", (e)=>{
                const id = e.target.id

                fetchData(urlPay, "getBy", {"numLog": id} ).then(data => { datasPayement(data) });
                
                const datasPayement = (datas)=>{
                    document.querySelector(".totalPayement").innerHTML = c.totalPay;
                    document.getElementById("nobrePayenment").innerHTML = c.nombrePay;
                    
                    let nombreTotal = 0;
                    let bodyTab = " "
                    datas.forEach(data => {
                        bodyTab += showDataPayement(data);
                        nombreTotal++;
                    });
                    document.getElementById("datailsPay").innerHTML = bodyTab;
                    document.getElementById("nobreTotalAcheter").innerHTML = nombreTotal;
                }

                openWindow(document.getElementById("containerDetailsPay") );
            });
        
            let supp = createElement("td", {id: c.codeCli}, "");
            let imgSupp = createElement("img", {src:"../../publics/icon/icons8_trash_can_48px.png", 
            class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
            , "");
            supp.append(imgSupp);

            let btnImprimer = createElement("button", {id: c.numLog, class:"td_action",
                style: "border: none; outline: none; padding: 0.5rem; background: #2a2185; cursor: pointer; color: #fff; display:none;"}, "Facture");
            let tdImprimer = createElement("td", {id: c.numLog }, "");
            tdImprimer.append(btnImprimer);


            //let divDetail = createElement("div", { style: "display: block; background: #000; min-width:40px; min-height:40px", id:"divDetail" , class: "tr"},  "");
            let tr = createElement("tr", { class:"tr" },  "");
        
            supp.addEventListener("click", (e)=>{
                const id = e.target.parentElement.id
                const data = {"numCli":id}
        
                if ( confirm(`Confirmez-vous la suppression de c N: ${id}`) ) {
        
                    fetchData(urlCli, "deleteCli", data).then(res => {result(res)});
        
                    function result(res) {
                        if (res) {
                            msgSucces(`c N: ${id} a supprime`);
                            setTimeout(function () {location.reload() }, 2000)
                        }else{
                            msgError(`Verifier l'erreur`);
                        }
                    }
                }
            });


            if(c.reste == 0){
                imgPay.style.display = "none";
                resteP.style.color = "green";
                btnImprimer.style.display = "block";
                
            }
            if(c.reste < 0){
                imgPay.style.display = "none";
                btnImprimer.style.display = "block";
                resteP.style.color = "red";
            }
            
            
            tr.append(nom);
            tr.append(prenom);
            tr.append(phone);
            tr.append(adresse);
            tr.append(numLog);
            tr.append(prixLog);
            tr.append(cite);
            tr.append(nomProvince);
            tr.append(modePayement);
            tr.append(dateVente);
            tr.append(dateLimite);
            tr.append(totalPay);
            tr.append(resteP);
            tr.append(nombrePay);
            tr.append(detaillePay);
            tr.append(nouveauPay);
            tr.append(supp);
            tr.append(tdImprimer);
            // tr.append(divDetail);
            
            tdImprimer.addEventListener("click", (e)=>{
                let id = e.target.id;
                console.log(id);
                
                // if(resteP.innerHTML == "Complete" || resteP.innerHTML < 0){
                //     console.log(tr);
                //     window.print(tr)}
            });
            
            document.getElementById("listeLogement").append(tr);
}

function datasAchat(datas){
    let nombreTotal = 0;
    datas.forEach(data => {
        showDataAchat(data);
        nombreTotal++;
    });
    document.getElementById("nobreTotalAcheter").innerHTML = nombreTotal;
}
//FETCH END



//INSERTION PAYEMENT

const validMontant = (inp)=>{
    return regexNumber(inp.value)
}

montantP.addEventListener("keyup", (e)=>{
    if( regexNumber(e.target.value) ){
        styleSuccesInput(e.target)
    }else{
        styleErrorInput(e.target)
    }
});


document.querySelector("#formAddPayement").addEventListener("submit", (e)=>{
    e.preventDefault();
    const inputsData = e.target.querySelectorAll(".inputData");
    console.log(inputsData);
    const validLog = validField(inputsData);

    if ( validLog && validMontant(montantP) ) {
        
        const data = getsDataForm( inputsData );
        fetchData(urlPay,"insertPayer", data).then(res => response(res) );
        function response(res) {
            if (res) {
                msgSucces(`Ajout success`);
                setTimeout(function () {location.reload() }, 1500);

            }else{
               msgError(`Erreur lors de la requete`);
            }
        }       

    } else {
        validChammps(inputsData);
    }
})

// action();

