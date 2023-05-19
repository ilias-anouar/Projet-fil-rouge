<?php

// $Id = $_GET['Id'];
// include "GestionTask.php";
include "../Managers/GestionTask.php";

// include "";
$GestionTasks = new GestionTasks();
if (isset($_GET['id'])) {
    $Id = $_GET['id'];
    $tasks = $GestionTasks->RechercherTous($Id);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>Gestion des tashes</title>
</head>

<body>
    <div>

        <a href="AjouterTask.php?id=<?php echo $Id ?>">Ajouter un tache</a>
        <a href="../index.php">Projects</a>
        <table>
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
                        <a href="editerTask.php?id=<?php echo $task->getId() ?>&id_project=<?php echo $Id ?>">Éditer</a>
                        <a
                            href="supprimerTask.php?id=<?php echo $task->getId() ?>&id_project=<?php echo $Id ?>">Supprime</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>