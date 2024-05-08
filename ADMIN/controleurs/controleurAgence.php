<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleAgence.php");
$agence = new Agence();

$action = $_POST["action"] ?? $_GET["action"];

if ( isset($action) && !empty($action) ) {
    
    if ($action == "getAllAg") {
        $search = empty($_POST["searchAg"]) ?? "";

        $res = $agence->getAllAg($dbo, $search);
        echo json_encode($res);
        // header("location:json/application");
    }

    elseif ($action == "insertAg") {
        $libAg= $_POST["libAg"];
        $codeProvAg= $_POST["codeProvince"]; 
        $adrsAg= $_POST["adresseAg"]; 
        $telAg= $_POST["telAg"];
        $password = $_POST["passwordAg"];

        $res = $agence->insertAg($dbo, $libAg, $codeProvAg, $adrsAg, $telAg, $password);

        echo json_encode($res);
        header("contentType:application/json");
    }

    elseif ($action == "updateAg") {
        $codeAg= $_POST["codeAg"];
        $libAg= $_POST["libAg"];
        $codeProvAg= $_POST["codeProvAg"]; 
        $adrsAg= $_POST["adrsAg"]; 
        $telAg= $_POST["telAg"];
        $password = $_POST["passwordAg"];

        $res = $agence->updateAg($dbo, $codeAg, $libAg, $codeProvAg, $adrsAg, $telAg, $password);
        echo $res;
    }

    elseif ($action == "deleteAg") {
        $codeAg = $_POST["codeAg"];
        $res = $agence->deleteAg($dbo, $codeAg);
        echo $res;
    }


}


?>