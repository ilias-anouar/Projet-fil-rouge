<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link text-center">
        <img src="/Projet-fil-rouge/code-source/Views/Assets/images/logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-light">IA FITNESS TRACKER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <?php
                $profilePath = "../profile.php";
                if (file_exists($profilePath)) {
                    $link = $profilePath;
                } else {
                    $link = "profile.php";
                }
                ?>
                <a href="<?php echo $link; ?>" class="d-block"><?= $_SESSION['user']['First_name'] ?> <?= $_SESSION['user']['Last_name'] ?></a>
            </div>

        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="../index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            </ul>

    </div>
    <!-- /.sidebar-menu -->
</aside>