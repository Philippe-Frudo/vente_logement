<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();
// new connexionBD();

require_once("../modules/moduleterrain.php");
$terrain = new Terrain();

$action = $_POST["action"] ?? $_GET["action"];

if ( isset($_POST["action"]) && !empty($_POST["action"]) ) {
    
        if ($_POST["action"] == "getAllTer") {
            $search = empty($_POST["searchTer"]) ?? "";

            $res = $terrain->getAllTer($dbo, $search);
            echo json_encode($res);
        }
    
        elseif ($_POST["action"] == "insertTer") {
            $numTer = $_POST["numTer"];
            $superficieTer = $_POST["superficieTer"];
    
            $res = $terrain->insertTer($dbo, $numTer, $superficieTer);
            echo $res;
        }

        elseif ($_POST["action"] == "updateTer") {
            $numTer = $_POST["numTer"];
            $superficieTer = $_POST["superficieTer"];
    
            $res = $terrain->updateTer($dbo, $numTer, $superficieTer);
            echo $res;
        }
            
        elseif ($_POST["action"] == "deleteTer") {
            $numTer = $_POST["numTer"];

            $res = $terrain->deleteTer($dbo, $numTer, $superficieTer);
            echo $res;
        }


}