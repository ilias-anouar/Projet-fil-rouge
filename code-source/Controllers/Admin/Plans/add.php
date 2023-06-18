<?php
use MyNamespace\Entities\Plan\Plan;
session_start();
include "../../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/PlanManager.php');
$PlanManager = new PlanManager;

if (!empty($_POST)) {
    $plan = new Plan();
    $plan->setName($_POST['Name']);
    $plan->setDescription($_POST['Description']);
    $PlanManager->addPlan($plan);
    // Redirection vers la page index.php
    header("Location: index.php");
}
include_once(__ROOT__ . "/Views/Admin/Plans/add.php");
?>