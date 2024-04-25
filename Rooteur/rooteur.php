<?php

/**
 * 
 
 <?php require_once("../../../Rooteur/rooteur.php"); ?>

 <?php require_once("../header/header.php"); ?>

<link rel="stylesheet" href=<?php echo default_global_CSS; ?> >
<link rel="stylesheet" href=<?php echo default_fenetre_CSS; ?> >

<?php require_once("../barNav/barNav.php"); ?>

<?php require_once("../topBar/topBar.php"); ?>



<script src=<?php echo default_JS; ?>></script>
<script src=<?php echo default_functions_JS; ?>></script>


<?php echo FOLDER_ICON . ""; ?>

<?php echo FOLDER_IMG_SITE . ""; ?>


 */

//VARIABLE BASE DE DONNEES
define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("NameBD", "gestion_vente_longement");


//Lien vers le fichier CSS
define("default_global_CSS", "../../publics/CSS/default/style.css");
define("default_fenetre_CSS", "../../publics/CSS/default/fenetre_modale.css");
define("acheter_CSS", "../../publics/CSS/acheter/style.css");
define("agence_CSS", "../../publics/CSS/agence/style.css");
define("client_CSS", "../../publics/CSS/client/style.css");
define("dashbord_CSS", "../../publics/CSS/dashbord/style.css");
define("logement_CSS", "../../publics/CSS/logement/style.css");
define("parametre_CSS", "../../publics/CSS/parametre/style.css");
define("terrain_CSS", "../../publics/CSS/terrain/style.css");
define("utilisateur_CSS", "../../publics/CSS/utilisateur/style.css");


//Lien ICON
define("FOLDER_ICON", "../../publics/icon/");


//Lien IMAGES
define("FOLDER_IMG_LOG", "../../publics/images/logements/");
define("FOLDER_IMG_CLIENT", "../../publics/images/clients/");
define("FOLDER_IMG_SITE", "../../publics/images/");


//Lien vers le fichier JS
define("default_JS", "../../publics/JS/default/index.js");
define("default_functions_JS", "../../publics/JS/default/functions.js");
define("acheter_JS", "../../publics/JS/acheter/index.js");
define("agence_JS", "../../publics/JS/agence/index.js");
define("client_JS", "../../publics/JS/client/index.js");
define("dashbord_JS", "../../publics/JS/dashbord/index.js");
define("logement_JS", "../../publics/JS/logement/index.js");
define("parametre_JS", "../../publics/JS/parametre/index.js");
define("terrain_JS", "../../publics/JS/terrain/index.js");
define("utilisateur_JS", "../../publics/JS/utilisateur/index.js");


//Lien vers le fichier PHP
define("acheter_PHP", "../acheter/index.php");
define("agence_PHP", "../agence/index.php");
define("client_PHP", "../client/index.php");
define("dashbord_PHP", "../dashbord/index.php");
define("logement_PHP", "../logement/index.php");
define("parametre_PHP", "../parametre/index.php");
define("terrain_PHP", "../terrain/index.php");
define("utilisateur_PHP", "../utilisateur/index.php");




// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAcheter.php?action=URIencodeComponent(action)

// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurAgence.php

// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurCite.php

// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurClient.php

// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurLogement.php

// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurPayement.php

// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurProvince.php

// http://localhost/gestion_vente_logement/ADMIN/controleurs/controleurTerrain.php



?>