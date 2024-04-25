<?php require_once("../../../Rooteur/rooteur.php"); ?>

<?php require_once("../header/header.php"); ?>

    <title>USER</title>
    <!----------------- Style -------------->
    <link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
    <link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >
    <link rel="stylesheet" href=<?php echo utilisateur_CSS; ?> >

</head>
<body>
    <!-------------------Navigateu ------------->
    <div class="container">

    <?php require_once("../barNav/barNav.php"); ?>

        <!-- ===================== Main =====================  -->
        <div class="main">
            <?php require_once("../topBar/topBar.php"); ?>

            <!-- ===================== Orders Details List =====================  -->

        </div>



    <!----------------- Scripts -------------->
    <script>
        document.querySelector(".navigation ul li.linkUtilisateur").classList.add("hovered");
    </script>
    <script src=<?php echo default_JS; ?>></script>
    <script src=<?php echo default_functions_JS; ?>></script>
    <script src=<?php echo utilisateur_JS; ?>></script>

</body>
</html>