<?php require_once("../../../Rooteur/rooteur.php"); ?>

<?php require_once("../header/header.php"); ?>

    <title>LOGEMENT</title>
    <!----------------- Style -------------->
    <link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
    <link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >
    <link rel="stylesheet" href=<?php echo logement_CSS; ?> > 

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
                        <h2>Logements</h2>
                        <a href="#" class="btn">Ajouter Nouveau</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Photo</td>
                                <td>Numero</td>
                                <td>Description</td>
                                <td>Superficie</td>
                                <td>Prix</td>
                                <td>Libélé</td>
                                <td>cité</td>
                                <td>Province</td>
                                <td> Agence</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <!-- SUPPRESSION LONGEMENT -->
                        <?php require_once("./formDeleteLog.php") ?>

                        <tbody id="listeLogement">

                            <!-- <tr class="tr">
                                <td class="photo_log">
                                    <div>
                                        <img src=<?php //echo FOLDER_IMG_SITE . "1681933872284.jpg"; ?> >
                                    </div>
                                </td>
                                <td>Maison des jeunes</td>
                                <td>Trano vato</td>
                                <td>590000Km<sup>2</sup></td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                                <td class="action">
                                    <div class="tr_hover">
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_eye_60px_4.png"; ?> ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_edit_48px_1.png"; ?> ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_trash_can_48px.png"; ?> ></a>
                                    </div>  
                                    <div class="tr_dishover">
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_eye_60px_5.png"; ?> ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_edit_48px_2.png"; ?> class="edit_log" ></a>
                                        <a href="#"><img src=<?php //echo FOLDER_ICON . "icons8_remove_48px_2.png"; ?>  class="delete_log" ></a>

                                    </div>
                                </td>
                            </tr> -->

                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Nombre de Logements disponible: <strong><span id="nombreLog"> 5</span></strong></p>
                </div>
             </div>
        </div>
    </div>

    <!-- AJOUTER NOUVEAU LONGEMENT -->
    <?php require_once("./formAddLog.php"); ?>

    
    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkLogement").classList.add("hovered");
    </script>
    <script type="module" src=<?php echo default_JS; ?>></script>
    <script type="module" src=<?php echo default_functions_JS; ?>></script>
    <script type="module" src=<?php echo logement_JS; ?>></script>
</body>
</html>