<?php
// echo "the one";
include "../../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/Manage.php');
$manager = new Manager;
$response = $manager->getChartData();
header('Content-Type: application/json');
echo json_encode($response);
?>