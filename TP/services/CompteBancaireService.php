<?php
require_once 'do\dao\CompteBancaireDAO.php';

class CompteBancaireService {
    private $CompteBancaireDAO;

    public function __construct() {
        $this->CompteBancaireDAO = new CompteBancaireDAO();
    }

    public function getCompteBancaireByID($compteBancaireID) {
        return $this->CompteBancaireDAO->getCompteBancaireByID($compteBancaireID);
    }

    public function getListeCompteBancaires() {
        $comptes = $this->CompteBancaireDAO->getListeCompteBancaires(); 
        return $comptes;
    }

    public function getListeCompteBancairesParCons($ID_Conseiller) {
        $comptes = $this->CompteBancaireDAO->getListeCompteBancairesParCons($ID_Conseiller); 
        return $comptes;
    }
}
?>
