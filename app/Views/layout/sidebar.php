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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

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
                <li class="nav-item">
                    <a href="<?= base_url('order'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Report Order
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