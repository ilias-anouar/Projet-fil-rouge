<?php
// Controller 
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/GestionProject.php');

$gestionProjet = new GestionProjects();
$IsAjaxRequest = false;
// $Query = "";

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
$results = $gestionProjet->rechercherParNom($Query);

$itemsPerPage = 6;
$totalItems = count($results);
$pagesNum = ceil($totalItems / $itemsPerPage);

$pages = $gestionProjet->pages($results, $pagesNum, $itemsPerPage);

// View

if ($IsAjaxRequest) {
    include_once(__ROOT__ . "/Views/projects/index.data.php");
} else {
    include_once(__ROOT__ . "/Views/projects/index.php");
}