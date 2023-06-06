<?php
include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Managers/UserManager.php");
$userManager = new UserManager();

$IsAjaxRequest = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $IsAjaxRequest = true;
}
if (isset($_POST['action'])) {
    $User = new User();
    $User->setFirst_name($_POST['First_name']);
    $User->setLast_name($_POST['last_name']);
    $User->setEmail($_POST['email']);
    $User->setPassword($_POST['password']);
    $userManager->Registration($User);
}
// if (isset($_POST['Login'])) {

// }
if (isset($_POST['Login'])) {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    $User = new User();
    $User->setEmail($_POST['log_mail']);
    $User->setPassword($_POST['log_pass']);
    // echo "<pre>";
    // var_dump($User);
    // echo "</pre>";
    // echo "<pre>";
    // echo $User->getEmail();
    // echo "</pre>";
    // echo "<pre>";
    // echo $User->getPassword();
    // echo "</pre>";
    $logging_in = $userManager->Login($User);
    // echo "<pre>";
    // var_dump($logging_in);
    // echo "</pre>";
    // echo "<pre>";
    // echo $userManager->generateHashedPassword($User->getPassword());
    // echo "</pre>";
    if ($logging_in) {
        session_start();
        $_SESSION['user_email'] = $User->getEmail();
        header('Location: test.php');
    } else {
        header('Location: error.php');
    }
} else {
    include_once(__ROOT__ . "/Views/Registration/index.html");
}
?>