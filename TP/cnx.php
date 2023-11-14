<?php
session_start();
    require_once 'services/ConseillerService.php';
    
    $conseillerService = new ConseillerService();
    $email = $_POST["email_conseiller"];
    $MoptDePasse = $_POST["MotDePasse"];
    $Conseiller = $conseillerService->getConseillerByEmailPSD($email,$MoptDePasse);
    if ($Conseiller!= NULL){
        $_SESSION['idc']=$Conseiller->$ID_Conseiller;
        header("location:index.php");
    }else {
        header("location:login.php");
    }

?>