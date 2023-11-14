<?php

require_once 'services\ClientService.php';
if (isset($_POST['clientID'])) {
    $clientID = $_POST['clientID'];

  
    $clientService = new ClientService();
    $client = $clientService->getClientByID($clientID);

    $compteService = new CompteService();
    $compte = $compteService->getCompteByID($compteID);

    echo "<h2>Liste du Compte</h2>";
    echo "<p><strong>ID_Compte:</strong> {$compte->ID_Compte}</p>";
    echo "<p><strong>Solde initial:</strong> {$compte->SoldeInitial}</p>";
    echo "<p><strong>Date d'ouverteure:</strong> {$compte->dateOuverture}</p>";
    echo "<p><strong>Client:</strong> {$compte->ID_Client}</p>";
    echo "<p><strong>Type:</strong> {$compte->ID_Type}</p>";
    echo "<p><strong>Conseiller:</strong> {$compte->ID_Cobseiler}</p>";

    
    echo "<h2>Liste du Client</h2>";
    echo "<p><strong>ID_Client:</strong> {$client->ID_Client}</p>";
    echo "<p><strong>Nom:</strong> {$client->Nom}</p>";
    echo "<p><strong>Prénom:</strong> {$client->Prenom}</p>";
    echo "<p><strong>CIN:</strong> {$client->CIN}</p>";
    echo "<p><strong>Date de Naissance:</strong> {$client->Date_de_Naissance}</p>";
    echo "<p><strong>Situation Familiale:</strong> {$client->Situation_Familiale}</p>";
    echo "<p><strong>Adresse:</strong> {$client->Adresse}</p>";
    echo "<p><strong>Numéro de téléphone:</strong> {$client->Numero_Telephone}</p>";
    echo "<p><strong>Adresse e-mail:</strong> {$client->Adresse_Email}</p>";
} else {
    echo "Erreur : ID_Client non spécifié.";
}
?>
