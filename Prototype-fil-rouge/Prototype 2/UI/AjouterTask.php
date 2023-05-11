<?php
// include "GestionTask.php";
include "../Managers/GestionTask.php";
include "../Managers/GestionProject.php";

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
    <?php
    require_once(__ROOT__ . '/UI/Style/Bootstrap.php');
    ?>
    <title>Gestion des tache</title>
</head>

<body>
    <div class="container text-center p-5">
        <h1 class="mb-3">Ajouter un tache</h1>
        <form method="post" action="">
            <div class="input-group mb-3" >
                <label class="input-group-text" for="Nom">Name</label>
                <input type="text" required="required" class="form-control" id="Name" name="Name" placeholder="Name">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="Prenom">Description</label>
                <input type="text" required="required" class="form-control" id="Description" name="Description" placeholder="Description">
            </div>
            <div>
                <button class="btn btn-outline-success" type="submit">Ajouter</button>
                <a class="btn btn-danger" href="Tasks.php">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>