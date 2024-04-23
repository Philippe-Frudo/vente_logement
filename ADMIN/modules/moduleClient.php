<?php

class Client {
    
    function getAllCli($dbo, $search){
        $cmd = "SELECT * FROM Client 
                WHERE nomCli LIKE %:nomCli%  OR prenomCli LIKE %:prenomCli%  OR telCli LIKE %:telCli% ";

        $query = $dbo->conn->prepare($cmd);
        $query->execute(
            [
                ":nomCli"=>$search,
                ":prenomCli"=>$search,
                ":telCli"=>$search
            ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($res);

    }

    function insertCli($dbo, $nomCli, $adrsCli, $prenomCli, $CINCli, $sexeCli, $professionCli, $telCli, $photo){
        $cmd = "INSERT INTO Client
                VALUES (NULL, :nomCli, :adrsCli :prenomCli, :CINCli, :sexeCli, :professionCli, :telCli)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":nomCli"=>$nomCli, 
                    ":adrsCli"=>$adrsCli,
                   ":prenomCli"=>$prenomCli, 
                    ":CINCli"=>$CINCli, 
                    ":sexeCli"=>$sexeCli, 
                    ":professionCli"=>$professionCli, 
                    ":telCli"=>$telCli
                ]);
            return "Une nouvelle client a ete ajoute";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout du Client" . $e->getMessage();
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