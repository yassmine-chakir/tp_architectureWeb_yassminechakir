<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Copmptes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Liste des Copmptes</h1>

<div id="comptes-container">
    <?php
    session_start();

    require_once 'services/CompteBancaireService.php';
    require_once 'services/ClientService.php';
    require_once 'services/TypecompteService.php';
    
    $CompteBancaireService = new CompteBancaireService();
    $ClientService = new ClientService();
    $TypecompteService = new TypecompteService();
    echo $_SESSION['idc'];
    
   
    $comptes = $CompteBancaireService->getListeCompteBancairesParCons($_SESSION['idc']);
    
    foreach ($comptes as $compte) {
        echo "<div class='compte-item' data-id='{$compte->ID_Compte}'>";
        echo "<p><strong>ID_Compte:</strong> {$compte->ID_Compte}</p>";
        echo "<p><strong>Solde initial:</strong> {$compte->SoldeInitial}</p>";
        echo "<p><strong>Date d'ouverteure:</strong> {$compte->dateOuverture}</p>";
        echo "<p><strong>Client:</strong> {$compte->ID_Client}</p>";
        echo "<p><strong>Type:</strong> {$compte->ID_Type}</p>";
        echo "<p><strong>Conseiller:</strong> {$compte->ID_Conseiller}</p>";
        $client  = $ClientService->getClientByID($compte->ID_Client);

        echo "<div class='client-item' data-id='{$client->ID_Client}'>";
        echo "<p><strong>ID_Client:</strong> {$client->ID_Client}</p>";
        echo "<p><strong>Nom:</strong> {$client->Nom}</p>";
        echo "<p><strong>Prénom:</strong> {$client->Prenom}</p>";
        echo "<p><strong>CIN:</strong> {$client->CIN}</p>";
        echo "<p><strong>situation familiale:</strong> {$client->Situation_Familiale}</p>";
        echo "<p><strong>Date de naissance:</strong> {$client->Date_de_Naissance}</p>";
        echo "<p><strong>Adresse:</strong> {$client->Adresse}</p>";
        echo "<p><strong>Numero de telephone:</strong> {$client->Numero_Telephone}</p>";
        echo "<p><strong>Adresse email:</strong> {$client->Adresse_Email}</p>";

        $typeCompte  = $TypecompteService->getTypeByID($compte->ID_Type);//drt f3awt typecompte ghir compte
        echo $compte->ID_Type;
        echo $typeCompte->ID_TypeCompte;
        echo $typeCompte->nom;
        echo "<div class='typecompte-item' data-id='{$typeCompte->ID_TypeCompte}'>";
        echo "<p><strong>ID_TypeCompte:</strong> {$typeCompte->ID_TypeCompte}</p>";
        echo "<p><strong>Nom:</strong> {$typeCompte->nom}</p>";

        echo "</div>";
    }
    ?>
</div>
</body>
</html>
