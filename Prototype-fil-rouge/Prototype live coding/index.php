<?php
include "./managers/gestionProject.php";
$GestionProjet = new GestionProjet();
$projects = $GestionProjet->ToutProjet();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/Style/style.css">
    <title>Projet manager</title>
</head>

<body>
    <div>
        <h1>Projets</h1>
        <a href="./UI/add.php">Add project</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($projects as $project) {
                ?>
                <tr>
                    <td>
                        <?= $project->GetName() ?>
                    </td>
                    <td>
                        <?= $project->GetDescription() ?>
                    </td>
                    <td>
                        <a href="edite.php?id=<?= $project->GetId() ?>">Edite</a>
                        <a href="delete.php?id=<?= $project->GetId() ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>