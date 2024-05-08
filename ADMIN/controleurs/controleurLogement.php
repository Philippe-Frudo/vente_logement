<?php
require_once("../../Rooteur/rooteur.php");

require_once("../../Database/connexionBD.php");
$dbo = new connexionBD();

require_once("../modules/moduleLogement.php");
$logement = new Logement();

// $f = json_encode($file);
// $photo = $_FILES[$f];

// $photo_name = "Capture d'écran 2024-02-21 003510.png";
// echo $photo_name. "<br>"; = 

// $f = "C:\\fakepath\\WIN_20240121_10_38_31_Pro.jpg";

// $photo = $_FILES["{name: 'WIN_20240121_10_38_52_Pro.jpg', lastModified: 1705829932418}"]["name"]


// echo var_dump($photo);

// $photo_temp = $photo["temp_name"];
// echo $photo_temp. "<br>";

// $photo_div = explode('.', $photo_name);
// echo $photo_div . "<br>";

// $photo_text = strtolower(end($photo_div));
// echo $photo_text. "<br>";

// $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
// echo $unique_photo. "<br>";

// $upload_photo = FOLDER_IMG_LOG . $unique_photo;
// echo $upload_photo. "<br>";

// move_uploaded_file($photo_temp, $upload_photo);

// exit();

$action = $_POST["action"] ?? $_GET["action"];

if ( isset($action) && !empty($action) ) {
    
    if ($action == "getAllLog") {
        $search = $_POST["search"] ?? " ";

        $res = $logement->getAllLog($dbo, $search);
         echo json_encode($res);
    }

    elseif ($action == "insertLog") {

        if(isset($_FILES["photoLog"])){
            echo "MISY";
        } else{
            echo "TSY MISY";
        }
        // $photo = $_FILES["photoLog"];
        // echo     $photo;
        
        $photo_tmp = $_FILES["photoLog"]["tmp_name"];
        
        $time = time();
        
        $nouvNom = $photo.$time;
        exit();

        $prixLog = (int)($_POST["prixLog"]);
        $descLog = $_POST["descLog"];
        $codeCite = $_POST["codeCite"];
        $numTer = $_POST["numTer"];
        
        $photo = $_FILES["photoLog"];
        $photo_name = $photo["name"];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
        $upload_photo = FOLDER_IMG_LOG . $unique_photo;
        move_uploaded_file($photo_temp, $upload_photo);

        $res = $logement->insertLog($dbo, $prixLog, $codeCite, $numTer, $descLog, $upload_photo);
        echo json_encode($res);
        header("ContentType: application/json");
        exit();
    }


    elseif ($action == "updateLog") {
        $photo = $_FILES["temp_name"]["name"];
        $photo_tmp = $_FILES["temp_name"]["tmp_name"];
        $time = time();
        $nouvNom = $photo.$time;
        // echo $nouvNom;

        exit();

        $numLog = $_POST["numLog"];
        $prixLog = $_POST["prixLog"];
        $descLog = $_POST["descLog"];
        $codeCite = $_POST["codeCite"];
        $numTer = $_POST["numTer"];

        $photo = $_FILES["photoLog"];
        $photo_name = $photo["name"];
        $photo_temp = $photo["tmp_name"];
        $photo_div = explode('.', $photo_name);
        $photo_text = strtolower(end($photo_div));
        $unique_photo = substr(md5(time()), 0, 10). '.' . $photo_text;
        $upload_photo = FOLDER_IMG_LOG . $unique_photo;
        move_uploaded_file($photo_temp, $upload_photo);

        $res = $logement->updateLog($dbo, $numLog, $prixLog, $descLog, $codeCite, $numTer, $upload_photo);
        echo $res;
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