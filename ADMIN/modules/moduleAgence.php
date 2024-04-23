<?php

class Agence {
    
    function getAllAg($dbo, $lib, $tel){
        /*WHERE libAg LIKE %:nomAg%  OR telAg LIKE %:telAg% ";*/
        $cmd = "SELECT a.*, p.nomProvince FROM agence a 
                LEFT JOIN province p ON p.codeProvince = a.codeProvince";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        // [":nomAg"=>$nom, ":prenomAg"=>$prenom, ":telAg"=>$tel ]
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($res);
    }

    function insertAg($dbo, $libAg, $codeProvAg, $adrsAg, $telAg, $password){
        $cmd = "INSERT INTO agence
                VALUES (NULL, :libAg, :codeProvAg, :adresseAg, :telAg, :passwordAg )";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":libAg"=>$libAg, 
                    ":codeProvAg"=>$codeProvAg, 
                    ":adresseAg"=>$adrsAg,
                    ":telAg"=>$telAg, 
                    ":passwordAg"=>$password
                ]);
            return "Une nouvelle agence a ete cree";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout d'une nouvelle Aagence" .  $e->getMessage();
        }
    }

    function updateAg($dbo, $codeAg, $libAg, $codeProvAg, $adrsAg, $telAg, $password){
        $cmd = "UPDATE agence SET libAg=:libAg, codeProvince=:codeProvAg, adresseAg=:adresseAg, telAg=:telAg, passwordAg=:passwordAg
                WHERE codeAg=:codeAg";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":codeAg"=>$codeAg, 
                    ":libAg"=>$libAg, 
                    ":codeProvAg"=>$codeProvAg, 
                    ":adresseAg"=>$adrsAg,
                    ":telAg"=>$telAg, 
                    ":passwordAg"=>$password
                ]);
            
            return "Modification d'une agence reussite";

        } catch (Exception $e) {
            return "Echec de la modification de agence" . $e->getMessage();
        }
    }

    function deleteAg($dbo, $codeAg){
        $cmd = "DELETE FROM agence WHERE codeAg=:codeAg";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":codeAg"=>$codeAg]);
            return "L'agence a ete supprime";

        } catch (Exception $e) {
            return "Erreur lors de la suppression de l'agence" . $e->getMessage();
        }
    }


}
