<?php
require_once 'BDD\db.php';
require_once 'do\dto\TypeCompteDTO.php';

class TypeCompteDAO {
    private $conn;

    public function __construct() {
        global $servername, $username, $password, $dbname;
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function getTypeByID($TypeID) {
        $stmt = $this->conn->prepare("SELECT * FROM typecompte WHERE ID_TypeCompte = :typeID");
        $stmt->bindParam(':typeID', $TypeID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $TypeCompteDTO = new TypeCompteDTO();
        $TypeCompteDTO->ID_TypeCompte = $result['ID_TypeCompte'];
        $TypeCompteDTO->nom = $result['nom'];
        echo $result['ID_TypeCompte'].":".$result['nom'];
        return $TypeCompteDTO;
    }

    public function getListeClients() {
        $stmt = $this->conn->query("SELECT * FROM typecompte");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $Types = array();
        foreach ($results as $result) {
        $TypeCompteDTO = new TypeCompteDTO();
        $TypeCompteDTO->ID_Type = $result['ID_TypeCompte'];
        $TypeCompteDTO->Nom = $result['nom'];
        $Types[] = $TypeCompteDTO;
        }
    
        return $Types;
    }
   
}
?>
