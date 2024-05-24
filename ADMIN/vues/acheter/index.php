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
                        <a style="display: none;" href="#" class="btn">Ajouter Nouveau</a>
                        <input style="padding-left: 5px" id="myinputSearch" type="text" placeholder="Rechercher">
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
                                <td>Mode payement</td>
                                <td>Date de vente</td>
                                <td>Date de limite</td>
                                <td>Total de payement</td>
                                <td>Reste a payer</td>
                                <td>Nombre de payement</td>
                                <td>Detaille</td>
                                <td>Nouveau Payement</td>
                                <td>Supprimer</td>
                                <td>Imprimer</td>
                            </tr>
                        </thead>
                         <tbody id="listeLogement" class="myTable">

                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Nombre total de logement vendu: <strong><span id="nobreTotalAcheter"></span></strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- AJOUTER NOUVEAU ACHAT -->
    <?php require_once("./formAddPayement.php"); ?>
    <?php require_once("./detailsPay.php"); ?>
    <?php require_once("../facture/facture.php");?>
    
    <div id="contentMessage">
        <p id="message">Voici une message</p>
    </div>

    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkPayement").classList.add("hovered");
    </script>
    <script type="module" src=<?php echo default_JS; ?>></script>
    <script type="module" src=<?php echo default_functions_JS; ?>></script>
    <script type="module" src=<?php echo acheter_JS; ?>></script>
    <!-- <script type="module" src=<?php echo payement_JS; ?>></script> -->

</body>
</html>