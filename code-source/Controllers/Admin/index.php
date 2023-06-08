<?php
session_start();
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/Manage.php');

$manager = new Manager;

// users number
$usersNumber = $manager->getUsersNumber();
// plans number
$plansNumber = $manager->getPlansNumber();

include_once(__ROOT__ . "/Views/Admin/index.php")
    ?>