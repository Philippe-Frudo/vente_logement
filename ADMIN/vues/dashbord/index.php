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

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        ***
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>
                    <div class="iconBox">
                        ***
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">258</div>
                        <div class="cardName">Comments</div>
                    </div>
                    <div class="iconBox">
                        ***
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earmine</div>
                    </div>
                    <div class="iconBox">
                        ***
                    </div>
                </div>
            </div>

            <!-- ===================== Orders Details List =====================  -->

             <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Resent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payant</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>Dell Laptop</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>
                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- ===================== New Customers =====================  -->
                <div class="recentCustomer">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td style = "width: 60px">
                                <div class="imgBox">
                                    <img src=<?php echo FOLDER_IMG_SITE . "Atik20230220_100155_👹👹Atik SE 4👹👹.jpg"; ?> >
                                </div>
                            </td>
                            <td>
                                <h4>David <br><span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td style = "width: 60px">
                                <div class="imgBox">
                                    <!-- <img src="image/Atik20230220_100155_👹👹Atik SE 4👹👹.jpg"> -->
                                    <img src="../../images/Atik20230220_100155_👹👹Atik SE 4👹👹.jpg">
                                </div>
                            </td>
                            <td>
                                <h4>David <br><span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td style = "width: 60px">
                                <div class="imgBox">
                                    <img src="../../images/Atik20230220_100155_👹👹Atik SE 4👹👹.jpg">
                                </div>
                            </td>
                            <td>
                                <h4>David <br><span>Italy</span></h4>
                            </td>
                        </tr>
                        
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
    <script src=<?php echo dashbord_JS; ?>></script>

</body>
</html>