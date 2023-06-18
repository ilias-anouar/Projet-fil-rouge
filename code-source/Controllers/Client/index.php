<?php
session_start();
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/InscriptionManager.php');
$InscriptionManager = new InscriptionManager;
$id_user = $_SESSION['user']['Id_User'];
echo "<pre>";
var_dump($_SESSION['user']);
echo "</pre>";


if (isset($_GET['Id_plan'])) {
    echo "<pre>";
    $InscriptionManager->addInscription($_GET['Id_plan'], $id_user);
    echo "</pre>";
    // $_SESSION['user']['Id_Inscription'] = $Id_Inscription['Id_Inscription'];
    // echo "<pre>";
    // var_dump($Id_Inscription);
    // echo "</pre>";
}

// $hasInscription = $InscriptionManager->checkUserInscription($id_user);
// if ($hasInscription) {
//     $hasMeasurs = $InscriptionManager->checkMeasuresExist($_SESSION['user']['Id_Inscription']);
//     if ($hasMeasurs) {
//         include_once(__ROOT__ . "/Views/Client/index.php");
//     } else {
//         header("Location: Measurs.php");
//     }
// } else {
//     header("Location: Plans.php");
// }