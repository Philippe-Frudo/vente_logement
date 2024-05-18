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
        $sexeCli= $_POST["sexeCli"];
        $professionCli= $_POST["professionCli"]; 
        $telCli= $_POST["telCli"];

        $photo = $_FILES["photoCli"];
        $photo_name = $photo["name"] !== null ? $photo["name"] :"8a61b9dbb9.jpg";
        $photo_size = $photo['size'];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;

        $res = null;
        if ( $photo_size > 10000 ) {
            
            $upload_photo = "../publics/images/clients/". $unique_photo;

            move_uploaded_file($photo_temp, $upload_photo);

            $res = $client->insertCli($dbo, $nomCli, $adrsCli, $prenomCli, $CINCli , $sexeCli,$professionCli, $telCli, $upload_photo);
        
        }else{   
            $res = $client->insertCli($dbo, $nomCli, $adrsCli, $prenomCli, $CINCli , $sexeCli,$professionCli, $telCli, "");
        }

        echo json_encode($res);
        header("ContentType: application/json");

    }

    elseif ($action == "updateCli") {
        $numCli= (int)$_POST["numCli"];
        $nomCli= $_POST["nomCli"];
        $adrsCli= $_POST["adrsCli"]; 
        $prenomCli= $_POST["prenomCli"] == "" ? "":$_POST["prenomCli"];
        $CINCli= $_POST["CINCli"]; 
        $sexeCli= $_POST["sexeCli"];
        $professionCli= $_POST["professionCli"]; 
        $telCli= $_POST["telCli"];

        $photo = $_FILES["photoCli"] !== null ? $_FILES["photoCli"]:"C:\xampp\htdocs\gestion_vente_logement\ADMIN\publics\images\clients\8a61b9dbb9.jpg";
        $photo_name = $photo["name"] !== null ? $photo["name"] :"8a61b9dbb9.jpg";
        $photo_size = $photo['size'];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
        
        if ( $photo_size > 10000 ) {
            $upload_photo = "../publics/images/clients/". $unique_photo;
            move_uploaded_file($photo_temp, $upload_photo);

            $res = $client->updateCli($dbo, $numCli, $nomCli, $adrsCli, $prenomCli, $CINCli, $sexeCli, $professionCli, $telCli, $upload_photo);
            echo json_encode($res);
            
        }else{  
            $res = $client->updateCli($dbo, $numCli, $nomCli, $adrsCli, $prenomCli, $CINCli, $sexeCli, $professionCli, $telCli, "");
            echo json_encode($res);
        }


    }
    elseif ($action == "deleteCli") {
        $numCli = $_POST["numCli"];
        $res = $client->deleteCli($dbo, $numCli);
        echo json_encode($res);
    }

}


?>