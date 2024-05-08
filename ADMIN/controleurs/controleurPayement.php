<?php

require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/modulePayement.php");
$payement = new Payement();


$action = $_POST["action"] ?? $_GET["action"];

if ( isset($action) && !empty($action) ) {
    
    if ($action == "getAllPayer") {
        $search = empty($_POST["search"]) ?? "";

        $res = $payement->getAllPayer($dbo, $search);
        echo json_encode($res);
    }

    elseif ($action == "insertPayer") {
        $numLog = (int)($_POST["numLog"]);
        $codePayer = $_POST["codeP"];
        $montantPayer = (int)($_POST["montantP"]);
        $modePayer = $_POST["modePay"];

        $res = $payement->insertPayer($dbo, $codePayer, $montantPayer, $numLog, $modePayer);
        echo json_encode($res);
        header("Content-Type:application/json");
    }

    elseif ($action == "updatePayer") {

        $codePayement = $_POST["codePay"];
        $montantPayer = $_POST["montantPay"];
        $numLog = $_POST["numLog"];
        $modePayer = $_POST["modeP"];

        $res = $payement->updatePayer($dbo, $codePayement, $montantPayer, $numLog, $modePayer);
        echo json_encode($res);
    }

    elseif ($action == "deletePayer") {
        $codePayer = $_POST["codePayer"];
        
        $res = $payement->deletePayer($dbo, $codePayer);
        echo $res;
    }


}

?>