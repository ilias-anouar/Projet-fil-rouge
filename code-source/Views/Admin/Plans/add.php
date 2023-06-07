<!DOCTYPE html>
<html lang="en">

<?php
// include "../Layout/root.php";
include_once(__ROOT__ . "/Views/Layout/head.php");
?>
<style>
    <?php
    include_once(__ROOT__ . "/Views/Assets/css/Admin.css");
    ?>
</style>

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
                            <h1>Welcome
                                <?= $_SESSION['user']['First_name'] ?>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="result">
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Plan</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="inputName">Plan Name</label>
                                                <input name="Name" type="text" id="inputName" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Plan Description</label>
                                                <textarea name="Description" id="inputDescription" class="form-control"
                                                    rows="4"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Create new Plan" class="btn btn-success float-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--/.content -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/footer.php");
        ?>
        <!-- ./wrapper -->
        <!-- links script -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/links.php");
        ?>
        <script src="/Projet-fil-rouge/code-source/Views/Assets/script/Admin.js"></script>
</body>

</html>