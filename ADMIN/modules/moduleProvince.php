<?php

class Province {

    function getAllProv($dbo, $search){
        //WHERE l.descLog =:descLog OR p.nomProvince =:province OR a.libAg=:libAg

        $cmd = "SELECT * FROM province WHERE nomProvince LIKE %:nomProv%";

        $query = $dbo->conn->prepare($cmd);
        $query->execute([":nomProv"=>$search]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($res);

    }

    function insertProv($dbo, $codeProv, $nomProv){
        $cmd = "INSERT INTO province(codeProvince, nomProvince) 
                VALUES (:codeProv, :nomProv)";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":codeProv"=>$codeProv, 
                    ":nomProv"=>$nomProv 
                ]);
            return "L'ajout de Province a ete succes";

        } catch (Exception $e) {
            return "Erreur lors de l'ajout de Province" /*. $e->getMessage()*/;
        }
    }

    function deleteProv($dbo, $codeProv){
        $cmd = "DELETE FROM provincce WHERE codeProvince=:codeProv";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":codeProv"=>$codeProv]);

            return "La suppression de la Province a ete succes";

        } catch (Exception $e) {
            return "Erreur lors de la suppression de Province"   /*$e->getMessage()*/;
        }
    }
}

?>