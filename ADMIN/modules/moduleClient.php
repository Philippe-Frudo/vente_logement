<?php

class Client {
    
    function getAllCli($dbo, $search){
        $cmd = "SELECT * FROM Client ";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    function insertCli($dbo, $nomCli, $adrsCli, $prenomCli, $CINCli, $sexeCli,$professionCli, $telCli, $photoCli){
        $cmd = "INSERT INTO client
                VALUES (NULL, :nomCli, :adrsCli, :prenomCli, :CINCli, :sexeCli, :professionCli, :telCli, :photoCli)";
        
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
        $cmd = "UPDATE Client SET photoCli=:photoCli, nomCli=:nomCli, adrsCli=:adrsCli, prenomCli=:prenomCli, CINCli=:CINCli, sexeCli=:sexeCli, professionCli=:professionCli, telCli=:telCli
                WHERE codeCli=:numCli";
        
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
                    ":telCli"=>$telCli, 
                    ":photoCli"=>$photo
                ]);
            
            return 1;
            // return "Modification Client reussite";

        } catch (Exception $e) {
            return 0;
            // return "Echec de la modification de Client" . $e->getMessage();
        }
    }

    function deleteCli($dbo, $numCli){
        $cmd = "DELETE FROM Client WHERE codeCli=:numCli";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":numCli"=>$numCli]);
            return 1;

        } catch (Exception $e) {
            return 0;
            // return "Erreur lors de la suppression du Client" . $e->getMessage();
        }
    }

    function getNumber($dbo){
        $cmd = "SELECT COUNT(*) AS nombreCli FROM client";
        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function getAllLimit($dbo){
        $cmd = "SELECT * FROM client ORDER BY codeCli DESC LIMIT 5";
        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }


}