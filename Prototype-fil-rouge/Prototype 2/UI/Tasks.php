<?php

// $Id = $_GET['Id'];
// include "GestionTask.php";
include "../Managers/GestionTask.php";
include "../Managers/GestionProject.php";

// include "";
$GestionTasks = new GestionTasks();
if (isset($_GET['id'])) {
    $Id = $_GET['id'];
    $tasks = $GestionTasks->RechercherTous($Id);
}
$GestionProjects = new GestionProjects();
if (isset($_GET['id'])) {
    $Id_projet = $_GET['id'];
    $project = $GestionProjects->RechercherParId($Id_projet);
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
    <title>Gestion des tashes</title>
</head>

<body>
    <div class="d-flex">
        <div class="container text-center p-5">
            <h1 class="mb-3">
                <?= $project->GetName() ?>'s tasks
            </h1>
            <div class="mb-5">
                <a class="btn btn-primary" href="AjouterTask.php?id=<?php echo $Id ?>">Ajouter un tache</a>
                <a class="btn btn-success" href="../index.php">Projects</a>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($tasks as $task) {
                    ?>
                    <tr>
                        <td>
                            <?= $task->getName() ?>
                        </td>
                        <td>
                            <?= $task->getDescription() ?>
                        </td>
                        <td>
                            <a class="btn btn-secondary"
                                href="editerTask.php?id=<?php echo $task->getId() ?>&id_project=<?php echo $Id ?>">Éditer</a>
                            <a class="btn btn-danger"
                                href="supprimerTask.php?id=<?php echo $task->getId() ?>&id_project=<?php echo $Id ?>">Supprime</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="w-25 p-5 border bg-primary-subtle vh-100">
            <div>
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">task managment</h5>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page"
                            href="../index.php">Projects</a>
                    </li>
                    <?php
                    $projects = $GestionProjects->RechercherTous();
                    foreach ($projects as $project) {
                        ?>
                        <li class="nav-item">
                            <a class="list-group-item-action nav-link" aria-current="page"
                                href="<?php echo 'Tasks.php?id='.$project->getId() ?>"><?= $project->getName() ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>