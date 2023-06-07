<?php
include "../../../Views/Layout/root.php";

// Controller 
require_once(__ROOT__ . '/Managers/PlanManager.php');

$PlanManager = new PlanManager();
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
$results = $PlanManager->rechercherParNom($Query);

$itemsPerPage = 6;
$totalItems = count($results);
$pagesNum = ceil($totalItems / $itemsPerPage);

$pages = $PlanManager->pages($results, $pagesNum, $itemsPerPage);

// View
if ($IsAjaxRequest) {
    include_once(__ROOT__ . "/Views/Admin/Plans/cards.php");
} else {
    include_once(__ROOT__ . "/Views/Admin/Plans/index.php");
}
?>