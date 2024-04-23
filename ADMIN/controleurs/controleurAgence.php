<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleagence.php");
$agence = new Agence();

$action = $_POST["action"] ?? $_GET["action"];

if ( isset($_POST["action"]) && !empty($_POST["action"]) ) {
    
    if ($_POST["action"] == "getAllAg") {
        $search = empty($_POST["searchAg"]) ?? "";

        $res = $agence->getAllAg($dbo, $search, $search);
        echo json_encode($res);
    }

    elseif ($_POST["action"] == "insertAg") {
        $libAg= $_POST["libAg"];
        $codeProvAg= $_POST["codeProvAg"]; 
        $adrsAg= $_POST["adrsAg"]; 
        $telAg= $_POST["telAg"];
        $password = $_POST["passwordAg"];

        $res = $agence->insertAg($dbo, $libAg, $codeProvAg, $adrsAg, $telAg, $password);
        echo $res;
    }

    elseif ($_POST["action"] == "updateAg") {
        $codeAg= $_POST["codeAg"];
        $libAg= $_POST["libAg"];
        $codeProvAg= $_POST["codeProvAg"]; 
        $adrsAg= $_POST["adrsAg"]; 
        $telAg= $_POST["telAg"];
        $password = $_POST["passwordAg"];

        $res = $agence->insertAg($dbo, $codeAg, $libAg, $codeProvAg, $adrsAg, $telAg, $password);
        echo $res;
    }

    elseif ($_POST["action"] == "deleteAg") {
        $codeAg = $_POST["codeAg"];
        $res = $agence->deleteAg($dbo, $codeAg);
        echo $res;
    }


}


?>