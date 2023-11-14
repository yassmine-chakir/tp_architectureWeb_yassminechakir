<?php
require_once 'do\dao\ClientDAO.php';

class ClientService {
    private $clientDAO;

    public function __construct() {
        $this->clientDAO = new ClientDAO();
    }

    public function getClientByID($clientID) {
        return $this->clientDAO->getClientByID($clientID);
    }

    public function getListeClients() {
        $clients = $this->clientDAO->getListeClients(); 
        return $clients;
    }
}
?>
