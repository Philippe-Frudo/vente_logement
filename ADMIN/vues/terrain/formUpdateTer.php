<div class="fenetre_modale_ajout_log" id="formUpdate">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Modification du terrain</p>
                <img src=<?php echo FOLDER_ICON . "icons8_cancel_64px_1.png"; ?> class="close" id="close">
            </div>
            <form action="#" id="formUpdateTer" class="form_input">
                <div class="hiddene">
                    <table>
                        <thead>
                            <tr>
                                <th>Ordre</th>
                                <th>Superficie en km<sup>2</sup></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <img src=<?php echo FOLDER_ICON . "icons8_menu_rounded_100px.png"; ?> >
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input class="inpData" name="numTer" type="text" placeholder="Numero terrain">
                                    </div>
                                </td>
                                <td>
                                    <div class="cart_remove">
                                        <img src=<?php echo FOLDER_ICON . "icons8_delete_60px.png"; ?> >
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div>
                                        <img src=<?php echo FOLDER_ICON . "icons8_menu_rounded_100px.png"; ?> >
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input class=" inpData superficieTer" name="superficieTer" type="text" placeholder="Spurficie du terrain en m2">
                                    </div>
                                </td>
                                <td>
                                    <div class="cart_remove">
                                        <img src=<?php echo FOLDER_ICON . "icons8_delete_60px.png"; ?> >
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="button_ajout_log">
                    <button type="reset">Annuler</button>
                    <button type="submit" class="creer_terr">Créer</button>
                </div>
            </form>
        </div>
    </div>