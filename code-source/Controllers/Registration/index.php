<?php
use MyNamespace\Entities\User\User;

include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Managers/UserManager.php");
$userManager = new UserManager();

if (isset($_POST['action'])) {
    $User = new User();
    $User->setFirst_name($_POST['First_name']);
    $User->setLast_name($_POST['last_name']);
    $User->setEmail($_POST['email']);
    $User->setPassword($_POST['password']);
    $userManager->Registration($User);
}

if (isset($_POST['Login'])) {
    $User = new User();
    $User->setEmail($_POST['log_mail']);
    $User->setPassword($_POST['log_pass']);
    $logging_in = $userManager->Login($User);
    echo "<pre>";
    var_dump($logging_in);
    echo "</pre>";
    if ($logging_in) {
        session_start();
        $_SESSION['user'] = $logging_in;
        if ($_SESSION['user']['Role']) {
            header('Location: ../Admin/index.php');
        } else {
            header('Location: ../Client/index.php');
        }
    } else {
        header('Location: error.php');
    }
} else {
    include_once(__ROOT__ . "/Views/Registration/index.html");
}
?>