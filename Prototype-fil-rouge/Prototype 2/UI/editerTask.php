<?php

// include "GestionProject.php";
include "../Managers/GestionTask.php";
include "../Managers/GestionProject.php";
$GestionTasks = new GestionTasks();

if (isset($_GET['id'])) {
    $project = $GestionTasks->RechercherParId($_GET['id']);
}
$id_projet = $_GET['id_project'];
if (isset($_POST['modifier'])) {
    $id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $GestionTasks->Modifier($id, $Name, $Description);
    header("Location: Tasks.php?id=" . $id_projet);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <?php
    require_once(__ROOT__ . '/UI/Style/Bootstrap.php');
    ?>
    <title>Modifier : </title>
</head>

<body>
    <div class="container text-center p-5">
        <h1 class="mb-5" >Modification de project :
            <?= $project->getName() ?>
        </h1>
        <form method="post" action="">
            <input type="hidden" required="required" id="Id" name="Id" value=<?php echo $project->getId() ?>>

            <div class="input-group mb-3">
                <label for="Nom">Name</label>
                <input type="text" required="required" id="Name" class="form-control" name="Name" placeholder="Name" value=<?php echo $project->getName() ?>>
            </div>
            <div class="input-group mb-3">
                <label for="Prenom">Description</label>
                <input type="text" required="required" class="form-control" id="Description" name="Description" placeholder="Description"
                    value=<?php echo $project->getDescription() ?>>
            </div>
            <div>
                <input class="btn btn-outline-success" name="modifier" type="submit" value="Modifier">
                <a class="btn btn-danger" href="../index.php">Annuler</a>
            </div>
        </form>
    </div>

</body>

</html>