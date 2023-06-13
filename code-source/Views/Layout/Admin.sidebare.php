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
    <a href="index.php" class="brand-link text-center">
        <img src="/Projet-fil-rouge/code-source/Views/Assets/images/logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-light">IA FITNESS TRACKER</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="<?= file_exists("../profile.php") ? "../profile.php" : "profile.php" ?>"
                    class="d-block active">
                    <?= $_SESSION['user']['First_name'] ?> <?= $_SESSION['user']['Last_name'] ?>
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                        class="nav-link <?= ($_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Admin/index.php") ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Projet-fil-rouge/code-source/Controllers/Admin/Plans/"
                        class="nav-link <?= ($_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Admin/Plans/index.php") ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Plans</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Projet-fil-rouge/code-source/Controllers/Admin/Users/"
                        class="nav-link <?= ($_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Admin/Users/index.php") ? 'active' : ''; ?>">
                        <i class="nav-icon ion ion-person-add"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Projet-fil-rouge/code-source/Controllers/Admin/Inscription/"
                        class="nav-link <?= ($_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Admin/Inscription/index.php") ? 'active' : ''; ?>">
                        <i class="nav-icon ion ion-stats-bars"></i>
                        <p>Members</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Projet-fil-rouge/code-source/Controllers/Admin/States/"
                        class="nav-link <?= ($_SERVER['PHP_SELF'] == "/Projet-fil-rouge/code-source/Controllers/Admin/States/index.php") ? 'active' : ''; ?>">
                        <i class="nav-icon ion ion-pie-graph"></i>
                        <p>States</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>