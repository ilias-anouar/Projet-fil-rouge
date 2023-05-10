<?php

include "GestionProject.php";
// Trouver tous les employés depuis la base de données 
$GestionProjects = new GestionProjects();
$projects = $GestionProjects->RechercherTous();

if (!empty($_POST)) {
    $project = new Project();
    $project->setName($_POST['Name']);
    $project->setDescription($_POST['Description']);
    $GestionProjects->Ajouter($project);
    // Redirection vers la page index.php
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion des employés</title>

</head>

<body>

    <h1>Ajouter un project</h1>

    <form method="post" action="">
        <div>
            <label for="Nom">Name</label>
            <input type="text" required="required" id="Name" name="Name" placeholder="Name">
        </div>
        <div>
            <label for="Prenom">Description</label>
            <input type="text" required="required" id="Description" name="Description" placeholder="Description">
        </div>
        <div>
            <button type="submit">Ajouter</button>
            <a href="index.php">Annuler</a>
        </div>
    </form>
</body>

</html>