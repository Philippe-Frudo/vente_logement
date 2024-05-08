<?php

class Acheter {
    
    function getAllAchat($dbo, $search){
        //WHERE l.descachet =:descachet OR p.nomProvince =:province OR a.libAg=:libAg
        $cmd = "SELECT c.codeCli, c.nomCli, c.prenomCli, c.telCli, c.adrsCli, a.numLog, l.prixLog, a.typeVente, a.dateVente, a.dateLimite, CONCAT(l.codeCite ,' ', cite.libCite) AS cite, prov.nomProvince, (l.prixLog - SUM(p.montantPayer)) AS reste, SUM(p.montantPayer) AS totalPay, COUNT(p.codePayement) AS nombrePay FROM acheter a
                LEFT JOIN client c ON c.codeCli = a.codeCli
                LEFT JOIN logement l ON l.numLog = a.numLog
                LEFT JOIN cite ON cite.codeCite = l.codeCite 
                LEFT JOIN agence ag ON ag.codeAg = cite.codeAg
                LEFT JOIN province prov ON prov.codeProvince = ag.codeProvince
                LEFT JOIN payement p ON p.numLog = l.numLog
                WHERE l.soldLog = TRUE
                GROUP BY p.numLog
                ORDER BY p.datePayement DESC";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;

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