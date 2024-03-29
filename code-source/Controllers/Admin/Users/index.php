<?php
session_start();
include "../../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/UserManager.php');
$userManager = new UserManager;
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
$results = $userManager->SearchAllUser($Query);

$itemsPerPage = 6;
$totalItems = count($results);
if ($totalItems % 6 == 0) {
    $pagesNum = $totalItems / $itemsPerPage;
} else {
    $pagesNum = ceil($totalItems / $itemsPerPage);
}

$pages = $userManager->CreatPages($results, $pagesNum, $itemsPerPage);

// View
if ($IsAjaxRequest) {
    include_once(__ROOT__ . "/Views/Admin/Users/Table.php");
} else {
    include_once(__ROOT__ . "/Views/Admin/Users/index.php");
}
?>