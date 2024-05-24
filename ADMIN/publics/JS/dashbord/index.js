import { createElement ,fetchData } from "../default/functions.js";

let list = document.querySelectorAll('.navigation li');
function activeLink(){
    list.forEach((item) =>{
        item.classList.remove('hovered');
    })
    this.classList.add('hovered');
}
list.forEach((item)=>item.addEventListener('mouseover',activeLink));
//Menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');
toggle.addEventListener('click', ()=>{
    navigation.classList.toggle('active');
    main.classList.toggle('active');
});

// LIEN
const urlAchat = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAcheter.php`;
const urlAg = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAgence.php`;
const urlCite = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurCite.php`;
const urlCli = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurClient.php`;
const urlLog = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurLogement.php`;
const urlPay = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurPayement.php`;
const urlTer = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurTerrain.php`;
// LIEN

fetchData(urlCli, "getNumber", {} ).then(data => {
    document.querySelector(".numbersCli").innerHTML = data[0].nombreCli;
});

fetchData(urlAg, "getNumber", {} ).then(data => {
    document.querySelector(".numbersAg").innerHTML = data[0].nombreAg;
});

fetchData(urlLog, "getNumberAll", {} ).then(data => {
    document.querySelector(".numbersAllLog").innerHTML = data[0].nombreLog;
});
fetchData(urlLog, "getNumberV", {} ).then(data => {
    document.querySelector(".numbersLogV").innerHTML = data[0].nombreLog;
});

fetchData(urlPay, "getSumManey", {} ).then(data => {
    document.querySelector(".sumMoney").innerHTML = data[0].total + ' Ar';
});
fetchData(urlPay, "getSumManeyMonthNow", {} ).then(data => {
    document.querySelector(".sumMoneyPerMonth").innerHTML = data[0].total;
});

fetchData(urlTer, "getNumber", {} ).then(data => {
    document.querySelector(".numbersTer").innerHTML = data[0].nombreTer;
});

fetchData(urlCite, "getNumber", {} ).then(data => {
    document.querySelector(".numbersCite").innerHTML = data[0].nombreCite;
}); 


const showListPay = (d) =>{
    let nom = createElement("td", {}, d.nomCli)
    let CIN = createElement("td", {}, d.telCli)
    let modeP = createElement("td", {}, d.modePayement )
    let montant = createElement("td", {}, d.montantPayer)
    let dateP = createElement("td", {}, d.datePayement )
    let tr = createElement("tr", {}, "")
    tr.append(nom);
    tr.append(CIN);
    tr.append(modeP);
    tr.append(montant);
    tr.append(dateP);
    document.querySelector("#listPayement").append(tr);
}
fetchData(urlPay, "getAllLimit", {} ).then(data => {
    data.forEach(data => showListPay(data) )
});


const showListCli = (d) =>{
    return `
    <tr>
        <td style = "width: 60px">
            <div class="imgBox">
                <img src="../../publics/icon/icons8_user.ico">
            </div>
        </td>
        <td>
            <h4>${d.nomCli} <br><span>${d.adrsCli}</span></h4>
        </td>
    </tr>
`
}
fetchData(urlCli, "getAllLimit", {} ).then(data => {
    data.forEach(data => {
        document.getElementById("listClient").innerHTML += showListCli(data) } )
});

