<?php
session_start();
include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Managers/UserManager.php");
$userManager = new UserManager();
if (isset($_POST['Update_user'])) {
    // set user from post
    $userManager->updateUser($User);
}
include_once(__ROOT__ . "/Views/Admin/profile.php");