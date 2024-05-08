<?php require_once("../../../Rooteur/rooteur.php"); ?>

<?php require_once("../header/header.php"); ?>
    <title>ACHETER</title>
    <!----------------- Style -------------->
    <link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
    <link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >
    <link rel="stylesheet" href=<?php echo acheter_CSS; ?> >
</head>
<body>
    <!-------------------Navigateu ------------->
    <div class="container">

        <?php require_once("../barNav/barNav.php"); ?>
    
        <!-- ===================== Main =====================  -->
        <div class="main">

            <?php require_once("../topBar/topBar.php"); ?>

            <!-- ===================== Orders Details List =====================  -->

        <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>LOGEMENT EN COURS DE PAYEMENT</h2>
                        <a href="#" class="btn">Ajouter Nouveau</a>
                    </div>

                    <table style="overflow-x: auto;">
                        <thead class="liste_terrain">
                            <tr>
                                <th colspan="4">Information Client</th>
                                <th colspan="4">Information Longement</th>
                                <th colspan="6">Vente</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>Nom</td>
                                <td>Prénom</td>
                                <td>Telephone</td>
                                <td>Adresse</td>
                                <td>N logement</td>
                                <td>Prix</td>
                                <td>Cite</td>
                                <td>Lieu</td>
                                <td>Type de vente</td>
                                <td>Date de vente</td>
                                <td>Reste a payer</td>
                                <td>Date de limite</td>
                                <td>Total de payement</td>
                                <td>Nombre de payement</td>
                                <td>Action</td>
                                <td>Payement</td>
                   
                            </tr>
                        </thead>

                         <tbody id="listeLogement">
                            <!--<tr class="tr liste_terrain">
                                <td><span class="status delivered">Delivered</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="action">
                                    <div class="tr_hover">
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_eye_60px_4.png"; ?> ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_edit_48px_1.png"; ?> ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_trash_can_48px.png"; ?> ></a>
                                    </div>
                                    <div class="tr_dishover">
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_eye_60px_5.png"; ?> ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_edit_48px_2.png"; ?> class="edit_log" ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_remove_48px_2.png"; ?> class="delete_log" ></a>

                                    </div>
                                </td>
                            </tr> -->

                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Nombre total de logement acheter: <strong><span id="nobreTotalAcheter"></span></strong></p>
                </div>
            </div>
            </div>
        </div>

    <!-- AJOUTER NOUVEAU ACHAT -->
    <?php require_once("./formAddPayement.php"); ?>
    

    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkPayement").classList.add("hovered");
    </script>
    <script type="module" src=<?php echo default_JS; ?>></script>
    <script type="module" src=<?php echo default_functions_JS; ?>></script>
    <script type="module" src=<?php echo acheter_JS; ?>></script>

</body>
</html>