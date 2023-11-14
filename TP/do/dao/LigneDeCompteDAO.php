<?php
require_once 'BDD\db.php';
require_once 'do\dto\LigneDeCompteDTO.php';

class LigneDeCompteDAO {
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
        $stmt = $this->conn->prepare("SELECT * FROM ligneDeCompte WHERE ID_Ligne = :LID");
        $stmt->bindParam(':ConseillerID', $ConseillerID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $LigneDeCompteDTO = new LigneDTO();
        $LigneDeCompteDTO->ID_Ligne = $result['ID_Ligne'];
        $LigneDeCompteDTO->description = $result['description'];
        $LigneDeCompteDTO->montant = $result['montant'];
        $LigneDeCompteDTO->dateTransaction = $result['dateTransaction'];
        $LigneDeCompteDTO->ID_compte = $result['ID_compte'];

        return $LigneDTO;
    }

    public function getListeClients() {
        $stmt = $this->conn->query("SELECT * FROM LigneCompte");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $Lignes = array();
        foreach ($results as $result) {
            $LigneDeCompteDTO = new LigneDTO();
            $LigneDeCompteDTO->ID_Ligne = $result['ID_Ligne'];
            $LigneDeCompteDTO->description = $result['description'];
            $LigneDeCompteDTO->montant = $result['montant'];
            $LigneDeCompteDTO->dateTransaction = $result['dateTransaction'];
            $LigneDeCompteDTO->ID_compte = $result['ID_compte'];
        $Lignes[] = $LigneDTO;
        }
    
        return $Lignes;
    }
   
}
?>
