<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleAcheter.php");
$acheter = new Acheter();


$action = $_POST["action"] ?? $_GET["action"];

if ( isset($action ) && !empty($action ) ) {
    

    if ($action  == "getAllAchat") {
        $search = empty($_POST["search"]) ?? "";

        $res = $acheter->getAllAchat($dbo, $search, $search, $search, $search);
        echo json_encode($res);
    }

    elseif ($action  == "insertAchat") {
        $codeCli = $_POST["codeCli"];
        $numLog = $_POST["numLog"];
        $typeVente = $_POST["typeVente"];
        $dateLimite = $_POST["dateLimite"];

        $res = $acheter->insertAchat($dbo, $codeCli, $numLog, $typeVente, $dateLimite);
        echo $res;
    }

    elseif ($action  == "updateAchat") {
        $codeCli = $_POST["codeCli"];
        $numLog = $_POST["numLog"];
        $typeVente = $_POST["typeVente"];
        $dateLimite = $_POST["dateLimite"];

        $res = $acheter->updateAchat($dbo, $codeCli, $numLog, $typeVente, $dateLimite);
        echo $res;
    }

    elseif ($action  == "deleteAchat") {
        $codeCli = $_POST["codeCli"];
        $numLog = $_POST["numLog"];
        $res = $acheter->deleteAchat($dbo, $codeCli, $numLog);
        echo $res;
    }


}


?>