<?php
// include "GestionProject.php";
include "./managers/gestionProject.php";
// Trouver tous les employés depuis la base de données 
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
    <?php
    require_once(__ROOT__ . '/UI/Style/Bootstrap.php');
    ?>
    <title>Gestion des projet</title>
</head>

<body class="P-5">
    <!-- <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion des projects</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">task managment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?php __ROOT__ . 'index.php' ?>">projects</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Task managment
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> -->
    <div class="d-flex">

        <div class="container mt-5">
            <div class="text-center p-5">
                <div class="text-end">
                    <a href="./UI/Ajouter.php" class="mb-3 btn btn-primary">Ajouter un project</a>
                </div>
                <table class="table">
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
                                <a class="btn btn-secondary"
                                    href="./UI/editer.php?id=<?php echo $project->getId() ?>">Éditer</a>
                                <a class="btn btn-danger"
                                    href="./UI/supprimer.php?id=<?php echo $project->getId() ?>">Supprime</a>
                                <a class="btn btn-success"
                                    href="./UI/Tasks.php?id=<?php echo $project->getId() ?>">Tasks</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">task managment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php __ROOT__ . 'index.php' ?>">projects</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Task managment
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</body>

</html>