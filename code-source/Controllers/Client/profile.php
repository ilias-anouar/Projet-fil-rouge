<?php
namespace MyNamespace\Managers\MeasureManager;

use MyNamespace\Entities\User\User;
use UserManager;

session_start();
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/MeasursManager.php');
$MeasursManager = new \MyNamespace\Entities\Measures\MeasureManager;
include_once(__ROOT__ . "/Managers/UserManager.php");
$userManager = new UserManager();

$IsAjaxRequest = false;

if (isset($_POST['Update_user'])) {
    $User = new User;
    $User->Set_Id($_POST['id']);
    $User->setFirst_name($_POST['First_name']);
    $User->setLast_name($_POST['Last_name']);
    $_SESSION['user']['First_name'] = $User->getFirst_name();
    $_SESSION['user']['Last_name'] = $User->getLast_name();
    $userManager->updateUser($User);
    $success = true;
}

if (isset($_POST['action'])) {
    $mail = $_SESSION['user']['E_mail'];
    $old_password = $_POST['password'];
    $new_password = $_POST['newpass'];
    $userManager->UpdatePassword($new_password, $old_password, $mail);
    $IsAjaxRequest = true;
}
$Id_Inscription = $_SESSION['user']['Id_Inscription'];
$data = $MeasursManager->getMeasureData($Id_Inscription);
$measurs_data = $data[1];
$Inscription_data = $data[0];
// echo "<pre>";
// var_dump($measurs_data);
// echo "</pre>";
// echo "<pre>";
// var_dump($Inscription_data->getDateInscription());
// echo "</pre>";
if ($IsAjaxRequest) {
    include(__ROOT__ . "/Views/Layout/succece.php");
} else {
    // include_once(__ROOT__ . "/Views/Admin/profile.php");
    include_once(__ROOT__ . "/Views/Client/profile.php");
}