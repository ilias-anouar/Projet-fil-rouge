<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// include "GestionProject.php";
// include "../Managers/GestionProject.php";
include_once(__ROOT__ . '/Managers/GestionProject.php');
// Trouver tous les employés depuis la base de données 
$GestionProjects = new GestionProjects();
// $projects = $GestionProjects->RechercherTous();

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
<?php
include_once(__ROOT__ . "/Views/Layout/head.php");
?>
<body>
    <div class="container text-center">
        <h1 class="mb-3">Ajouter un project</h1>
        <form method="post" action="">
            <div class="input-group mb-3">
                <label for="Nom">Name</label>
                <input type="text" required="required" class="form-control" id="Name" name="Name" placeholder="Name">
            </div>
            <div class="input-group mb-3">
                <label for="Prenom">Description</label>
                <input type="text" required="required" class="form-control" id="Description" name="Description"
                    placeholder="Description">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Ajouter</button>

                <a class="btn btn-danger" href="../index.php">Annuler</a>
            </div>
        </form>
    </div>
</body>
<?php
include_once(__ROOT__ . "/Views/Layout/links.php");
?>
</html>