<?php
session_start();
include "../../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/PlanManager.php');

if (isset($_GET['id'])) {
    $PlanManager = new PlanManager();
    $id = $_GET['id'];
    $PlanManager->deletePlan($id);
    header('Location: index.php');
}
?>