<?php
include "../Layout/root.php";
require_once(__ROOT__ . '/Managers/GestionTask.php');
$GestionTasks = new GestionTasks();
$Is_Get = true;
$Query = "";
if (!empty($_POST)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Use the $id value as needed
        // Example: echo $id;

    } else {
        // Handle the case when the id parameter is not present in the URL
        echo "ID parameter is missing in the URL";
    }
}


if (isset($_POST['pageId'])) {
    $currentPage = $_POST['pageId'];
} else {
    $currentPage = 1;
}
if (isset($_POST['Query'])) {
    $Query = $_POST['Query'];
    $Is_Get = false;
    $result = $GestionTasks->RechercherTous($id);
    $Services = $result[1];
    $clients = $result[0];
    $itemsPerPage = 6;
    $totalItems = count($Services);
    $pagesNum = ceil($totalItems / $itemsPerPage);
    $pages = $GestionTasks->pages($Services, $pagesNum, $itemsPerPage);
}

if ($Is_Get == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    include_once(__ROOT__ . "/Views/Layout/head.php");
    ?>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            <?php
            include_once(__ROOT__ . "/Views/Layout/preloader.php");
            ?>
            <!-- Navbar -->
            <?php
            include_once(__ROOT__ . "/Views/Layout/navbare.php");
            ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php
            include_once(__ROOT__ . "/Views/Layout/sidebare.php");
            ?>
            <!-- /.sidebar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Projects</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Tasks</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tasks</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="row p-3">
                                <div class="col-md-12 col-md-6">
                                    <nav class="mt-2">
                                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                            data-accordion="false">
                                            <!-- Add icons to the links using the .nav-icon class
                                                   with font-awesome or any other icon font library -->
                                            <li class="nav-item">
                                                <a href="#" class="nav-link active">
                                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                                    <p>
                                                        Projects
                                                        <i class="right fas fa-angle-left"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="index.php" class="nav-link">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>Dashboard v1</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <a class="btn btn-primary" href="Ajouter.php">Add Task</a>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="search_project" class="dataTables_filter"><input type="search" id="search_task"
                                            class="form-control" placeholder="Task name" aria-controls="search_task">
                                    </div>
                                </div>
                            </div>
                            <div id="result" class="p-3"></div>
                            <?php
} elseif ($Is_Get == false) {
    ?>
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">
                                            #
                                        </th>
                                        <th style="width: 20%">
                                            Task Name
                                        </th>
                                        <th class="text-center" style="width: 50%">
                                            Description
                                        </th>
                                        <th style="width: 8%" class="text-center">
                                            Status
                                        </th>
                                        <th style="width: 20%">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($pages)) {
                                        ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                                            No Tasks Found!
                                        </div>
                                        <?php
                                    } else {
                                        $Services = $pages[$currentPage - 1];
                                        foreach ($Services as $result) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $result->getId() ?>
                                                </td>
                                                <td>
                                                    <a>
                                                        <?= $result->getName() ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $result->getDescription() ?>
                                                </td>
                                                <td class="project-state">
                                                    <span class="badge badge-success">Success</span>
                                                </td>
                                                <td class="project-actions">
                                                    <a class="btn btn-info btn-sm" href="editer.php?id=<?= $result->getId() ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="supprimer.php?id=<?= $result->getId() ?>">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="mt-3 d-flex justify-content-center align-items-center">
                                <div class="dataTables_paginate paging_simple_numbers" id="paginate">
                                    <ul class="pagination">
                                        <?php
                                        if (isset($pagesNum)) {
                                            for ($i = 0; $i < $pagesNum; $i++) {
                                                if ($currentPage == $i + 1) {
                                                    ?>
                                                    <li class="page-item active">
                                                        <a class="page-link" data-page="<?= $i + 1 ?>" href="#">
                                                            <?= $i + 1 ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="page-item ">
                                                        <a class="page-link" data-page="<?= $i + 1 ?>" href="#">
                                                            <?= $i + 1 ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
}
?>
                        <?php
                        if ($Is_Get == true) {
                            ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <?php
        include_once(__ROOT__ . '/Views/Layout/footer.php');
        ?>
        <!-- ./wrapper -->
        <!-- links script -->
        <?php
        include_once(__ROOT__ . '/Views/Layout/links.php');
        ?>
        <?php
                        } ?>
</body>

</html>