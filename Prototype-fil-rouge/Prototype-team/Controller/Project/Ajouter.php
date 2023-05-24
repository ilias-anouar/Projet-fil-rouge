<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// include "GestionProject.php";
// include "../Managers/GestionProject.php";
include_once(__ROOT__ . '/Managers/GestionProject.php');
// Trouver tous les employés depuis la base de données 
$GestionProjects = new GestionProjects();
// $projects = $GestionProjects->RechercherTous();

if (!empty($_POST)) {
    $project = new Project();
    $project->setName($_POST['Name']);
    $project->setDescription($_POST['Description']);
    $GestionProjects->Ajouter($project);
    // Redirection vers la page index.php
    header("Location: index.php");
}
include_once(__ROOT__.'/Views/projects/Ajouter.php')
?>