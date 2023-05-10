<?php

include "GestionProject.php";
$GestionProjects = new GestionProjects();

if (isset($_GET['id'])) {
    $project = $GestionProjects->RechercherParId($_GET['id']);
}

if (isset($_POST['modifier'])) {
    $id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $GestionProjects->Modifier($id, $Name, $Description);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modifier : </title>
</head>

<body>

    <h1>Modification de project : <?= $project->getName() ?></h1>
    <form method="post" action="">
        <input type="text" required="required" id="Id" name="Id" value=<?php echo $project->getId() ?>>

        <div>
            <label for="Nom">Name</label>
            <input type="text" required="required" id="Name" name="Name" placeholder="Name" value=<?php echo $project->getName() ?>>
        </div>
        <div>
            <label for="Prenom">Description</label>
            <input type="text" required="required" id="Description" name="Description" placeholder="Description" value=<?php echo $project->getDescription()?>>
        </div>
        <div>
            <input name="modifier" type="submit" value="Modifier">
            <a href="index.php">Annuler</a>
        </div>
    </form>
</body>

</html>