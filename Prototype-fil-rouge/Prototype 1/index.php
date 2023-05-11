<?php
include "./managers/GestionProject.php";
$GestionProjects = new GestionProjects();
$projects = $GestionProjects->RechercherTous();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/Style/style.css">
    <title>Gestion des employés</title>
</head>

<body>
    <div>
        <a href="./UI/Ajouter.php">Ajouter un project</a>
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
                        <?= $project->getName() ?>
                    </td>
                    <td>
                        <?= $project->getDescription() ?>
                    </td>
                    <td>
                        <a href="./UI/editer.php?id=<?php echo $project->getId() ?>">Éditer</a>
                        <a href="./UI/supprimer.php?id=<?php echo $project->getId() ?>">Supprime</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>