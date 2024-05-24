<?php

class Payement {
    
    function getAllPayer($dbo, $search){
        //WHERE l.descPayer =:descPayer OR p.nomProvince =:province OR a.libAg=:libAg
        $cmd = "SELECT *, SUM(p.montantPayer) AS Total_Montant_P FROM  payement p
                LEFT JOIN logement l ON l.numLog = p.numLog
                GROUP BY p.datePayement ASC";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function insertPayer($dbo, $codePayer, $montantPayer, $numLog, $modePayer){
        $cmd = "INSERT INTO payement(codePayement, montantPayer, numLog, modePayement) 
                VALUES (:codePayement, :montantPayer, :numLog, :modePayement)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    "codePayement"=>$codePayer,
                    ":montantPayer"=>$montantPayer, 
                    ":numLog"=>$numLog, 
                    ":modePayement"=>$modePayer
                ]);
                return 1;
            // return "Ajout payement succes";

        } catch (Exception $e) {
            return 0;
            // return "Erreur lors de l'ajout du payement" . $e->getMessage();
        }
    }

    function updatePayer($dbo, $codePayement, $montantPayer, $numLog, $modePayer){
        $cmd = "UPDATE payement SET montantPayer=:montantPayer, numLog=:numLog, modePayement=:modePayement
                WHERE codePayement=:codePayement AND numLog=:numLog";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":codePayement"=>$codePayement, 
                    ":montantPayer"=>$montantPayer, 
                    ":numLog"=>$numLog, 
                    ":modePayement"=>$modePayer
                ]);
            
            return 1;
            // return "Modification payement reussite";

        } catch (Exception $e) {
            return "Echec de la modification de payement" . $e->getMessage();
        }
    }

    function deletePayer($dbo, $codeP){
        $cmd = "DELETE FROM payement WHERE codePayement=:codePayement";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":codePayement"=>$codeP]);
            return 1;
            // return "Suppression d'achat succes";

        } catch (Exception $e) {
            return "Erreur lors de la suppression d'achat" . $e->getMessage();
        }
    }

    function getBy($dbo, $numLog){
        $cmd = "SELECT * FROM payement WHERE numLog=:numLog  ORDER BY datePayement ";

        $query = $dbo->conn->prepare($cmd);
        $query->execute( [":numLog"=>$numLog ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function getAllLimit($dbo){
        $cmd = "SELECT c.nomCli, c.telCli, p.modePayement, p.montantPayer, p.datePayement 
        FROM  payement p    
        LEFT JOIN acheter a ON a.numLog = p.numLog
        LEFT JOIN client c ON c.codeCli = a.codeCli
        LEFT JOIN logement l ON l.numLog = p.numLog
        ORDER BY p.datePayement DESC
        LIMIT 5";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function getSumMoney($dbo){
        $cmd = "SELECT SUM( montantPayer ) AS total FROM payement";
        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function getSumManeyMonthNow($dbo, $mois){
        $cmd = "SELECT SUM( montantPayer ) AS total FROM payement WHERE MONTH(datePayement) = :mois";
        $query = $dbo->conn->prepare($cmd);
        $query->execute([":mois"=> $mois]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

}

?>