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
                        <h2>AGENCES</h2>
                        <a href="#" class="btn">Ajouter Nouveau</a>
                    </div>

                    <table>
                        <thead class="liste_terrain">
                            <tr>
                                <th colspan="3">Information Client</th>
                                <th colspan="2">Information Longement</th>
                                <th colspan="4">Vente</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>Id</td>
                                <td>Nom</td>
                                <td>Prénom</td>

                                <td>Libélé</td>
                                <td>Description</td>

                                <td>Type</td>
                                <td>Date</td>
                                <td>Date limit</td>
                                <td>Payement</td>

                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="tr liste_terrain">
                                <td><span class="status delivered">Delivered</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="action">
                                    <div class="tr_hover">
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_eye_60px_4.png"; ?> ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_edit_48px_1.png"; ?> ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_trash_can_48px.png"; ?> ></a>
                                    </div>
                                    <div class="tr_dishover">
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_eye_60px_5.png"; ?> ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_edit_48px_2.png"; ?> class="edit_log" ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_remove_48px_2.png"; ?> class="delete_log" ></a>


                                    </div>
                                </td>
                            </tr>

                            <tr class="tr liste_terrain">
                                <td><span class="status pending">Pending</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="action">
                                    <div class="tr_hover">
                                        <a href="#"><img src="../../icon/icons8_eye_60px_4.png"></a>
                                        <a href="#"><img src="../../icon/icons8_edit_48px_1.png"></a>
                                        <a href="#"><img src="../../icon/icons8_trash_can_48px.png"></a>
                                    </div>  
                                    <div class="tr_dishover">
                                        <a href="#"><img src="../../icon/icons8_eye_60px_5.png"></a>
                                        <a href="#"><img src="../../icon/icons8_edit_48px_2.png" class="edit_log"></a>
                                        <a href="#"><img src="../../icon/icons8_remove_48px_2.png" class="delete_log"></a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
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
    <script src=<?php echo default_JS; ?>></script>
    <script src=<?php echo default_functions_JS; ?>></script>
    <script src=<?php echo acheter_JS; ?>></script>

</body>
</html>