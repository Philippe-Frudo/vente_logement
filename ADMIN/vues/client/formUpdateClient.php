<div class="fenetre_modale_ajout_log">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Form Modifier client</p>
                <img src=<?php echo FOLDER_ICON . "icons8_cancel_64px_1.png"; ?> class="close">
            </div>
            <form action="#" class="form_input" id="formUpdateClient">
                <div class="photo_logement_ajo">
                    <div>
                        <img src=<?php echo FOLDER_ICON . "icons8_photo_video_48px.png"; ?> >
                    </div>
                    <div class="group_input_file">
                        Télecharger image
                        <input name="photoCli" type="file">
                    </div>
                </div>
                <div class="dispaly_input">
                    <div class="group_input">
                        <label for="#">Nom</label>
                        <input name="nomCli" type="text" placeholder="">
                    </div>
                    <div class="group_input">
                        <label for="#">Prénom</label>
                        <input name="prenomCli" type="text" placeholder="">
                    </div>
                </div>
                <div class="dispaly_input">
                    <div class="group_input">
                        <label for="#">Profession</label>
                        <input name="professionCli" type="text" placeholder="">
                    </div>
                    <div class="group_input">
                        <label for="#">Numero CIN </label>
                        <input name="CINCli" class="CIN" type="text" placeholder="">
                    </div>
                </div>
                <div class="dispaly_input">
                    <div class="group_input">
                        <label for="#">Telephone</label>
                        <input name="telCli" class="tel" type="text" placeholder="">
                    </div>
                    <div class="group_input">
                        <label for="#">Adresse</label>
                        <input name="adrsCli"  type="text" placeholder="">
                    </div>
                </div>
                <div class="button_ajout_log">
                    <button type="reset">Annuler</button>
                    <button type="submit" class="modifier">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
