<?php
require_once 'BDD\db.php';
require_once 'do\dto\CompteBancaireDTO.php';

class CompteBancaireDAO {
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

    public function getCompteBancaireByID($compteID) {
        $stmt = $this->conn->prepare("SELECT * FROM compte_bancaire WHERE ID_Compte = :compteID");
        $stmt->bindParam(':compteID', $compteID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $CompteBancaireDTO = new CompteBancaireDTO();
        $CompteBancaireDTO->ID_Compte = $result['ID_Compte'];
        $CompteBancaireDTO->SoldeInitial = $result['SoldeInitial'];
        $CompteBancaireDTO->dateOuverture = $result['dateOuverture'];
        $CompteBancaireDTO->ID_Client = $result['ID_Client'];
        $CompteBancaireDTO->ID_Type = $result['ID_Type'];
        $CompteBancaireDTO->ID_Conseiller = $result['ID_Conseiller'];

        return $CompteBancaireDTO;
    }

    public function getListeCompteBancaires() {
        $stmt = $this->conn->query("SELECT * FROM compte_bancaire");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $comptes = array();
        foreach ($results as $result) {
        $CompteBancaireDTO = new CompteBancaireDTO();
        $CompteBancaireDTO->ID_Compte = $result['ID_Compte'];
        $CompteBancaireDTO->SoldeInitial = $result['SoldeInitial'];
        $CompteBancaireDTO->dateOuverture = $result['dateOuverture'];
        $CompteBancaireDTO->ID_Client = $result['ID_Client'];
        $CompteBancaireDTO->ID_Type = $result['ID_Type'];
        $CompteBancaireDTO->ID_Conseiller = $result['ID_Conseiller'];
        $comptes[] = $CompteBancaireDTO;
        }
    
        return $comptes;
    }

    public function getListeCompteBancairesParCons($ID_Conseiller) {
        $stmt = $this->conn->prepare("SELECT * FROM compte_bancaire WHERE ID_Conseiller = :ConseillerID");
        $stmt->bindParam(':ConseillerID', $ID_Conseiller);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $comptes = array();
        foreach ($results as $result) {
        $CompteBancaireDTO = new CompteBancaireDTO();
        $CompteBancaireDTO->ID_Compte = $result['ID_Compte'];
        $CompteBancaireDTO->SoldeInitial = $result['SoldeInitial'];
        $CompteBancaireDTO->dateOuverture = $result['dateOuverture'];
        $CompteBancaireDTO->ID_Client = $result['ID_Client'];
        $CompteBancaireDTO->ID_Type = $result['ID_Type'];
        $CompteBancaireDTO->ID_Conseiller = $result['ID_Conseiller'];
        $comptes[] = $CompteBancaireDTO;
        }
    
        return $comptes;
    }
   
   
}
?>
