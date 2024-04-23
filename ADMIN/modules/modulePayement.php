<?php

class Payement {
    
    function getAllPayer($dbo, $numLog, $codeP){
        //WHERE l.descPayer =:descPayer OR p.nomProvince =:province OR a.libAg=:libAg
        $cmd = "SELECT *, SUM(p.montantPayer) AS Total_Montant_P FROM  payement p
                LEFT JOIN logement l ON l.numLog = p.numLog
                GROUP BY p.numLog
                ORDER BY p.numLog ASC";

        $query = $dbo->conn->prepare($cmd);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($res);
    }

    function insertPayer($dbo, $montantPayer, $numLog, $modePayer){
        $cmd = "INSERT INTO payement(montantPayer, numLog, modePayement) 
                VALUES (:montantPayer, :numLog, :modePayement)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":montantPayer"=>$montantPayer, 
                    ":numLog"=>$numLog, 
                    ":modePayement"=>$modePayer
                ]);
            return "Ajout payement succes";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout du payement" . $e->getMessage();
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
            
            return "Modification payement reussite";

        } catch (Exception $e) {
            return "Echec de la modification de payement" . $e->getMessage();
        }
    }

    function deletePayer($dbo, $codeP){
        $cmd = "DELETE FROM payement WHERE codePayement=:codePayement";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":codePayement"=>$codeP]);
            return "Suppression d'achat succes";

        } catch (Exception $e) {
            return "Erreur lors de la suppression d'achat" . $e->getMessage();
        }
    }


}

?>