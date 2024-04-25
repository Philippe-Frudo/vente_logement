//======================= DELETE PRODUIT

//DELETE produits
    var Delete_prod = document.getElementsByClassName("delete_log");
    var FenModales = document.getElementsByClassName("confirmater_supp_pro");
    var cancel = document.getElementsByClassName("anul_del");

    // console.log(BtnEditCom)
    for(var i = 0; i<Delete_prod.length;i++){
        var button = Delete_prod[i];
        var FenModale = FenModales[i];
        // var Cancel = cancel[i];
        button.addEventListener('click' , DeleteProduits);
        cancel.addEventListener('click', AnnulerDel);
    }

    //Afficher ajustement produits
    function DeleteProduits(){
        FenModale.classList.add("active");
    }

    function AnnulerDel(){
        FenModale.classList.remove("active");
    }