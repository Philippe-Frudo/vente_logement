<?php require_once("../../../Rooteur/rooteur.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <link rel="stylesheet" href=<?php echo facture_CSS; ?> >
    <style>
        .facture .contentDetails table{
            border-collapse: collapse;
            border: 1px solid #000;
        }
        .facture .contentDetails tr, 
        .facture .contentDetails td,
        .facture .contentDetails th{
            padding: 0.5rem;
            border: 1px solid #000;
        }

        #contentRetour {
            display:none;
            position: absolute;
            top: 1rem;
            right: 1rem;
        }
    </style>

</head>
<body>
    <!-- ========================section 3======================== -->
   <div id="contentRetour">
    <a href="../acheter/index.php">Retour</a>
   </div>
    <div class="content sec3" id="facture" style="display:none;">
        <div class="effect_vente">
            <div class="ajout_vente">
                <!-- ------ vente_right ------ -->
                <div class="vente_right">
                    <div class="shadow">
                        <div class="facture">
                            <h3>Facture</h3>
                            <table class="fact_title">
                                <tr>
                                    <td class="">Agence:</td>
                                    <td class="fact_title_right">
                                        <span class="marg_left"><span class="gras">Facture No.</span> PH000SS2</span> <br>
                                        <span>
                                            <span  class="gras">Date de facturation: </span>
                                            <span id="dateFact"></span>
                                    </span>
                                    </td>
                                </tr>
                            </table>
                            <!-- ligne ligne_haut_adress_cli-->
                            <hr class=ligne_haut_adress_cli>
                            
                            <!-- table 1 -->
                            <table class="address_cli" id="infoCli">
                           
                            </table>
                        
                            <table class="address_cli" id="infoLog">
                            
                            </table>
                        
                        <!-- table 2 -->
                        <div class="contentDetails" >
                            <div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Code payement</th>
                                            <th>Mode de payement</th>
                                            <th>Montant</th>
                                            <th>date de payement</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datailsPayFacture">
                                        
                                    <td>date de payement</td>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div>
                                <!-- <p>Prix du logement:<strong id="prixDuLogF" ></strong></p> -->
                                <p>Nombre de payement:<strong id="nobrePayenmentF" ></strong></p>
                                <p>Total de payement: <strong class="totalPayementF"></strong></p>
                                <p>Retour: <strong id="retourF" ></strong></p>
                                <p>Reste: <strong id="resteF" ></strong></p>
                            </div>
                        </div>
                        </div>
                        <div style="width: 100%; text-align:end; padding:2rem 3rem; display:flex; justify-content:space-between">
                            <p>Signature:</p>
                            <div style="width: 100%; text-align:end; padding:2rem 3rem; display:flex; justify-content:space-between">
                                <p>Client</p>
                                <p>Agence</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>