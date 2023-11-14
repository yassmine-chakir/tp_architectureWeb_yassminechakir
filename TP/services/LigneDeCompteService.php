<?php
require_once 'do\dao\LigneDeCompteDAO.php';

class LigneDeCompteService {
    private $LigneDeCompteDAO;

    public function __construct() {
        $this->LigneDeCompteDAO = new LigneDeCompteDAO();
    }

    public function getLigneByID($ligneID) {
        return $this->LigneDeCompteDAO->getLigneByID($ligneID);
    }

    public function getListeLignes() {
        $lignes = $this->LigneDeCompteDAO->getListeLignes(); 
        return $lignes;
    }
}
?>
