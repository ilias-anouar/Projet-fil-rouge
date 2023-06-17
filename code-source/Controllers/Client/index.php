<?php
session_start();
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/InscriptionManager.php');
$InscriptionManager = new InscriptionManager;
$id_user = $_SESSION['user']['Id_User'];
// echo "<pre>";
// var_dump($_SESSION['user']);
// echo "</pre>";

// $userId = 1; // Provide the user ID you want to check
$hasInscription = $InscriptionManager->checkUserInscription($id_user);
if ($hasInscription) {
    header("Location: Measurs.php");
    echo "User has an inscription.";
} else {
    include_once(__ROOT__ . "/Views/Client/index.php");
}

// include_once(__ROOT__ . "/Views/Client/index.php");