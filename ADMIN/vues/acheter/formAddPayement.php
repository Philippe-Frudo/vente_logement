
<div class="fenetre_modale_ajout_log">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Nouveau Payement</p>
                <img src=<?php echo FOLDER_ICON . "icons8_cancel_64px_1.png"; ?> class="close">
            </div>
            <form action="#" id="formAddPayement" class="form_input">
                <div class="group_input">
                    <label for="numLog">N logement</label>
                    <input class="inputData" name="numLog" type="text" value="15" disabled>
                </div>
                <div class="group_input">
                    <label for="modePay">Mode de payement</label>
                    <select class="inputData" name="modePay" id="" style="padding: 0.5rem;">
                        <option value="">Selectionner</option>
                        <option value="Caisser">Caisser</option>
                        <option value="Cheque">Cheque</option>
                        <option value="MVola">MVola</option>
                        <option value="Airtel Money">Airtel Money</option>
                    </select>
                    <!-- <label for="">Mode de payement</label>
                    <input class="inputData" name="modePay" type="text"> -->
                </div>
                <div class="group_input">
                    <label for="codePay">Code de payement</label>
                    <input class="inputData" name="codePay" type="text">
                </div>
                <div class="group_input">
                    <label for="montantPay">Montant a payer</label>
                    <input class="inputData" name="montantPay" type="text">
                </div>
               
                <div class="button_ajout_log">
                    <button type="reset">Annuler</button>
                    <button type="submit" class="creer_terr">Valider</button>
                </div>
            </form>
        </div>
    </div>
