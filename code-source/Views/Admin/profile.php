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
        include_once(__ROOT__ . "/Views/Layout/Admin.sidebare.php");
        ?>
        <!-- /.sidebar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
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
                <!-- <div class="d-flex justify-content-center"> -->
                <?php
                if (isset($success)) {
                    ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        Profile updated successfuly.
                    </div>
                    <?php
                }
                ?>
                <div id="responce"></div>
                <!-- </div> -->
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
                                                <b>Role</b> <a class="float-right">
                                                    <?= $_SESSION['user']['Role'] ?>
                                                </a>
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
                                        <strong><i class="fas fa-book mr-1"></i>Website</strong>
                                        <p class="text-muted">
                                            Admin
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
                                            <li class="nav-item"><a class="nav-link active" href="#settings"
                                                    data-toggle="tab">Settings</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="settings">
                                                <form method="post" class="form-horizontal">
                                                    <input type="hidden" name="id"
                                                        value="<?= $_SESSION['user']['Id_User'] ?>">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">First
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName"
                                                                placeholder="First Name" name="First_name"
                                                                value="<?= $_SESSION['user']['First_name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Last
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName2"
                                                                placeholder="Last Name" name="Last_name"
                                                                value="<?= $_SESSION['user']['Last_name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail"
                                                            class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="inputEmail"
                                                                placeholder="Email" name="E_mail"
                                                                value="<?= $_SESSION['user']['E_mail'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-8">
                                                            <button type="submit" class="btn bg-orange"
                                                                name="Update_user">Update</button>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#modal-default">Update
                                                                password</button>
                                                        </div>
                                                        <div class="col end">
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
            <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Password</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <label for="Current_password" class="col-sm-4 col-form-label">Current
                                        password</label>
                                    <input type="password" class="form-control" id="Current_password"
                                        placeholder="Current password" aria-label="Current password"
                                        aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn show" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="New_password" class="col-sm-4 col-form-label">New password</label>
                                    <input type="password" class="form-control" id="New_password"
                                        placeholder="New password" aria-label="New password"
                                        aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn show" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="Password_confirmation"
                                        class="col-sm-4 col-form-label">Confirmation</label>
                                    <input type="password" class="form-control" id="Password_confirmation"
                                        placeholder="Password confirmation" aria-label="New password"
                                        aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn show" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn bg-orange update">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
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
        <script>
            $(document).ready(function () {
                $('.show').on('click', function () {
                    var input = $(this).closest('.input-group').find('input');

                    if (input.attr('type') === 'password') {
                        input.attr('type', 'text');
                        $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        input.attr('type', 'password');
                        $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                });

                $(".update").on('click', function () {
                    event.preventDefault()
                    console.log("the one");
                    let Current_password = $('#Current_password').val()
                    let New_password = $('#New_password').val()
                    let Password_confirmation = $('#Password_confirmation').val()
                    console.log(New_password);
                    console.log(Password_confirmation);
                    if (New_password == Password_confirmation) {
                        console.log(Current_password);
                        $.ajax({
                            url: "profile.php",
                            type: "POST",
                            data: {
                                action: 1,
                                password: Current_password,
                                newpass: New_password
                            },
                            success: function (response) {
                                $('#modal-default').modal('hide')
                                console.log(response);
                                $("#responce").html(response);
                            },
                            error: function (xhr, status, error) {
                                console.log("Error:", error);
                                console.log("xhr:", xhr);
                            },
                        });
                    } else {
                        alert("please make sure the New password and the Password confirmation are the same");
                    }
                })
            });


        </script>
</body>

</html>