<?php
session_start();
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
if ($totalItems % 6 == 0) {
    $pagesNum = $totalItems / $itemsPerPage;
} else {
    $pagesNum = ceil($totalItems / $itemsPerPage);
}

$pages = $PlanManager->CreatPages($results, $pagesNum, $itemsPerPage);
// echo "<pre>";
// var_dump($pages);
// echo "</pre>";
// View
if ($IsAjaxRequest) {
    include_once(__ROOT__ . "/Views/Admin/Plans/cards.php");
} else {
    include_once(__ROOT__ . "/Views/Admin/Plans/index.php");
}
?>