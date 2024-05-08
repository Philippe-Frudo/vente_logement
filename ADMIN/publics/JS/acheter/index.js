import {fetchData, getDataForm, validChammps, regexNumber, getsDataForm, validField, validPhone, validPassword, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

let montantP = document.querySelector("#formAddPayement input[name='montantPay']");
const urlPay = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAcheter.php`



//GETTER LOGEMENT VENDU
fetchData(urlPay, "getAllAchat", "GET").then(data => { datasPayement(data)  })
const showDataPay = (data) => {
    const c = data;
    let tr = (` 
        <tr class="tr liste_terrain">
            <td>${c.nomCli}</td>
            <td>${c.prenomCli == null ? "":c.prenomCli} </td>
            <td>${c.telCli}</td>
            <td>${c.adrsCli}</td>
            <td>${c.numLog}</td>
            <td>${c.prixLog}</td>
            <td>${c.cite}</td>
            <td>${c.nomProvince}</td>
            <td>${c.typeVente == null ? "":c.typeVente}</td>
            <td>${c.dateVente}</td>
            <td>${c.dateLimite}</td>
            <td>${c.totalPay}</td>
            <td>${c.reste == 0 ? "Complete":c.reste}</td>
            <td>${c.nombrePay}</td>
            <td style="diaplay:flex" class="action">
                <button class="detail" id=${c.numLog} ><img style="width: 25px; outline: none; border: none; z-index:1000; cursor:pointer" src="../../publics/icon/icons8_eye_60px_4.png" ></button>
                <button class="supprimer" id=${c.numLog} ><img style="width: 25px; outline: none; border: none; z-index:1000; cursor:pointer" src="../../publics/icon/icons8_trash_can_48px.png" ></button>
            </td>  
            <td>
                <button class="payement" id=${c.numLog} ><img style="width: 25px; outline: none; border: none; z-index:1000; cursor:pointer" src="../../publics/icon/icons8_edit_48px_1.png" ></button>
            </td>
        </tr>
        `); 
        
        document.querySelectorAll("tr button").forEach(btn =>{ 
            // console.log(document.querySelectorAll("tr .action button"));
            // console.log(btn);
            btn.addEventListener("click", ()=>{
                console.log(btn);
                if (btn) {
                   alert()
                }
                if (btn.className == "payement") {
                    alert()
  
                }
                
            }, true);
        })
        
        return tr;
    }
function datasPayement(datas){
    let nombreTotal = 0;
    datas.forEach(data => {
        document.getElementById("listeLogement").innerHTML += showDataPay(data);
        nombreTotal++;
    });
    document.getElementById("nobreTotalAcheter").innerHTML = nombreTotal;
}
//GETTER LOGEMENT VENDU





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
        
        const data = getDataForm( inputsData );
        fetchData(urlPay, "POST","insertPayer", data);

    } else {
        validChammps(inputsData);
    }
})

// action();

