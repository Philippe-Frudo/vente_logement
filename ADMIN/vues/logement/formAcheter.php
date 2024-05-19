<div class="fenetre_modale_ajout_log" id="formAcheter">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Vendre</p>
                <img src=../../publics/icon/icons8_cancel_64px_1.png class="close" id="close">
            </div>
            <form action="#" id="acheterLog" class="form_input">
                <div class="group_input">
                    <label for="numLog">N logement</label>
                    <input id="getIdLog" class="inputData" name="numLog" type="text" disabled>
                </div>
                <div class="group_input">
                    <label for="codeCli">Client</label>
                    <select class="inputData getCli" name="codeCli" id="" style="padding: 0.5rem;">
                        <option value="">Selectionner</option>

                    </select>
                </div>
                <div class="group_input">
                    <label for="dateLimite">Date de limite</label>
                    <input class="inputData dateLimite" name="dateLimite" type="date">
                </div>
                
                <div class="button_ajout_log">
                    <button type="reset">Annuler</button>
                    <button type="submit" class="creer_terr">Valider</button>
                </div>
                <!-- <div class="group_input">
                    <label for="codeCli">Code client</label>
                    <input class="inputData" name="codeCli" type="text">
                </div> -->
            </form>
        </div>
    </div>
    