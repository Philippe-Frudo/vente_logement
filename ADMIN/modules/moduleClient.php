<?php

class Client {
    
    function getAllCli($dbo, $search){
        $cmd = "SELECT * FROM Client ";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    function insertCli($dbo, $nomCli, $adrsCli, $prenomCli, $CINCli, $professionCli, $telCli, $photoCli){
        $cmd = "INSERT INTO client
                VALUES (NULL, :nomCli, :adrsCli, :prenomCli, :CINCli, NULL, :professionCli, :telCli, :photoCli)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":nomCli"=>$nomCli, 
                    ":adrsCli"=>$adrsCli,
                   ":prenomCli"=>$prenomCli, 
                    ":CINCli"=>$CINCli, 
                    // ":sexeCli"=>$sexeCli, 
                    ":professionCli"=>$professionCli, 
                    ":telCli"=>$telCli,
                    ":photoCli"=>$photoCli
                ]);
            return 1;
            // return "Une nouvelle client a ete ajoute";

        } catch (Exception $e) {
            return 0;
            // return "Erreur lors de l'ajout du Client" . $e->getMessage();
        }
    }

    function updateCli($dbo, $numCli, $nomCli, $adrsCli, $prenomCli, $CINCli, $sexeCli, $professionCli, $telCli, $photo){
        $cmd = "UPDATE Client SET nomCli=:nomCli, adrsCli=:adrsCli, prenomCli=:prenomCli, CINCli=:CINCli, sexeCli=:sexeCli, professionCli=:professionCli, telCli=:telCli
                WHERE numCli=:numCli";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":numCli"=>$numCli,
                    ":nomCli"=>$nomCli, 
                    ":adrsCli"=>$adrsCli,
                   ":prenomCli"=>$prenomCli, 
                    ":CINCli"=>$CINCli, 
                    ":sexeCli"=>$sexeCli, 
                    ":professionCli"=>$professionCli, 
                    ":telCli"=>$telCli
                ]);
            
            return "Modification Client reussite";

        } catch (Exception $e) {
            return "Echec de la modification de Client" . $e->getMessage();
        }
    }

    function deleteCli($dbo, $numCli){
        $cmd = "DELETE FROM Client WHERE numCli=:numCli";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":numCli"=>$numCli]);
            return "Le client a ete supprime";

        } catch (Exception $e) {
            return "Erreur lors de la suppression du Client" . $e->getMessage();
        }
    }


}