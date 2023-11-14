<?php
require_once 'BDD\db.php';
require_once 'do\dto\AgenceDTO.php';

class AgenceDAO {
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

    public function getAgenceByID($AgenceID) {
        $stmt = $this->conn->prepare("SELECT * FROM Client WHERE ID_Client = :clientID");
        $stmt->bindParam(':clientID', $clientID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $AgenceDTO = new AgenceDTO();
        $AgenceDTO->ID_Agence = $result['ID_Agence'];
        $AgenceDTO->NomAgence = $result['NomAgence'];
        $AgenceDTO->NumeroTelephone = $result['NumeroTelephone'];
        $AgenceDTO->Adresse_Email = $result['email_agence'];
        $AgenceDTO->ville = $result['ville'];

        return $AgenceDTO;
    }

    public function getListeClients() {
        $stmt = $this->conn->query("SELECT * FROM Client");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $agences = array();
        foreach ($results as $result) {
            $AgenceDTO = new AgenceDTO();
            $AgenceDTO->ID_Agence = $result['ID_Agence'];
            $AgenceDTO->NomAgence = $result['NomAgence'];
            $AgenceDTO->NumeroTelephone = $result['NumeroTelephone'];
            $AgenceDTO->Adresse_Email = $result['email_agence'];
            $AgenceDTO->ville = $result['ville'];
            $agences[] = $AgenceDTO;
        }
    
        return $agences;
    }
   
}
?>
