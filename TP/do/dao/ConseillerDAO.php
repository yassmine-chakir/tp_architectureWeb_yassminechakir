<?php
require_once 'BDD\db.php';
require_once 'do\dto\ConseillerDTO.php';

class ConseillerDAO {
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

    public function getConseillerByID($ConseillerID) {
        $stmt = $this->conn->prepare("SELECT * FROM Conseiller WHERE ID_Conseiller = :ConseillerID");
        $stmt->bindParam(':ConseillerID', $ConseillerID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $ConseillerDTO = new ConseillerDTO();
        $ConseillerDTO->ID_Conseiller = $result['ID_Conseiller'];
        $ConseillerDTO->Nom = $result['nom_conseiller'];
        $ConseillerDTO->Prenom = $result['prenom_conseiller'];
        $ConseillerDTO->CIN = $result['CIN'];
        $ConseillerDTO->Date_de_Naissance = $result['Date_de_Naissance'];
        $ConseillerDTO->SituationFamiliale = $result['SituationFamiliale'];
        $ConseillerDTO->Adresse = $result['Adresse'];
        $ConseillerDTO->NumeroTelephone = $result['numero_telephone'];
        $ConseillerDTO->AdresseEmail = $result['email_conseiller'];
        $ConseillerDTO->ID_agence = $result['ID_agence'];
        $ConseillerDTO->MotDePasse = $result['MotDePasse'];

        return $ConseillerDTO;
    }

    public function getConseillerByEmailPSD($Email,$password) {
        $stmt = $this->conn->prepare("SELECT * FROM conseiller_bancaire WHERE email_conseiller = :emailConseiller and MotDePasse = :MDP");
        $stmt->bindParam(':emailConseiller', $Email);
        $stmt->bindParam(':MDP', $password);
        $stmt->execute();
       if( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

        $ConseillerDTO = new ConseillerDTO();
        $ConseillerDTO->$ID_Conseiller = $result['ID_Conseiller'];
        $ConseillerDTO->Nom = $result['nom_conseiller'];
        $ConseillerDTO->Prenom = $result['prenom_conseiller'];
        $ConseillerDTO->CIN = $result['CIN'];
        $ConseillerDTO->Date_de_Naissance = $result['Date_de_Naissance'];
        $ConseillerDTO->SituationFamiliale = $result['SituationFamiliale'];
        $ConseillerDTO->Adresse = $result['Adresse'];
        $ConseillerDTO->NumeroTelephone = $result['numero_telephone'];
        $ConseillerDTO->AdresseEmail = $result['email_conseiller'];
        $ConseillerDTO->ID_agence = $result['ID_agence'];
        $ConseillerDTO->MotDePasse = $result['MotDePasse'];

        return $ConseillerDTO;
       }else return null;
    }

    public function getListeClients() {
        $stmt = $this->conn->query("SELECT * FROM conseiller_bancaire");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $Conseillers = array();
        foreach ($results as $result) {
            $ConseillerDTO = new ConseillerDTO();
            $ConseillerDTO->ID_Conseiller = $result['ID_Conseiller'];
            $ConseillerDTO->Nom = $result['nom_conseiller'];
            $ConseillerDTO->Prenom = $result['prenom_conseiller'];
            $ConseillerDTO->CIN = $result['CIN'];
            $ConseillerDTO->Date_de_Naissance = $result['Date_de_Naissance'];
            $ConseillerDTO->SituationFamiliale = $result['SituationFamiliale'];
            $ConseillerDTO->Adresse = $result['Adresse'];
            $ConseillerDTO->NumeroTelephone = $result['numero_telephone'];
            $ConseillerDTO->AdresseEmail = $result['email_conseiller'];
            $ConseillerDTO->ID_agence = $result['ID_agence'];
            $ConseillerDTO->MotDePasse = $result['MotDePasse'];
        $Conseillers[] = $ConseillerDTO;
        }
    
        return $Conseillers;
    }
   
}
?>
