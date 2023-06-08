<!DOCTYPE html>
<html lang="en">

<?php
// include "../Layout/root.php";
include_once(__ROOT__ . "/Views/Layout/head.php");
?>
<style>
    <?php
    include_once(__ROOT__ . "/Views/Assets/css/Client.css");
    ?>

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: orange;
    }

    .nav-pills .nav-link:not(.active):hover {
        color: orangered;
    }
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
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="result">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-danger card-outline">
                                    <div class="card-body box-profile">
                                        <h3 class="profile-username text-center">
                                            <?= $_SESSION['user']['First_name'] ?>
                                            <?= $_SESSION['user']['Last_name'] ?>
                                        </h3>

                                        <!-- <p class="text-muted text-center"></p> -->

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Weight</b> <a class="float-right">65 kg</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Height</b> <a class="float-right">180 cm</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- About Me Box -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-book mr-1"></i>Body Fat</strong>
                                        <p class="text-muted">
                                            13 %
                                        </p>
                                        <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>Quote</strong>
                                        <p class="text-muted">"Fitness is not just about building a strong body, but
                                            also nurturing a resilient mind and fostering an unbreakable spirit."</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#timeline"
                                                    data-toggle="tab">Timeline</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#settings"
                                                    data-toggle="tab">Settings</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane active" id="timeline">
                                                <!-- The timeline -->
                                                <div class="timeline timeline-inverse">
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-orange">
                                                            10 Feb. 2014
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <!-- <i class="fas fa-envelope bg-primary"></i> -->
                                                        <i class="fa fa-star bg-success"></i>
                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header">Current Measures</h3>
                                                            <div class="timeline-body">
                                                                <ul>
                                                                    <li>height: ?</li>
                                                                    <li>weight: ?</li>
                                                                    <li>neck: ?</li>
                                                                    <li>waist: ?</li>
                                                                    <li>hip: ?</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-danger">
                                                            3 Jan. 2014
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fa fa-flag-checkered bg-danger"></i>
                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header">Staring Measures</h3>
                                                            <div class="timeline-body">
                                                                <ul>
                                                                    <li>height: ?</li>
                                                                    <li>weight: ?</li>
                                                                    <li>neck: ?</li>
                                                                    <li>waist: ?</li>
                                                                    <li>hip: ?</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <div>
                                                        <i class="far fa-clock bg-gray"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->

                                            <div class="tab-pane" id="settings">
                                                <form class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">First
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="inputName"
                                                                placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Last
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName2"
                                                                placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail"
                                                            class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="inputEmail"
                                                                placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-10">
                                                            <button type="submit" class="btn bg-orange">Update</button>
                                                        </div>
                                                        <div class="col">
                                                            <a href="Logout.php" class="btn btn-danger">Log
                                                                out</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
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
        <script src="/Projet-fil-rouge/code-source/Views/Assets/script/client.js"></script>
</body>

</html>