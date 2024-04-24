<?php

class Utilisateur {
    
    function getAllU($dbo, $search){
        $cmd = "SELECT * FROM utilisateur";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($res);
    }

    function insertU($dbo, $nomU, $prenomU, $emailU, $sexeU, $adrsU, $telU, $passwordU){
        $cmd = "INSERT INTO utilisateur
                VALUES (NULL, :nomU, :prenomU, :emailU, :sexeU, :adrsU, :telU, :passwordU)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":nomU"=>$nomU, 
                    ":prenomU"=>$prenomU, 
                    ":emailU"=>$emailU,
                    ":sexeU"=>$sexeU, 
                    ":adrsU"=>$adrsU,
                    ":telU"=>$telU,
                    ":passwordU"=>$passwordU
                ]);
            return "Une nouvelle utilisateur a ete cree";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout d'une nouvelle Autilisateur" .  $e->getMessage();
        }
    }

    function updateU($dbo,$idU, $nomU, $prenomU, $emailU, $sexeU, $adrsU, $telU, $passwordU){
        $cmd = "UPDATE utilisateur SET nomU=:nomU, prenomU=:prenomU, emailU=:emailU, sexeU=:sexeU, adrsU=:adrsU, telU=:telU, passwordU=:passwordU
                WHERE idU=:idU";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    "idU"=>$idU,
                    ":nomU"=>$nomU, 
                    ":prenomU"=>$prenomU, 
                    ":emailU"=>$emailU,
                    ":sexeU"=>$sexeU, 
                    ":adrsU"=>$adrsU,
                    ":telU"=>$telU,
                    ":passwordU"=>$passwordU
                ]);
            return "Modification de l'utilisateur reussite";

        } catch (Exception $e) {
            return "Echec lors de la modification de utilisateur" . $e->getMessage();
        }
    }

    function deleteU($dbo, $idU){
        $cmd = "DELETE FROM utilisateur WHERE codeU=:codeU";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":codeU"=>$idU]);
            return "L'utilisateur a ete supprime";

        } catch (Exception $e) {
            return "Erreur lors de la suppression de l'utilisateur" . $e->getMessage();
        }
    }


}
