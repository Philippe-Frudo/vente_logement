<?php



class connexionBD {

 private $serverName = SERVERNAME;
    private $user = USERNAME;
    private $password = PASSWORD;
    private $dbname = NameBD;

    public $conn = '';

    public function __construct() {
        try {
            
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbname", $this->user, $this->password);

            //Modifier le mode d'erreur d'exception du PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connexion succes";

        } catch (PDOException $e) {
            echo "Erreur de connexion Base de donnee" . $e->getMessage();
        }
    }

}
new connexionBD();

?>