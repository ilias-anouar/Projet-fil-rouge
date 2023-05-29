<?php
include "../../Views/Layout/root.php";
if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();
    $user->login($email, $password);
}else if(isset($_POST['Register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();
    $user->register($name, $email, $password);
}
include_once(__ROOT__ . "/Views/Registration/index.html")
    ?>