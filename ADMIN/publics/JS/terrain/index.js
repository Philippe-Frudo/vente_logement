import { fetchData ,alertErreur, regexNumber, styleErrorInput, styleSuccesInput } from "../default/functions.js";

const urlTer = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurTerrain.php`;
const urlProv = `http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurProvince.php
`

//FETCH START
fetchData(urlTer, "getAllTer", "POST").then(data =>{ dataTerrains(data) });
const showDataTer = (data) => {
    let c = data;
    return( `
                <tr class="tr liste_terrain">
                                <td>${c.numTer}</td>
                                <td>${c.superficieTer}</td>
                                <td class="action">
                                    <div class="tr_hover">
                                    <a href="#" id=${c.numTer} ><img src="../../publics/icon/icons8_eye_60px_4.png" ></a>
                                    <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_edit_48px_1.png" ></a>
                                    <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_trash_can_48px.png" ></a>
                                    </div>  
                                    <div class="tr_dishover">
                                        <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_eye_60px_5.png" ></a>
                                        <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_edit_48px_2.png" class="edit_log" ></a>
                                        <a href="#" id=${c.numTer} ><img src= "../../publics/icon/icons8_remove_48px_2.png"  class="delete_log" ></a>
                
                                    </div>
                                </td>
                            </tr>
            
            `); 

    document.querySelector(".tr_dishover .edit_log").addEventListener("click", (e)=>{
        console.log(e.target.id);
    });
}
function dataTerrains(datas) {
    let nombreTer = 0;
    datas.forEach(data => {
        document.getElementById("liste_terrain").innerHTML += showDataTer(data);
        nombreTer++;
    });
    document.getElementById("nombreTer").innerHTML = nombreTer;
}


const getsDataForm = (inputsFields, inpFileImg) => {
    const data = {};
    inputsFields.forEach(input => {

        let inpName = input.name.trim();
        let inpValue = input.value.trim();
        
        if(input.type !== "file"){
            data[inpName]= inpValue;
        }    
        else if(input.type == "file"){
            let inpFileName = inpFileImg[0].name;
            let fileIMG = inpFileImg[0].files[0];
            data[inpFileName]= fileIMG;
        }    
    });    

    // console.log(data);
    return data;

}


const validField = (inputs) => {

    for (let i = 0; i < inputs.length; i++) {
        let nameClass = inputs[i].name;
        let value = inputs[i].value;

        if(nameClass !== "prenomCli"){
            if (value.trim() == "") {
                return false;
            } 
        }
    }
    return true
}

const validSuper = (v)=>{
    return regexNumber(v);
}


document.querySelector("#formAddTer").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputsFields =  e.target.querySelectorAll(" input");
    const superficie =  e.target.querySelector('input[name="superficieTer"]').value;
    const inpFileImg =  e.target.querySelectorAll(".group_input_file input");

    const valid = validField(inputsFields);

    if ( valid && validSuper()) {

        const data = getsDataForm(inputsFields, inpFileImg);
        // console.log(data);
        fetchData(urlTer, "insertTer", "POST", data ).then(res => console.log(res));
        // location.reload();

    }else{
        
        const alertErreurs = alertErreur(inputsFields);
        console.log("Invalid");
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

document.querySelector(".paragraphe .close").addEventListener("click", (e)=>{
    if (e.target == "IMG") {
        e.target.querySelector("img")
    }
    const m = e.target;
    console.log(e.target);
});
