<aside class="main-sidebar sidebar-dark-primary">
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('/adminlte/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Recon</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= base_url(''); ?>" class="nav-link <?php if ($menu == 'dashboard'){echo 'active';}?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('gangguan'); ?>"
                        class="nav-link <?php if ($menu == 'gangguan'){echo 'active';}?>">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Report Gangguan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('order'); ?>" class="nav-link <?php if ($menu == 'order'){echo 'active';}?>">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Report Order
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>