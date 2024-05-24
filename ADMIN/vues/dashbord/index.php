<?php require_once("../../../Rooteur/rooteur.php"); ?>

    <?php require_once("../header/header.php"); ?>
    <title>DASHBORD</title>
    <!----------------- Style -------------->
    <link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
    <link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >
    <link rel="stylesheet" href=<?php echo dashbord_CSS; ?> >

</head>
<body>
    <!-------------------Navigateu ------------->
    <div class="container">

        <?php require_once("../barNav/barNav.php"); ?>

        <!-- ===================== Main =====================  -->
        <div class="main">

            <?php require_once("../topBar/topBar.php"); ?>

            <!-- ===================== Cards =====================  -->
            <?php require_once("cardBox.php"); ?>
            <!-- ===================== Orders Details List =====================  -->

             <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Cinq dernier payement</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Telephone</td>
                                <td>Mode</td>
                                <td>Montant</td>
                                <td>Date</td>
                            </tr>
                        </thead>

                        <tbody id="listPayement">

                        </tbody>
                    </table>
                </div>

                <!-- ===================== New Customers =====================  -->
                <div class="recentCustomer">
                    <div class="cardHeader">
                        <h2>Cinq dernier clients</h2>
                    </div>
                    <table id="listClient" style="overflow-y:scroll">
                        <!-- <tr>
                            <td style = "width: 60px">
                                <div class="imgBox">
                                    <img src=<?php echo FOLDER_IMG_SITE . "Atik20230220_100155_👹👹Atik SE 4👹👹.jpg"; ?> >
                                </div>
                            </td>
                            <td>
                                <h4>David <br><span>Italy</span></h4>
                            </td>
                        </tr>
                        </tr>-->
                        
                    </table>
                </div>

             </div>
        </div>
    </div>
    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkDashbord").classList.add("hovered");
    </script>
    <script src=<?php echo default_JS; ?>></script>
    <script src=<?php echo default_functions_JS; ?>></script>
    <script type="module" src=<?php echo dashbord_JS; ?>></script>

</body>
</html>