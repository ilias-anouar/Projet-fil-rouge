<?php
session_start();
include "../../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/InscriptionManager.php');
$InscriptionManager = new InscriptionManager;
$IsAjaxRequest = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $IsAjaxRequest = true;
}
if (isset($_POST['pageId'])) {
    $currentPage = $_POST['pageId'];
} else {
    $currentPage = 1;
}

if (isset($_POST['Query'])) {
    $Query = $_POST['Query'];
} else {
    $Query = "";
}
$results = $InscriptionManager->AllInscriptedUserByName($Query);

$itemsPerPage = 6;
$totalItems = count($results);
if ($totalItems % 6 == 0) {
    $pagesNum = $totalItems / $itemsPerPage;
} else {
    $pagesNum = ceil($totalItems / $itemsPerPage);
}

$pages = $InscriptionManager->CreatPages($results, $pagesNum, $itemsPerPage);

// View
if ($IsAjaxRequest) {
    include_once(__ROOT__ . "/Views/Admin/Inscription/Card.php");
} else {
    include_once(__ROOT__ . "/Views/Admin/Inscription/index.php");
}
?>