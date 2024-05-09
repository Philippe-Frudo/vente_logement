<div class="fenetre_modale_ajout_log">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Nouveau Client</p>
                <img src=<?php echo FOLDER_ICON . "icons8_cancel_64px_1.png"; ?> class="close">
            </div>
            <form action="#" class="form_input" id="formAddClient">
                <div id="imgChange" class="photo_logement_ajo" >
                    <div>
                        <img src=<?php echo FOLDER_ICON . "icons8_photo_video_48px.png"; ?> >
                    </div>
                    <div class="group_input_file">
                        Télecharger image
                        <input class="inpData" name="photoCli" type="file">
                    </div>
                </div>
                <div class="dispaly_input">
                    <div class="group_input">
                        <label for="#">Nom</label>
                        <input class="inpData" name="nomCli" type="text" placeholder="">
                    </div>
                    <div class="group_input">
                        <label for="#">Prénom</label>
                        <input class="inpData" name="prenomCli" type="text" placeholder="">
                    </div>
                </div>
                <div class="dispaly_input">
                    <div class="group_input">
                        <label for="#">Profession</label>
                        <input class="inpData" name="professionCli" type="text" placeholder="">
                    </div>
                    <div class="group_input">
                        <label for="#">Numero CIN </label>
                        <input id="CIN" class="inpData CIN" name="CINCli" class="CIN" type="text" placeholder="">
                    </div>
                </div>
                <div class="dispaly_input">
                    <div class="group_input">
                        <label for="#">Telephone</label>
                        <input id="tel" class="inpData tel" name="telCli" class="tel" type="text" placeholder="">
                    </div>
                    <div class="group_input">
                        <label for="#">Adresse</label>
                        <input class="inpData" name="adrsCli"  type="text" placeholder="">
                    </div>
                </div>
                <div class="dispaly_input">
                    <div class="group_input">
                        <label for="#">Sexe</label>
                        <div class="sexe">  
                            <label><input class="inpData" name="sexeCli" class="sexe" type="radio" value="F" > Feminin</label>
                            <label><input class="inpData" name="sexeCli" class="sexe" type="radio" value="M" checked> Masculin</label>
                        </div>
                    </div>
                </div>
                <div class="button_ajout_log">
                    <button type="reset" class="reset">Annuler</button>
                    <button type="submit" class="creer_terr">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
