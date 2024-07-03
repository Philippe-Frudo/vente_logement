import { fetchData, validPhone, validField, alertErreur, styleErrorInput, styleSuccesInput, regexPhone, regexCIN, regexPassword, regexEmail  } from "../default/functions.js";

let selectQuery = (variable) =>  document.querySelector(variable);
let selectQueryAll = (variable) =>  document.querySelectorAll(variable);


const urlCli = "http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurClient.php";

//FETCH START
fetchData(urlCli, "getAllCli", "POST", {}).then(data => { dataClients(data) });

const showDataClient = (client) => {
    let c = client;
    return( `
                <tr class="tr">
                <td class="photo_log">
                    <div>
                        <img src=${ c.photoCli == null  ? "../../publics/icon/icons8_user.ico": c.photoCli.trim() }> >
                    </div>
                </td>
                <td>${c.nomCli}</td>
                <td>${c.prenomCli}</td>
                <td>${c.CINCli}</td>
                <td>${c.professionCli}</td>
                <td>${c.adrsCli}</td>
                <td>${c.telCli}</td>
                <td><span class="status delivered">Delivered</span></td>
                <td class="action">
                    <div class="tr_hover">
                        <a href="#" id=${c.codeCli} ><img src="../../publics/icon/icons8_eye_60px_4.png" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_edit_48px_1.png" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_trash_can_48px.png" ></a>
                    </div>  
                    <div class="tr_dishover">
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_eye_60px_5.png" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_edit_48px_2.png" class="edit_log" ></a>
                        <a href="#" id=${c.codeCli} ><img src= "../../publics/icon/icons8_remove_48px_2.png"  class="delete_log" ></a>

                    </div>
                </td>
            </tr>
            
            `); 

    document.querySelector(".tr_dishover .edit_log").addEventListener("click", (e)=>{
        console.log(e.target.id);
    });
}
function dataClients(dataClient){
    let nombreClient = 0;
    dataClient.forEach(client => {
        document.getElementById("allClients").innerHTML += showDataClient(client);
        nombreClient++;
    });
    document.getElementById("nombreClient").innerHTML = nombreClient;
}
//FETCH END


function validCIN(e) {
    return regexCIN(e.value);
}


// *************VALIDATION DES CHAMPS ***********


document.querySelector(".tel").addEventListener("keyup", (e)=>{
    if (regexPhone(e.target.value) == false) { 
        styleErrorInput(e.target); 
    }
    else{ 
        styleSuccesInput(e.target);
    }
});


document.querySelector(".CIN").addEventListener("keyup", (e)=>{
    if (regexCIN(e.target.value) == false) {
        styleErrorInput(e.target); 
    }
    else{ 
        styleSuccesInput(e.target);
    }
});


const getsDataForm = (inputsFields, inpFileImg) => {
    let data = {};
    inputsFields.forEach(input => {
        let inpName = input.name.trim();
        let inpValue = input.value.trim();
        
        data[inpName]= inpValue;
    });

    let inpFileName = inpFileImg[0].name;
    let fileIMG = inpFileImg[0].files[0];
    data[inpFileName]= fileIMG;

    console.log(data);
    return data;

}


document.querySelector("#formAddClient").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputsFields =  e.target.querySelectorAll(".group_input input");
    const inpFileImg =  e.target.querySelectorAll(".group_input_file input");

    const valid = validField(inputsFields);

    console.log(valid, validPhone(document.querySelector("#formAddClient .tel")), validCIN(document.querySelector("#formAddClient .CIN")));
    if ( valid && validPhone(document.querySelector("#formAddClient .tel")) && validCIN(document.querySelector("#formAddClient .CIN"))) {

        let dCli = getsDataForm(inputsFields, inpFileImg);
        fetchJSONPost(url, "insertCli", "POST", dCli );
        // location.reload();

    }else{
        
        const alertErreurs = alertErreur(inputsFields);
        console.log("Invalid");
    }


});


