<?php

require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/modulePayement.php");
$payement = new Payement();


$action = $_POST["action"] ?? $_GET["action"];

if ( isset($_POST["action"]) && !empty($_POST["action"]) ) {
    
    if ($_POST["action"] == "getAllPayer") {
        $search = empty($_POST["search"]) ?? "";

        $res = $payement->getAllPayer($dbo, $search, $search);
        echo json_encode($res);
    }

    elseif ($_POST["action"] == "insertPayer") {
        $codePayer = $_POST["codeP"];
        $montantPayer = $_POST["montantP"];
        $numLog = $_POST["numLog"];
        $modePayer = $_POST["modeP"];

        $res = $payement->insertPayer($dbo, $codePayer, $montantPayer, $numLog, $modePayer);
        echo $res;
    }

    elseif ($_POST["action"] == "updatePayer") {

        $codePayement = $_POST["codeP"];
        $montantPayer = $_POST["montantP"];
        $numLog = $_POST["numLog"];
        $modePayer = $_POST["modeP"];

        $res = $payement->updatePayer($dbo, $codePayement, $montantPayer, $numLog, $modePayer);
        echo $res;
    }

    elseif ($_POST["action"] == "deletePayer") {
        $codePayer = $_POST["codePayer"];
        
        $res = $payement->deletePayer($dbo, $codePayer);
        echo $res;
    }


}

?>