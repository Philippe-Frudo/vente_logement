<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleClient.php");
$client = new Client();


$action = $_POST["action"] ?? $_GET["action"];

if ( isset($action) && !empty($action) ) {
    function getD(){
        $dbo = new connexionBD();
        $client = new Client();
        $search = empty($_POST["searchCli"]) ?? "";
        $res = $client->getAllCli($dbo, $search);
        echo  json_encode($res);

    }

    if ($action == "getAllCli") {
        getD();
    }
    
    elseif ($action == "insertCli") {

        $nomCli= $_POST["nomCli"];
        $adrsCli= $_POST["adrsCli"]; 
        $prenomCli= $_POST["prenomCli"];
        $CINCli= $_POST["CINCli"]; 
        // $sexeCli= $_POST["sexeCli"];
        $professionCli= $_POST["professionCli"]; 
        $telCli= $_POST["telCli"];

        $photo = $_FILES["photoCli"];
        $photo_name = $photo["name"];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
        $upload_photo = FOLDER_IMG_CLIENT . $unique_photo;
        move_uploaded_file($photo_temp, $upload_photo);

        $res = $client->insertCli($dbo, $nomCli, $adrsCli, $prenomCli, $CINCli , $professionCli, $telCli, $upload_photo);
        
        echo json_encode($res);
        header("ContentType: application/json");
        getD();
        exit();
    }

    elseif ($action == "updateCli") {
        $numCli= $_POST["numCli"];
        $nomCli= $_POST["nomCli"];
        $adrsCli= $_POST["adrsCli"]; 
        $prenomCli= $_POST["prenomCli"];
        $CINCli= $_POST["CINCli"]; 
        $sexeCli= $_POST["sexeCli"];
        $professionCli= $_POST["professionCli"]; 
        $telCli= $_POST["telCli"];

        $photo = $_FILES["photoCli"];
        $photo_name = $photo["name"];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
        $upload_photo = FOLDER_IMG_CLIENT . $unique_photo;
        move_uploaded_file($photo_temp, $upload_photo);

        $res = $client->updateCli($dbo, $numCli, $nomCli, $adrsCli, $prenomCli, $CINCli, $sexeCli, $professionCli, $telCli, $upload_photo);
        echo $res;
    }

    elseif ($action == "deleteCli") {
        $numCli = $_POST["numCli"];
        $res = $client->deleteCli($dbo, $numCli);
        echo $res;
    }


}


?>