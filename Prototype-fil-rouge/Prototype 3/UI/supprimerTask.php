<?php
include "../Managers/GestionTask.php";
// $GestionTasks = new GestionTasks();

if (isset($_GET['id'])) {
    // Trouver tous les employés depuis la base de données 
    $GestionTasks = new GestionTasks();
    $id = $_GET['id'];
    $id_project = $_GET['id_project'];
    $GestionTasks->Supprimer($id);
    header('Location: Tasks.php?id='.$id_project);
}
?>