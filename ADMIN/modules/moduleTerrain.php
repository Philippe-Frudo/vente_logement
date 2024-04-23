<?php

class Terrain {

    function getAllTer($dbo, $search){
        //WHERE l.descLog =:descLog OR p.nomterrain =:terrain OR a.libAg=:libAg
        $cmd = "SELECT * FROM terrain WHERE numTer LIKE %:numTer%";

        $query = $dbo->conn->prepare($cmd);
        $query->execute([":nomTer"=>$search]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($res);
    }

    function insertTer($dbo, $numTer, $superficieTer){
        $cmd = "INSERT INTO terrain(numTer, superficieTer) 
                VALUES (:numTer, :superficieTer)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":numTer"=>$numTer, 
                    ":superficieTer"=>$superficieTer 
                ]);
            return "L'ajout de terrain a ete succes";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout de terrain" . $e->getMessage();
        }
    }

    function updateTer($dbo, $numTer, $superficieTer){
        $cmd = "UPDATE terrain SET numTer=:numTer, superficieTer=:superficieTer
                WHERE numTer=:numTer";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":numTer"=>$numTer, 
                    ":superficieTer"=>$superficieTer 
                ]);
            return "Modification de terrain a ete succes";

        } catch (Exception $e) {
            return "Erreur lors de la modification de terrain" . $e->getMessage();
        }
    }

    function deleteTer($dbo, $numTer){
        $cmd = "DELETE FROM terrain WHERE numTer=:numTer";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":numTer"=>$numTer]);
            return "uppression du terrain a ete succes";

        } catch (Exception $e) {
            return "Erreur lors de la suppression du terrain" . $e->getMessage();
        }
    }
}

?>