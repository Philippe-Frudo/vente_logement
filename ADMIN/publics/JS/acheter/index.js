import { msgSucces, close ,addForm, closeWindow ,openWindow ,createElement, fetchData, getDataForm, validChammps, regexNumber, getsDataForm, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

let montantP = document.querySelector("#formAddPayement input[name='montantPay']");
const urlPay = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurPayement.php`
const urlAchat = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAcheter.php`
const urlCli = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurClient.php`;
const urlLog = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurLogement.php`

const containerDetailsPay = document.querySelector("#containerDetailsPay");

close.addEventListener("click" , ()=>{
    closeWindow(containerDetailsPay);
});


// RECHERCHE
function searchList(input) {
    let filter, table, tr, i;
    input = document.getElementById("myinputSearch");
    filter = input.value.toUpperCase();
    table = document.querySelector(".myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {

      let td_nom = tr[i].getElementsByTagName("td")[0];
      let td_prenom = tr[i].getElementsByTagName("td")[1];
      let td_tel = tr[i].getElementsByTagName("td")[2];
      let td_adrs = tr[i].getElementsByTagName("td")[3];
      let td_numLog = tr[i].getElementsByTagName("td")[4];
      let td_cite = tr[i].getElementsByTagName("td")[5];
      let td_lieu = tr[i].getElementsByTagName("td")[6];
      let td_modePay = tr[i].getElementsByTagName("td")[7];
      let td_dateVente = tr[i].getElementsByTagName("td")[8];
      let td_dateLimit = tr[i].getElementsByTagName("td")[9];


      if (td_nom || td_prenom || td_tel || td_adrs || td_numLog || td_cite || td_lieu  || td_modePay || td_dateVente || td_dateLimit ) {
        if (
            td_nom.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_prenom.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_tel.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_adrs.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_numLog.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_cite.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_lieu.innerText.toUpperCase().indexOf(filter) > -1 ||
            td_modePay.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_dateVente.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_dateLimit.innerText.toUpperCase().indexOf(filter) > -1
        ) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  document.querySelector("#myinputSearch").addEventListener("input", (e)=>{
    searchList(e.target);
})




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
const infoCliFact = (data, id)=>{
    if (id == data.codeCli) {
        return `
            <tr>
                <th>Facturé à <span class="sutiation">Mr/Mme/Mlle :</span></th>
            </tr>
            <tr>
                <td>Nom: ${data.nomCli}</td>
                <td>Adresse: ${data.adrsCli}</td>
            </tr>
            <tr>
                <td>Prenom: ${data.prenomCli== "" ? "": data.prenomCli}</td>
                <td>Telephone: ${data.telCli}</td>
            </tr>
            <tr>
                <td>N° CIN: ${data.CINCli}</td>
                <td>Profession: ${data.professionCli}</td>
            </tr>
            <tr>
                <td>Sexe: ${data.sexeCli}</td>
            </tr>
        ` 
    }
}
const infoLogFact = (data, id)=>{
    if (id == data.numLog) {
        return `
            <tr>
                <th>Information de logement</th>
            </tr>
            <tr>
                <td>N logement: ${id}</td>
                <td>Date de vente: ${data.dateVente}</td>
            </tr>
            <tr>
                <td>Cite: ${data.cite}</td>
                <td>Limite de payement: ${data.dateLimite}</td>
            </tr>
            <tr>
                <td>Lieu: ${data.nomProvince}</td>
            </tr>
        `
    }
}
        
const showDataAchat = (data) => {
            const c = data;
        
            let nom = createElement("td", {},  c.nomCli);
            let prenom = createElement("td", {},  c.prenomCli);
            let phone = createElement("td", {},  c.telCli);
            let adresse = createElement("td", {},  c.adrsCli);
            let numLog = createElement("td", {},  c.numeroLog);
            // console.log(c.numeroL);
            let prixLog = createElement("td", {},  c.prixLog);
            let cite = createElement("td", {},  c.cite);
            let nomProvince = createElement("td", {},  c.nomProvince);
            let dateVente = createElement("td", {},  c.dateVente);
            let dateLimite = createElement("td", {},  c.dateLimite);
            let modePayement = createElement("td", {},  c.modePayement);
            let totalPay = createElement("td", {},  c.totalPay);
            let nombrePay = createElement("td", {},  c.nombrePay);
            let resteP = createElement("td", {},  c.reste == 0 ? "Complete":c.reste );
            
            let btnDetail = createElement("button", {id: c.numeroLog, class:"td_action",
                style: "border: none; outline: none; padding: 0.5rem; background: #2a2185; cursor: pointer; color: #fff;"}, "Detaille");
            let detaillePay = createElement("td", {id: c.numeroLog }, "");
            detaillePay.append(btnDetail);
            
            let nouveauPay = createElement("td", {id: c.numeroLog}, "");
            let imgPay = createElement("img", {src:"../../publics/icon/icons8_edit_48px_1.png", id:c.numeroLog,
            class:"td_action btn", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}, "");
            nouveauPay.append(imgPay);
            
            imgPay.addEventListener("click", (e)=>{
                const id = e.target.id
                console.log(id);
                document.querySelector(".getNumLog").value = id
                openWindow(addForm);
            });

            
            btnDetail.addEventListener("click", (e)=>{
                const id = e.target.id
                
                fetchData(urlPay, "getBy", {"numLog": id} ).then(data => { datasPayement(data) });
                const datasPayement = (datas)=>{
                    let nombreTotal = 0;
                    let bodyTab = " "
                    datas.forEach(data => {
                        bodyTab += showDataPayement(data);
                        nombreTotal++;
                    });
                    document.getElementById("datailsPay").innerHTML = bodyTab;
                    document.getElementById("nobreTotalAcheter").innerHTML = nombreTotal;
                    
                    document.querySelector("#prixDuLog").innerHTML = c.prixLog + " Ar";
                    document.querySelector(".totalPayement").innerHTML = c.totalPay + " Ar";
                    document.getElementById("nobrePayenment").innerHTML = c.nombrePay;
                    if (c.reste < 0 ) {
                        document.getElementById("retour").innerHTML = c.reste*(-1) + " Ar";  
                        document.getElementById("reste").innerHTML = "0 Ar";
                    }else{
                        document.getElementById("retour").innerHTML = "0 Ar";  
                        document.getElementById("reste").innerHTML = c.reste + " Ar";
                    }
                    
                }

                openWindow(document.getElementById("containerDetailsPay") );
            });
        
            let supp = createElement("td", {id: c.codeCli}, "");
            let imgSupp = createElement("img", {src:"../../publics/icon/icons8_trash_can_48px.png", 
            class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
            , "");
            supp.append(imgSupp);

            let btnImprimer = createElement("button", {id: c.numeroLog, class:"td_action",
                style: "border: none; outline: none; padding: 0.5rem; background: #2a2185; cursor: pointer; color: #fff; display:none;"}, "Facture");
            let tdImprimer = createElement("td", {id: c.codeCli }, "");
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
            document.getElementById("listeLogement").append(tr);
            

            btnImprimer.addEventListener("click", (e)=>{
                const idLog = e.target.id;
                const idCli = e.target.parentElement.id;

                document.getElementById("dateFact").innerHTML = new Date().toLocaleDateString();


                fetchData(urlPay, "getBy", {"numLog": idLog} ).then(data => { datasPayement(data) });
                
                const datasPayement = (datas)=>{
                    let bodyTab = "";
                    datas.forEach(data => {
                        bodyTab += showDataPayement(data); 
                    });
                    document.getElementById("datailsPayFacture").innerHTML = bodyTab;
                }

                fetchData(urlAchat, "getAllAchat" ).then(data => { dataAchat(data) });
                const dataAchat = (datas)=>{
                    let infoLog = "";
                    datas.forEach(data => {
                        infoLog += infoLogFact(data, idLog);
                    });
                    document.getElementById("infoLog").innerHTML = infoLog;
                }

                fetchData(urlCli, "getAllCli" ).then(data => { dataCli(data) });
                const dataCli = (datas)=>{
                    let infoCli = "";
                    datas.forEach(data => {
                        infoCli += infoCliFact(data, idCli);
                    });
                    document.getElementById("infoCli").innerHTML = infoCli;
                }

                    // \document.querySelector("#prixDuLogF").innerHTML = c.prixLog + " Ar";
                    document.querySelector(".totalPayementF").innerHTML = c.totalPay + " Ar";
                    document.getElementById("nobrePayenmentF").innerHTML = c.nombrePay;
                    if (c.reste < 0 ) {
                        document.getElementById("retourF").innerHTML = c.reste*(-1) + " Ar";  
                        document.getElementById("resteF").innerHTML = "0 Ar";
                    }else{
                        document.getElementById("retourF").innerHTML = "0 Ar";  
                        document.getElementById("resteF").innerHTML = c.reste + " Ar";
                    }

                    document.getElementById("facture").style.display= "block";
                    document.getElementById("contentRetour").style.display= "block";
                    document.querySelector(".container").style.display= "none";

                    setTimeout( function(){ window.print(document.getElementById("facture")) } , 1500);

                    fetchData(urlLog, "updateSupp", {"numLog": idLog} ).then(data => { console.log(data) });

            });
            
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

