<?php
use MyNamespace\Entities\Inscription\Measures;
use MyNamespace\Entities\Measures\MeasureManager;

session_start();
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/MeasursManager.php');
$MeasursManager = new MeasureManager;
$id_user = $_SESSION['user']['Id_User'];
include_once(__ROOT__ . "/Views/Client/Measurs.php");

if (!empty($_POST)) {
    $Id_Inscription = $_SESSION['user']['Id_Inscription'];
    $age = $_POST['Age'];
    $gender = $_POST['gender'];
    $measurs = new Measures($_POST['height'], $_POST['weight'], $_POST['neck'], $_POST['waist'], $_POST['hip']);
    $measurs->Set_Id($Id_Inscription);
    $MeasursManager->add($measurs, $gender, $id_user, $age);

    header("Location: index.php");
}
?>