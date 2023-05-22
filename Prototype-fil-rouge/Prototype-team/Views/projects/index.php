<?php
include "../Layout/root.php";
// Controller 

/**
 *  isGet = true;
 * 
 *
 *  var query = "";
 *  if(Post[Query]){
 *      query = Post[Query];
 *      isGet = false
 * }
 *   
 *  
 *  
 *  var gestionProjet = new GestionProjet();
 *  var liste = gestionProjet.find(Query)
 */
if (isset($_GET['pageId'])) {
    $currentPage = $_GET['pageId'];
} else {
    $currentPage = 1;
}
require_once(__ROOT__ . '/Managers/GestionProject.php');
$gestionProjet = new GestionProjects();
$Is_Get = true;
$Query = "";
if (isset($_POST['Query'])) {
    $Query = $_POST['Query'];
    $Is_Get = false;
    // echo $Query;
    $results = $gestionProjet->rechercherParNom($Query);
    if ((count($results) % 6) == 0) {
        $pagesNum = count($results) / 6;
    } else {
        $pagesNum = ceil(count($results) / 6);
    }
    // echo $pagesNum;
    $pages = $gestionProjet->pages($results, $pagesNum, 6);
    // echo "<pre>";
    // var_dump($pages);
    // echo "</pre>";
}
// else {
//     if (isset($_GET['pageId'])) {
//         $currentPage = $_GET['pageId'];
//     } else {
//         $currentPage = 1;
//     }
//     // Retrieve the total number of pages
//     $pages = $gestionProjet->Page_num();
//     // Get results for the current page
//     $results = $gestionProjet->Pagination($currentPage);
// }
// View

// 
// Afficher la liste des projets 
//

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
                                    <li class="breadcrumb-item active">Projects</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Projects</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="row p-3">
                                <div class="col-sm-12 col-md-6">
                                    <a class="btn btn-primary" href="Ajouter.php">Add Project</a>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="search_project" class="dataTables_filter"><input type="search" id="search"
                                            class="form-control" placeholder="Project name" aria-controls="search_project">
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
                                            Project Name
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
                                            No Projects Found!
                                        </div>
                                        <?php
                                    } else {
                                        $projects = $pages[$currentPage - 1];
                                        foreach ($projects as $result) {
                                            // echo "<pre>";
                                            // var_dump($result);
                                            // echo "</pre>";
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
                                                    <a class="btn btn-primary btn-sm" href="#">
                                                        <i class="fas fa-folder"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="supprimer.php?id=<?= $result->getId() ?>">
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
                                                ?>
                                                <li class="page-item "><a class="page-link" href="#">
                                                        <?= $i + 1 ?>
                                                    </a></li>
                                                <?php
                                            }
                                        }
                                        ?>
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