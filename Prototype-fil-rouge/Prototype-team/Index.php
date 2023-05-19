<!DOCTYPE html>
<html lang="en">
<?php
include "Views/Layout/head.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php
        include "Views/Layout/preloader.php";
        ?>
        <!-- Navbar -->
        <?php
        include "Views/Layout/navbare.php";
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include "Views/Layout/sidebare.php";
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
                                <a class="btn btn-primary" href="pages/examples/project-add.html">Add Project</a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="search_project" class="dataTables_filter"><input type="search" id="search"
                                        class="form-control" placeholder="Project name" aria-controls="search_project">
                                </div>
                            </div>
                        </div>
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
                            <tbody id="result">
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-center align-items-center">
                            <div class="dataTables_paginate paging_simple_numbers" id="paginate">
                                <ul>
                                    <li class="paginate_button page-item previous disabled" id="previous" tabindex="0"
                                        aria-controls="search_project" aria-label="Previous">
                                        <a href="#" aria-controls="search_project" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
    <!-- ./wrapper -->
    <!-- links script -->
    <?php
    include "Views/Layout/links.php";
    ?>
</body>

</html>