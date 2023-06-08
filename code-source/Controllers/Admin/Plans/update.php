<?php
session_start();
include "../../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/PlanManager.php');
$PlanManager = new PlanManager;

if (isset($_GET['id'])) {
    $plan = $PlanManager->getPlanById($_GET['id']);
}

if (!empty($_POST)) {
    $plan = new Plan();
    $plan->Set_Id($_POST['id']);
    $plan->setName($_POST['Name']);
    $plan->setDescription($_POST['Description']);
    $PlanManager->editPlan($plan);
    // Redirection vers la page index.php
    header("Location: index.php");
}
include_once(__ROOT__ . "/Views/Admin/Plans/update.php");
?>