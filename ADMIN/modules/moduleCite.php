<?php

class Cite {

    function getAllCite($dbo, $search){
        $cmd = "SELECT * FROM cite";
        $query = $dbo->conn->prepare($cmd);
        $query->execute();

        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function insertCite($dbo, $codeCite, $libCite, $codeAg){
        $cmd = "INSERT INTO cite VALUES (:codeCite, :libCite, :codeAg)";
        $query = $dbo->conn->prepare($cmd);

        try {
            $query->execute(
                [
                    ":codeCite"=>$codeCite, 
                    ":libCite"=>$libCite,
                    ":codeAg"=>$codeAg 
                ]);
            return "Une nouveule cite a ete cree";

        } catch (Exception $e) {
            return "Erreur lors de la creation du cite" . $e->getMessage();
        }
    }

    function updateCite($dbo, $codeCite, $libCite, $codeAg){
        $cmd = "UPDATE cite SET libCite=:libCite, codeAg=:codeAg
                WHERE codeCite=:codeCite";
        
        $query = $dbo->conn->prepare($cmd);
        try {
            $query->execute(
                [
                    ":codeCite"=>$codeCite, 
                    ":libCite"=>$libCite,
                    ":codeAg"=>$codeAg 
                ]);
            return "La cite a ete modifie";

        } catch (Exception $e) {
            return "Erreur lors de la modification de cite" . $e->getMessage();
        }
    }

    function deleteCite($dbo, $codeCite){
        $cmd = "DELETE FROM cite WHERE codeCite=:codeCite";
        $query  = $dbo->conn->prepare($cmd);

        try {
            $query->execute([":codeCite"=>$codeCite]);

            return "La cite a ete supprime";

        } catch (Exception $e) {
            return "Erreur lors de la suppression de cite" . $e->getMessage();
        }
    }

}

?>