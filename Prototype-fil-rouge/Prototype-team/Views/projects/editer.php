<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
include_once(__ROOT__ . '/Managers/GestionProject.php');
// include "GestionProject.php";
// include "../Managers/GestionProject.php";

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

<?php
include_once(__ROOT__ . "/Views/Layout/head.php");
?>

<body>
    <div class="container text-center">
        <h1 class="mb-5 mt-5">Modification de project :
            <?= $project->getName() ?>
        </h1>
        <form method="post" action="">
            <input type="hidden" required="required" class="form-control" id="Id" name="Id" value=<?php echo $project->getId() ?>>
            <div class="input-group mb-3">
                <label class="input-group-text" for="Nom">Name</label>
                <input type="text" class="form-control" required="required" id="Name" name="Name" placeholder="Name" value=<?php echo $project->getName() ?>>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="Prenom">Description</label>
                <input type="text" required="required" class="form-control" id="Description" name="Description" placeholder="Description"
                    value=<?php echo $project->getDescription() ?>>
            </div>
            <div>
                <input class="btn btn-primary" name="modifier" type="submit" value="Modifier">
                <a class="btn btn-danger" href="index.php">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>