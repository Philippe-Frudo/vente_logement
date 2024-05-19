<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleLogement.php");
$logement = new Logement();

$action = $_POST["action"] ?? $_GET["action"];

if ( isset($action) && !empty($action) ) {
    
    if ($action == "getAllLog") {
        $search = $_POST["search"] ?? " ";

        $res = $logement->getAllLog($dbo, $search);
         echo json_encode($res);
    }

    elseif ($action == "insertLog") {

        $prixLog = (int)($_POST["prixLog"]);
        $descLog = $_POST["descLog"];
        $codeCite = $_POST["codeCite"];
        $numTer = $_POST["numTer"];
        
        $photo = $_FILES["photoLog"];
        $photo_name = $photo["name"];
        $photo_size = $photo["size"];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
        if ( $photo_size > 1000 ) {
            $upload_photo = "../publics/images/logements/". $unique_photo;
            move_uploaded_file($photo_temp, $upload_photo);
            $res = $logement->insertLog($dbo, $prixLog, $codeCite, $numTer, $descLog, $upload_photo);
            echo json_encode($res);
            
        }else{
            $res = $logement->insertLog($dbo, $prixLog, $codeCite, $numTer, $descLog, "");
            echo json_encode($res);
            header("ContentType: application/json");
        }

        exit();
        
    }

    elseif ($action == "updateLog") {
        $numLog = $_POST["numLog"];
        $prixLog = $_POST["prixLog"];
        $descLog = $_POST["descLog"];
        // $codeCite = $_POST["codeCite"];
        // $numTer = $_POST["numTer"];

        $photo = $_FILES["photoLog"];
        $photo_name = $photo["name"];
        $photo_size = $photo['size'];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
        $upload_photo = FOLDER_IMG_LOG . $unique_photo;

        if ( $photo_size > 1000 ) {
            
            $upload_photo = "../publics/images/logements/". $unique_photo;

            move_uploaded_file($photo_temp, $upload_photo);

            $res = $logement->updateLog($dbo, $numLog, $prixLog, $descLog, $upload_photo);
            // $codeCite, $numTer, 
            echo $res;
            
        }else{
            $res = $logement->updateLog($dbo, $numLog, $prixLog, $descLog, "");
            echo $res;
        }

    }

    elseif($action == "updateLogSolt"){
        $numLog = $_POST["numLog"];
        $res = $logement->updateLogSold($dbo, $numLog, 1);
        echo $res;
    }

    elseif ($action == "deleteLog") {
        $numLog = $_POST["numLog"];
        $res = $logement->deleteLog($dbo, $numLog);
        echo $res;
    }

}


?>