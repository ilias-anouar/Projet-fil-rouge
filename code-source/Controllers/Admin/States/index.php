<?php
session_start();
include "../../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/Manage.php');
$manager = new Manager;
$response = $manager->getPlanData();
// echo "<pre>";
// var_dump($response);
// echo "</pre>";
include_once(__ROOT__ . "/Views/Admin/States/index.php");
?>