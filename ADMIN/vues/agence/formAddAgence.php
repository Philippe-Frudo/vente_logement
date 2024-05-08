<div class="fenetre_modale_ajout_log">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Nouveau Agence</p>
                <img src=<?php echo FOLDER_ICON . "icons8_cancel_64px_1.png"; ?> class="close">
            </div>
            <form action="#" id="formAddAg" class="form_input">
                <div class="group_select">
                    <div class="element_select">
                        <span>Province</span>
                        <select name="codeProvince" id="codeProvince">
                            <option value="">--select la province</option>
                            <!-- <option value=""></option> -->
                        </select>
                    </div>
                    <div>
                        <p></p>
                    </div>
                </div>
                <div class="group_input">
                    <label for="">Libelle</label>
                    <input name="libAg" type="text">
                </div>
                <div class="group_input">
                    <label for="">Adresse</label>
                    <input name="adresseAg" type="text">
                </div>
                <div class="group_input">
                    <label for="">Telephone</label>
                    <input class="tel" name="telAg" type="text">
                </div>
                <div class="group_input">
                    <label for="">Mot de passe</label>
                    <input class="password" name="passwordAg" type="password">
                </div>
                <div class="button_ajout_log">
                    <button type="reset">Annuler</button>
                    <button type="submit" class="creer_terr">Créer</button>
                </div>
            </form>
        </div>
    </div>
