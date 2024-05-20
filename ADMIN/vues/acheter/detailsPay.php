<div class="fenetre_modale_ajout_log" id="containerDetailsPay">
        <div class="formulaire">
            <div class="paragraphe">
                <p>Historique de payement de logement</p>
                <img src=<?php echo FOLDER_ICON . "icons8_cancel_64px_1.png"; ?> class="close" id="close">
            </div>
            <div class="contentDetails">
                <div>
                    <table style="">
                        <thead class="">
                            <tr>
                                <td>Code Payement</td>
                                <td>Mode p</td>
                                <td>Montant</td>
                                <td>date Pay</td>
                            </tr>
                        </thead>
                         <tbody id="datailsPay">

                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Somme total: <strong class="totalPayement"></strong></p>
                    <p>Nombre de payement: <strong id="nobrePayenment" ></strong></p>
                </div>
            </div>
        </div>
</div>

<style>
    #containerDetailsPay .contentDetails {
        padding: 1rem;
    }
    #containerDetailsPay .contentDetails p{
        padding-top: 1rem;
    }
    #containerDetailsPay table{
        border-collapse: collapse;
    }
    #containerDetailsPay td{
        border: 1px solid #000;
        padding: 1rem;
    }
</style>
