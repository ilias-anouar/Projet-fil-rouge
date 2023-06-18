<?php
// echo "the one";
session_start();
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/Manage.php');
$manager = new Manager;
$response = $manager->getMeasureData($_SESSION['user']['Id_User']);
header('Content-Type: application/json');
echo json_encode($response);
?>