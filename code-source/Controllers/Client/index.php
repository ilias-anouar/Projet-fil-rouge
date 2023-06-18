<?php
session_start();
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/InscriptionManager.php');
$InscriptionManager = new InscriptionManager;
$id_user = $_SESSION['user']['Id_User'];


if (isset($_GET['Id_plan'])) {
    $Id_Inscription = $InscriptionManager->addInscription($_GET['Id_plan'], $id_user);
    $_SESSION['user']['Id_Inscription'] = $Id_Inscription['Id_Inscription'];
}

$hasInscription = $InscriptionManager->checkUserInscription($id_user);
if ($hasInscription) {
    $hasMeasurs = $InscriptionManager->checkMeasuresExist($_SESSION['user']['Id_Inscription']);
    if ($hasMeasurs) {
        include_once(__ROOT__ . "/Views/Client/index.php");
    } else {
        header("Location: Measurs.php");
    }
} else {
    header("Location: Plans.php");
}
?>