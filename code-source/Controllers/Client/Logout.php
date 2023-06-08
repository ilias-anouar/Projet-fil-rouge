<?php
session_start();
include "../../Views/Layout/root.php";
if (session_status() == 2) {
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    header("Location: ../../index.html");
}