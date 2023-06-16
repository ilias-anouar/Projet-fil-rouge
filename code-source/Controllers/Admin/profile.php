<?php
session_start();
include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Managers/UserManager.php");
$userManager = new UserManager();

$IsAjaxRequest = false;

if (isset($_POST['Update_user'])) {
    // set user from post
    $User = new User;
    $User->Set_Id($_POST['id']);
    $User->setFirst_name($_POST['First_name']);
    $User->setLast_name($_POST['Last_name']);
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
if ($IsAjaxRequest) {
    include(__ROOT__ . "/Views/Layout/succece.php");
} else {
    include_once(__ROOT__ . "/Views/Admin/profile.php");
}