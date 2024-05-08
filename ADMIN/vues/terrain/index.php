<?php require_once("../../../Rooteur/rooteur.php"); ?>

<?php require_once("../header/header.php"); ?>

    <title>TERRAIN</title>
    <!----------------- Style -------------->
    <link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
    <link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >
    <link rel="stylesheet" href=<?php echo terrain_CSS; ?> >

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
                        <h2>Terrains</h2>
                        <a href="#" class="btn">Ajouter Nouveau</a>
                    </div>

                    <table>
                        <thead class="liste_terrain">
                            <tr>
                                <td>Numero</td>
                                <td>Superficie</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody id="liste_terrain">
                            
                        <!-- <tr  class="tr liste_terrain">
                                <td><span class="status delivered">Delivered</span></td>
                                <td><span class="status delivered">Delivered</span></td>
                                <td class="action">
                                    <div class="tr_hover">
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_eye_60px_4.png"; ?> ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_edit_48px_1.png"; ?> ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_trash_can_48px.png"; ?> ></a>
                                    </div>  
                                    <div class="tr_dishover">
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_eye_60px_5.png"; ?> ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_edit_48px_2.png"; ?> class="edit_log" ></a>
                                        <a href="#"><img src=<?php echo FOLDER_ICON . "icons8_remove_48px_2.png"; ?>  class="delete_log" ></a>
                                    </div>
                                </td>
                            </tr> -->

                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Nombre de Terrain: <strong><span id="nombreTer"> 5</span></strong></p>
                </div>
             </div>
        </div>
    </div>


    <!-- AJOUTER NOUVEAU TERRAIN -->
    <?php require_once("./formAddTer.php"); ?>


    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkTerrain").classList.add("hovered");
    </script>
    <script type="module" src=<?php echo default_JS; ?>></script>
    <script type="module" src=<?php echo default_functions_JS; ?>></script>
    <script type="module" src=<?php echo terrain_JS; ?>></script>

</body>
</html>