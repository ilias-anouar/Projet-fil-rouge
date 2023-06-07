<h1>action was login</h1>
<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo "<pre>";
print_r($_SESSION['user']);
echo "</pre>";
echo "<pre>";
print_r($_SESSION['user']['Role']);
echo "</pre>";
?>