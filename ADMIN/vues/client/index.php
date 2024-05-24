<?php require_once("../../../Rooteur/rooteur.php"); ?>

<?php require_once("../header/header.php"); ?>

    <title>CLIENT</title>
    <!----------------- Style -------------->
    <link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
    <link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >
    <link rel="stylesheet" href=<?php echo client_CSS; ?> >
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
                        <div class="add_new">
                            <h2>CLIENTS</h2>
                            <p>
                                <a href="#" class="btn"> Ajouter Nouveau </a>
                            </p>
                        </div>
                        <!-- <a href="#" class="btn">Filtrer</a> -->
                        <input style="padding-left: 5px" id="myinputSearch" type="text" placeholder="Rechercher">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Photo</td>
                                <td>Nom</td>
                                <td>Prénom</td>
                                <td>CIN</td>
                                <td>Profession</td>
                                <td>Adresse</td>
                                <td>Phone</td>
                                <td>Sexe</td>
                                <td>Modifier</td>
                                <td>Supprimer</td>
                            </tr>
                        </thead>
                        <tbody id="allClients" class="myTable">
 
                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Nombre de clients: <strong><span id="nombreClient"> 5</span></strong></p>
                </div>
             </div>
        </div>
    </div>

    <!-- AJOUTER NOUVEAU CLIENT -->
    <?php require_once("./formAddClient.php"); ?>
    <?php require_once("./formUpdateClient.php"); ?>

    <div id="contentMessage">
        <p id="message">Voici une message</p>
    </div>

    
    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkClient").classList.add("hovered");
    </script>
    <script type="module" src=<?php echo default_JS; ?>></script>
    <script type="module" src=<?php echo client_JS; ?>></script>

</body>
</html>