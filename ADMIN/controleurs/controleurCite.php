<?php

require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/modulecite.php");
$cite = new Cite();


$action = $_POST["action"] ?? $_GET["action"];

if ( isset($_POST["action"]) && !empty($_POST["action"]) ) {
    

    if ($_POST["action"] == "getAllCite") {
        $search = empty($_POST["searchCite"]) ?? "";

        $res = $cite->getAllCite($dbo, $search);
        echo json_encode($res);
    }

    elseif ($_POST["action"] == "insertCite") {
        $codeCite = $_POST["codeCite"];
        $libCite = $_POST["libCite"];
        $codeAg = $_POST["codeAg"];

        $res = $cite->insertCite($dbo, $codeCite, $libCite, $codeAg);
        echo $res;
    }

    elseif ($_POST["action"] == "updateCite") {
        $codeCite = $_POST["codeCite"];
        $libCite = $_POST["libCite"];
        $codeAg = $_POST["codeAg"];

        $res = $cite->updateCite($dbo, $codeCite, $libCite, $codeAg);
        echo $res;
    }

    elseif ($_POST["action"] == "deletecite") {
        $codeCite = $_POST["codeCite"];
        
        $res = $cite->deleteCite($dbo, $codeCite);
        echo $res;
    }

    
}

?>