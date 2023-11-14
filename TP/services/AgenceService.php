<?php
require_once 'do\dao\AgenceDAO.php';

class AgenceService {
    private $AgenceDAO;

    public function __construct() {
        $this->AgenceDAO = new AgenceDAO();
    }

    public function getAgenceByID($agenceID) {
        return $this->AgenceDAO->getAgenceByID($agenceID);
    }

    public function getListeAgences() {
        $agences = $this->agenceDAO->getListeAgences(); 
        return $agences;
    }
}
?>
