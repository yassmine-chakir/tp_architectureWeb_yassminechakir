<?php
require_once 'BDD\db.php';
require_once 'do\dto\ClientDTO.php';

class ClientDAO {
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

    public function getClientByID($clientID) {
        $stmt = $this->conn->prepare("SELECT * FROM client WHERE ID_client = :clientID");
        $stmt->bindParam(':clientID', $clientID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $clientDTO = new ClientDTO();
        $clientDTO->ID_Client = $result['ID_client'];
        $clientDTO->Nom = $result['Nom'];
        $clientDTO->Prenom = $result['Prenom'];
        $clientDTO->CIN = $result['CIN_client'];
        $clientDTO->Date_de_Naissance = $result['Date_Naissance'];
        $clientDTO->Situation_Familiale = $result['situation_familiale'];
        $clientDTO->Adresse = $result['adresse'];
        $clientDTO->Numero_Telephone = $result['Numero_Telephone'];
        $clientDTO->Adresse_Email = $result['email'];

        return $clientDTO;
    }

    public function getListeClients() {
        $stmt = $this->conn->query("SELECT * FROM client");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $clients = array();
        foreach ($results as $result) {
            $clientDTO = new ClientDTO();
            $clientDTO->ID_Client = $result['ID_client'];
            $clientDTO->Nom = $result['Nom'];
            $clientDTO->Prenom = $result['Prenom'];
            $clientDTO->CIN = $result['CIN_client'];
            $clientDTO->Date_de_Naissance = $result['Date_Naissance'];
            $clientDTO->Situation_Familiale = $result['situation_familiale'];
            $clientDTO->Adresse = $result['adresse'];
            $clientDTO->Numero_Telephone = $result['Numero_Telephone'];
            $clientDTO->Adresse_Email = $result['email'];
            $clients[] = $clientDTO;
        }
    
        return $clients;
    }
   
}
?>
