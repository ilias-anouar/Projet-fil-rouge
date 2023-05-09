<?php
include "connect.php";
$json_file = file_get_contents('Project.json');
$Project = json_decode($json_file, true);
foreach ($Project as $one) {
    echo "<pre>";
    var_dump($one);
    echo "</pre>";
    $name = $one['name'];
    $description = $one['description'];
    $sql = "INSERT INTO `project`(`name`, `description`) VALUES ('$name','$description')";
    $conn->exec($sql);
}
?>