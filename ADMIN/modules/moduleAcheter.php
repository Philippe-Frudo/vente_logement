<?php

class Acheter {
    
    function getAllAchat($dbo, $dateVente, $dateLimite, $nomCli, $numLog){
        //WHERE l.descachet =:descachet OR p.nomProvince =:province OR a.libAg=:libAg
        $cmd = "SELECT c.*, l.* , a.typeVente, a.dateVente, a.dateLimite 
                FROM acheter a
                LEFT JOIN client c ON c.codeCli = a.codeCli
                LEFT JOIN logement l ON l.numLog = a.numLog;
                ORDER BY a.dateVente ASC";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($res);

    }

    function insertAchat($dbo, $codeCli, $numLog, $typeVente, $dateLimite){
        $cmd = "INSERT INTO acheter(codeCli, numLog, typeVente, dateLimite) 
                VALUES (:codeCli, :numLog, :typeVente, :dateLimite)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":codeCli"=>$codeCli, 
                    ":numLog"=>$numLog, 
                    ":typeVente"=>$typeVente, 
                    ":dateLimite"=>$dateLimite
                ]);
            return "Achat succes";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout du acheter" . $e->getMessage();
        }
    }

    function updateAchat($dbo, $codeCli, $numLog, $typeVente, $dateLimite){
        $cmd = "UPDATE acheter SET codeCli=:codeCli, numLog=:numLog, typeVente=:typeVente, dateLimite=:dateLimite
                WHERE codeCli=:codeCli AND numLog=:numLog";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":codeCli"=>$codeCli, 
                    ":numLog"=>$numLog, 
                    ":typeVente"=>$typeVente, 
                    ":dateLimite"=>$dateLimite
                ]);
            
            return "Modification achat reussite";

        } catch (Exception $e) {
            return "Echec de la modification de acheter" . $e->getMessage();
        }
    }

    function deleteAchat($dbo, $codeCli, $numLog){
        $cmd = "DELETE FROM acheter WHERE codeCli=:codeCli AND numLog=:numLog";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([
                ":codeCli"=>$codeCli, 
                ":numLog"=>$numLog
            ]);

            return "Suppression d'achat succes";

        } catch (Exception $e) {
            return "Erreur lors de la suppression d'achat" . $e->getMessage();
        }
    }


}