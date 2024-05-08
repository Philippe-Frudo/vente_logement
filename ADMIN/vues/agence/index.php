<?php require_once("../../../Rooteur/rooteur.php"); ?>

<?php require_once("../header/header.php"); ?>
    <title>AGENCE</title>

    <!----------------- Style -------------->
    <link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
    <link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >
    <link rel="stylesheet" href=<?php echo agence_CSS; ?> >
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
                                <td>Code</td>
                                <td style="width: 0;"></td>
                                <td>Libélé</td>
                                <td>Adresse</td>
                                <td>Telephone</td>
                                <td>Province</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody id="listeAg">
    
                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Nombre des agence: <strong><span id="nombreAgence"> 5</span></strong></p>
                </div>
             </div>
        </div>
    </div>


    <!-- AJOUTER NOUVEAU AGENCE -->
    <?php require_once("./formAddAgence.php"); ?>
    
    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkAgence").classList.add("hovered");
    </script>
    <script type="module" src=<?php echo default_JS; ?>></script>
    <script type="module" src=<?php echo default_functions_JS; ?>></script>
    <script type="module" src=<?php echo agence_JS; ?>> </script> 

</body>
</html>