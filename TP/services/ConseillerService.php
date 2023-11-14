<?php
require_once 'do\dao\ConseillerDAO.php';

class ConseillerService {
    private $ConseillerDAO;

    public function __construct() {
        $this->ConseillerDAO = new ConseillerDAO();
    }

    public function getConseillerByID($conseillerID) {
        return $this->ConseillerDAO->getConseillerByID($conseillerID);
    }

    public function getConseillerByEmailPSD($Email,$password) {
        return $this->ConseillerDAO->getConseillerByEmailPSD($Email,$password);
    }

    public function getListeConseiller() {
        $conseillers = $this->ConseillerDAO->getListeConseillers(); 
        return $conseillers;
    }
}
?>
