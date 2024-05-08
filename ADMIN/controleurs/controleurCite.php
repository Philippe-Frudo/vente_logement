<?php

require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleCite.php");
$cite = new Cite();


$action = $_POST["action"] ?? $_GET["action"];

if ( isset($action) && !empty($action) ) {
    

    if ($action == "getAllCite") {
        $search = empty($_POST["searchCite"]) ?? "";

        $res = $cite->getAllCite($dbo, $search);
        echo json_encode($res);
    }

    elseif ($action == "insertCite") {
        $codeCite = $_POST["codeCite"];
        $libCite = $_POST["libCite"];
        $codeAg = $_POST["codeAg"];

        $res = $cite->insertCite($dbo, $codeCite, $libCite, $codeAg);
        echo $res;
    }

    elseif ($action == "updateCite") {
        $codeCite = $_POST["codeCite"];
        $libCite = $_POST["libCite"];
        $codeAg = $_POST["codeAg"];

        $res = $cite->updateCite($dbo, $codeCite, $libCite, $codeAg);
        echo $res;
    }

    elseif ($action == "deletecite") {
        $codeCite = $_POST["codeCite"];
        
        $res = $cite->deleteCite($dbo, $codeCite);
        echo $res;
    }

    
}

?>