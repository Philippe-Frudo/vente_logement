<?php
class Logement {
    
    function getAllLog($dbo, $search){
        //WHERE l.descLog =:descLog OR p.nomProvince =:province OR a.libAg=:libAg
        $cmd = "SELECT l.numLog, l.photoLog, l.prixLog, t.superficieTer, l.descLog, l.codeCite, c.libCite, a.libAg, CONCAT(a.codeProvince, ' ' , p.nomProvince) AS Province 
                FROM logement l
                LEFT JOIN cite c ON c.codeCite = l.codeCite
                LEFT JOIN terrain t ON t.numTer = l.numTer
                LEFT JOIN agence a ON a.codeAg = c.codeAg
                LEFT JOIN province p ON p.codeProvince = a.codeProvince
                WHERE l.soldLog = FALSE
                ORDER BY p.nomProvince ASC";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    function insertLog($dbo, $prixLog, $codeCite, $numTer, $descLog, $photoLog){
        $cmd = "INSERT INTO logement(prixLog, codeCite, numTer, descLog, photoLog) 
                VALUES (:prixLog, :codeCite, :numTer, :descLog, :photoLog)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":prixLog"=>$prixLog, 
                    ":codeCite"=>$codeCite, 
                    ":numTer"=>$numTer, 
                    ":descLog"=>$descLog,
                    ":photoLog"=>$photoLog
                ]);
            return "Un nouveaux logement a ete ajoute";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout du logement" . $e->getMessage();
        }
    }

    function updateLog($dbo, $numLog, $prixLog, $codeCite, $numTer, $descLog, $photoLog){
        $cmd = "UPDATE logement SET prixLog=:prixLog, codeCite=:codeCite, numTer=:numTer, descLog=:descLog, photoLog=:photoLog
                WHERE numLog=:numLog";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":prixLog"=>$prixLog, 
                    ":codeCite"=>$codeCite, 
                    ":numTer"=>$numTer, 
                    ":descLog"=>$descLog,
                    ":numLog"=>$numLog,
                    ":photoLog"=>$photoLog
                ]);
            
            return "Modification logement reussite";

        } catch (Exception $e) {
            return "Echec de la modification de logement" . $e->getMessage();
        }
    }

    function updateLogSold($dbo, $numLog, $soldLog){
        $cmd = "UPDATE logement SET soldLog=:soldLog
                WHERE numLog=:numLog";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":numLog"=>$numLog,
                    ":soldLog"=>$soldLog
                ]);
            
            return "Le logement est vendu";

        } catch (Exception $e) {
            return "Le logement a ete deja vendu" . $e->getMessage();
        }
    }

    function deleteLog($dbo, $numLog){
        $cmd = "DELETE FROM logement WHERE numLog=:numLog";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":numLog"=>$numLog]);

            return "le logement est supprime";

        } catch (Exception $e) {
            return "Erreur lors de la suppression de logement" . $e->getMessage();
        }
    }


}