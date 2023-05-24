<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
include_once(__ROOT__ . '/Managers/GestionProject.php');
// include "GestionProject.php";
// include "../Managers/GestionProject.php";

$GestionProjects = new GestionProjects();

if (isset($_GET['id'])) {
    $project = $GestionProjects->RechercherParId($_GET['id']);
}

if (isset($_POST['modifier'])) {
    $id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $GestionProjects->Modifier($id, $Name, $Description);
    header('Location: index.php');
}
include_once(__ROOT__ . '/Views/projects/editer.php');
?>