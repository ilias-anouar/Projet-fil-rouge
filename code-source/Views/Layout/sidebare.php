<style>
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
        color: #fff;
        background-color: orange;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active:hover {
        color: #fff;
        background-color: orangered;
    }

    .nav-pills .nav-item .nav-link:not(.active):hover {
        color: orangered;
        background-color: #fff;
    }
</style>
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
                <a href="profile.php" class="d-block">
                    <?= $_SESSION['user']['First_name'] ?>
                    <?= $_SESSION['user']['Last_name'] ?>
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <?php
                if ($_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Client/index.php" || $_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Client/profile.php") {
                    ?>
                    <li class="nav-item">
                        <?php
                        $indexpath = "../index.php";
                        if (file_exists($indexpath)) {
                            $link = $indexpath;
                        } else {
                            $link = "index.php";
                        }

                        ?>
                        <a href="<?= $link ?>"
                            class="nav-link <?= ($_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Client/index.php") ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php
                } ?>

            </ul>

    </div>
    <!-- /.sidebar-menu -->
</aside>