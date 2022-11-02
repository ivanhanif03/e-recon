<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/adminlte/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="<?= base_url('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/css/adminlte.min.css?v=3.2.0'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/summernote/summernote-bs4.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <!-- Messages Dropdown Menu -->
                <li class="dropdown user-menu">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <img src="https://st4.depositphotos.com/4329009/19956/v/380/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg"
                            class="user-image" alt="User Image">
                        <span class="hidden-xs text-success"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="https://st4.depositphotos.com/4329009/19956/v/380/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg"
                                class="img-circle" alt="User Image">

                            <p>
                                <b>Ivan Hanif</b> <br>
                                Admin
                                <small>Bank BTN</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer mt-3">
                            <div class="text-center">
                                <a href="#" class="btn btn-default btn-flat text-danger">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary">

            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('/adminlte/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">E-Recon</span>
            </a>

            <div class="sidebar">

                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="<?= base_url(''); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('gangguan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-exclamation-circle"></i>
                                <p>
                                    Report Gangguan
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Report Gangguan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                        </li> -->
                    </ul>
                    </ul>
                </nav>

            </div>

        </aside>
    </div>

    <!-- Start Content -->
    <?= $this->renderSection('content'); ?>
    <!-- End Content -->

</body>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/chart.js/Chart.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/sparklines/sparkline.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>">
</script>
<script src="<?= base_url('/adminlte/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/js/adminlte.js?v=3.2.0'); ?>"></script>

</html>