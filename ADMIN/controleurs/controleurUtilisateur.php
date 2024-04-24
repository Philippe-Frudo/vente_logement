<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleUtilisateur.php");
$utilisateur = new Utilisateur();

$action = $_POST["action"] ?? $_GET["action"];

if ( isset($_POST["action"]) && !empty($_POST["action"]) ) {
    
    if ($_POST["action"] == "getAllU") {
        $search = empty($_POST["searchU"]) ?? "";

        $res = $utilisateur->getAllU($dbo, $search);
        echo json_encode($res);
    }

    elseif ($_POST["action"] == "insertU") {
        $nomU = $_POST["nomU"];
        $prenomU = $_POST["prenomU"];
        $emailU = $_POST["emailU"];
        $sexeU = $_POST["sexeU"];
        $adrsU= $_POST["adrsU"]; 
        $telU= $_POST["telU"];
        $passwordU = $_POST["passwordU"];
 
        $res = $utilisateur->insertU($dbo, $nomU, $prenomU, $emailU, $sexeU, $adrsU, $telU, $passwordU);
        echo $res;
    }

    elseif ($_POST["action"] == "updateU") {
        $idU = $_POST["idU"];
        $nomU = $_POST["nomU"];
        $prenomU = $_POST["prenomU"];
        $emailU = $_POST["emailU"];
        $sexeU = $_POST["sexeU"];
        $adrsU= $_POST["adrsU"]; 
        $telU= $_POST["telU"];
        $passwordU = $_POST["passwordU"];
 

        $res = $utilisateur->updateU($dbo,$idU, $nomU, $prenomU, $emailU, $sexeU, $adrsU, $telU, $passwordU);
        echo $res;
    }

    elseif ($_POST["action"] == "deleteU") {
        $idU = $_POST["idU"];
        $res = $utilisateur->deleteU($dbo, $idU);
        echo $res;
    }


}


?>