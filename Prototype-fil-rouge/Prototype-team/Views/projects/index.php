<?php
include "../Layout/root.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projects</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="../Assets/vendor/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="../Assets/vendor/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php
        include_once(__ROOT__ . "/Layout/preloader.php");
        ?>
        <!-- Navbar -->
        <?php
        include_once(__ROOT__ . "/Layout/navbare.php");
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once(__ROOT__ . "/Layout/sidebare.php");
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
    <!-- jQuery -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="../Assets/vendor/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script
        src="../Assets/vendor/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/dist/js/demo.js"></script>
    <script src="../Assets/js/Index.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../Assets/vendor/AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>
</body>

</html>