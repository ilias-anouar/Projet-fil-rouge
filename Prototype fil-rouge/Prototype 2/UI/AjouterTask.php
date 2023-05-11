<?php
// include "GestionTask.php";
include "../Managers/GestionTask.php";

// Trouver tous les employés depuis la base de données 
$GestionTasks = new GestionTasks();
// $tasks = $GestionTasks->RechercherTous($Id);
if (isset($_GET['id'])) {
    $Id = $_GET['id'];
    $tasks = $GestionTasks->RechercherTous($Id);
}
// $Id = $_POST['id'];
if (!empty($_POST)) {
    $Task = new Task();
    $Task->setId($Id);
    $Task->setName($_POST['Name']);
    $Task->setDescription($_POST['Description']);
    $GestionTasks->Ajouter($Task);
    // Redirection vers la page index.php
    header("Location: Tasks.php?id=$Id");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion des tache</title>
</head>

<body>

    <h1>Ajouter un tache</h1>

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
            <a href="../index.php">Annuler</a>
        </div>
    </form>
</body>

</html>