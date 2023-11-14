<?php
require_once 'do\dao\TypeCompteDAO.php';

class TypeCompteService {
    private $TypeCompteDAO;

    public function __construct() {
        $this->TypeCompteDAO = new TypeCompteDAO();
    }

    public function getTypeByID($typeID) {
        return $this->TypeCompteDAO->getTypeByID($typeID);
    }

    public function getListeTypes() {
        $types = $this->TypeCompteDAO->getListeTypes(); 
        return $types;
    }
}
?>
