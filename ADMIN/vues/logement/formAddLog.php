<div class="fenetre_modale_ajout_log">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Nouveau Longement</p>
                <img src=<?php echo FOLDER_ICON . "icons8_cancel_64px_1.png"; ?> class="close">
            </div>
            
            <form action="#" id="formAddLog" class="form_input">
                <div class="photo_logement_ajo">
                    <div>
                        <img src=<?php echo FOLDER_ICON . "icons8_photo_video_48px.png"; ?> >
                    </div>
                    <div>
                        Télecharger image
                        <input class="inputData" name="photoLog" type="file" placeholder="Clique pour selectionner de photo">
                    </div>
                </div>
                <div class="input">
                    <div class="dispaly_input">
                        <!-- <div class="group_input">
                            <label for="#">Libélé</label>
                            <input class="inputData" name="libCite" type="text" placeholder="label">
                        </div> -->
                        <div class="group_input">
                            <label for="#">Prix</label>
                            <input class="inputData prixLog" name="prixLog" type="text" placeholder="">  
                        </div>
                    </div>
                    <div class="group_input">
                        <label for="#">Désription</label>
                        <textarea class="inputData" name="descLog" type="text" placeholder=""></textarea>
                    </div>
                </div>

                <!-- <div class="select">
                    <div class="group_select">
                        <div class="element_select">
                            <span>Agence</span>
                            <select class="inputData" name="codeAg" id="agenceLog">
                                <option value="">--select agence</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div> -->
                    <!-- <div class="group_select">
                        <div class="element_select">
                            <span>Province</span>
                            <select class="inputData" id="provinceLog" name="codeProvince">
                                <option value="">--select province</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div> -->
                    <div class="group_select">
                        <div class="element_select">
                            <span>Terrain</span>
                            <select class="inputData" id="terrainLog" name="numTer">
                                <option value="">--select terrain</option>
                                <!-- <option value=""></option> -->
                            </select>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div>
                    <div class="group_select">
                        <div class="element_select">
                            <span>Cité</span>
                            <select class="inputData" id="citeLog" name="codeCite">
                                <option value="">--select cité</option>
                                <!-- <option value=""></option> -->
                            </select>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="button_ajout_log">
                    <button type="reset">Cancel</button>
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>