import { createElement, srcChange ,msgError, msgSucces, clearInputs ,getsDataForm ,updateForm ,openWindow ,fetchData, validPhone, validCIN,validField, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail, validChammps  } from "../default/functions.js";

const urlCli = "http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurClient.php";

function searchList(input) {
    let filter, table, tr, td, i, txtValue;
    input = document.getElementById("myinputSearch");
    filter = input.value.toUpperCase();
    table = document.querySelector(".myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {

      let td_nom = tr[i].getElementsByTagName("td")[1];
      let td_prenom = tr[i].getElementsByTagName("td")[2];
      let td_CIN = tr[i].getElementsByTagName("td")[3];
      let td_profession = tr[i].getElementsByTagName("td")[4];
      let td_adrs = tr[i].getElementsByTagName("td")[5];
      let td_tel = tr[i].getElementsByTagName("td")[6];
      let td_sexe = tr[i].getElementsByTagName("td")[7];

      if (td_nom || td_prenom || td_CIN || td_profession || td_adrs || td_tel || td_sexe ) {
        if (
            td_nom.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_prenom.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_CIN.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_profession.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_adrs.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_tel.innerText.toUpperCase().indexOf(filter) > -1 || 
            td_sexe.innerText.toUpperCase().indexOf(filter) > -1 
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

const tel = (champs)=>{
    if (regexPhone(champs.value) == false) { 
        styleErrorInput(champs); 
    }
    else{ 
        styleSuccesInput(champs);
    }
}

document.querySelector(".tel").addEventListener("input", (e)=>{
    tel(e.target)
});

const CIN = (champ)=>{
    if (regexCIN(champ.value) == false) {
        styleErrorInput(champ); 
    }
    else{ 
        styleSuccesInput(champ);
    }
}
document.querySelector(".CIN").addEventListener("input", (e)=>{
    CIN(e.target)
});


//FETCH START
fetchData(urlCli, "getAllCli",  {}).then(data => { dataClients(data) });

const openWindowUpdate = (id, data) => {
    const client = data;
    if (data.codeCli == id) {

        document.getElementById("formUpdateClient").innerHTML = `
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
                    <label for="nomCli">Nom</label>
                    <input class="inpData" name="nomCli" type="text" value="${data.nomCli}" placeholder="">
                </div>
                <div class="group_input">
                    <label for="#">Prénom</label>
                    <input class="inpData" name="prenomCli" type="text" value="${data.prenomCli}" placeholder="">
                </div>
            </div>
            <div class="dispaly_input">
                <div class="group_input">
                    <label for="#">Profession</label>
                    <input class="inpData" name="professionCli" type="text" value="${data.professionCli}" placeholder="">
                </div>
                <div class="group_input">
                    <label for="#">Numero CIN </label>
                    <input id="CIN" class="inpData CIN" name="CINCli" class="CIN" type="text" value="${data.CINCli}" placeholder="">
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
                        msgSucces(`Client N: ${id} est modifie`);
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

const showDataClient = (data) => {
    const client = data;

    let img = createElement("img", { src: client.photoCli == null  ? "../../publics/icon/icons8_user.ico": "../"+client.photoCli.trim() });
    let divImg = createElement("div", {}, '');
    let tdImg = createElement("td", {class: "photo_log"}, '');
    tdImg.appendChild(divImg).appendChild(img);

    let nom = createElement("td", {},  client.nomCli);
    let prenom = createElement("td", {},  client.prenomCli);
    let CIN = createElement("td", {},  client.CINCli);
    let profession = createElement("td", {},  client.professionCli);
    let adresse = createElement("td", {},  client.adrsCli);
    let phone = createElement("td", {},  client.telCli);
    let sexe = createElement("td", {},  client.sexeCli);
    let tr = createElement("tr", {class: "tr"},  "");

    let update = createElement("td", {id: client.codeCli}, "");
    let imgUpdate = createElement("img", {src:"../../publics/icon/icons8_edit_48px_1.png", 
        class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
        , "");
    update.append(imgUpdate);

    imgUpdate.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        openWindowUpdate(id, client);
        openWindow(updateForm);
    });

    let supp = createElement("td", {id: client.codeCli}, "");
    let imgSupp = createElement("img", {src:"../../publics/icon/icons8_trash_can_48px.png", 
        class:"td_action", style:'object-fit: cover; width: 100%; max-width: 40px; padding: 5px; cursor: pointer;'}
        , "");
    supp.append(imgSupp);

    supp.addEventListener("click", (e)=>{
        const id = e.target.parentElement.id
        const data = {"numCli":id}

        if ( confirm(`Confirmez-vous la suppression de client N: ${id}`) ) {

            fetchData(urlCli, "deleteCli", data).then(res => {result(res)});

            function result(res) {
                if (res) {
                    msgSucces(`Client N: ${id} a supprime`);
                    setTimeout(function () {location.reload() }, 2000)
                }else{
                    msgError(`Verifier l'erreur`);
                }
            }
        }
    });

    tr.append(tdImg);
    tr.append(nom);
    tr.append(prenom);
    tr.append(CIN);
    tr.append(profession);
    tr.append(adresse);
    tr.append(phone);
    tr.append(sexe);
    tr.append(update);
    tr.append(supp);
    
    document.getElementById("allClients").append(tr);
}

function dataClients(datas){
    let nombreClient = 0;
    datas.forEach(data => {
         showDataClient(data);
        nombreClient++;
    });
    document.getElementById("nombreClient").innerHTML = nombreClient;
}
//FETCH END


// *************VALIDATION DES CHAMPS ***********


document.querySelector("#formAddClient").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputs =  e.target.querySelectorAll(".inpData");

    const tel = document.querySelector("#formAddClient .tel");
    const CIN = document.querySelector("#formAddClient .CIN")

    const data = getsDataForm(inputs);
    console.log(data);
    if ( validField(inputs) && validPhone(tel) && validCIN(CIN)) {

        fetchData(urlCli, "insertCli", data).then(res => {result(res)});

        function result(res) {
            if (res) {
                msgSucces(`Ajout de nouveau client reuissite`);
                setTimeout(function () {location.reload() }, 2000)
            }else{
                msgError(`Verifier l'erreur`);
            }
        }

    }else{ 
       alertErreur(inputs);
    }


});


