<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleProvince.php");
$Province = new Province();

$action = $_POST["action"] ?? $_GET["action"];

if ( isset($_POST["action"]) && !empty($_POST["action"]) ) {
    
        //SELECTIONNER TOUS LE Province
        if ($_POST["action"] == "getAllProv") {
            $search = $_POST["search"] ?? " ";
            $res = $Province->getAllProv($dbo, $search);
            echo json_encode($res);
        }
    
        elseif ($_POST["action"] == "insertProv") {
            $codeProv = $_POST["codeProv"];
            $nomProv = $_POST["nomProv"];
    
            $res = $Province->insertProv($dbo, $codeProv, $nomProv);
            echo $res;
        }
            
        elseif ($_POST["action"] == "deleteProv") {
            $codeProv = $_POST["codeProv"];

            $res = $Province->deleteProv($dbo, $codeProv);
            echo $res;
        }

}