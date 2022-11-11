<nav class="main-header navbar navbar-expand navbar-white navbar-light border-0">
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
        <li class="dropdown user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <img src="/img/<?= user()->user_image; ?>" class="user-image border" alt="User Image">
                <!-- <img src="https://st4.depositphotos.com/4329009/19956/v/380/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg"
                    class="user-image" alt="User Image"> -->
                <span class="hidden-xs text-success"></span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="/img/<?= user()->user_image; ?>" class="img-circle" alt="User Image">
                    <!-- <img src="https://st4.depositphotos.com/4329009/19956/v/380/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg"
                        class="img-circle" alt="User Image"> -->

                    <p>
                        <b><?= user()->fullname; ?></b> <br>
                        <span class="text-capitalize">
                            <?= user()->hak_akses; ?>
                        </span>
                        <small class="text-capitalize"><?= user()->provider; ?></small>
                    </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer mt-3">
                    <div class="text-center">
                        <a href="<?= base_url('logout'); ?>" class="btn btn-default btn-flat text-danger">Logout</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>